<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    private array $locales = ['nl', 'en', 'fr', 'de'];

    public function index(Request $request)
    {
        $search = trim($request->query('search', ''));
        $serviceId = $request->query('service_id');

        $landingPages = LandingPage::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('header_title', 'like', "%{$search}%")
                        ->orWhere('header_title_en', 'like', "%{$search}%")
                        ->orWhere('header_title_fr', 'like', "%{$search}%")
                        ->orWhere('header_title_de', 'like', "%{$search}%");
                });
            })
            ->when($serviceId, function ($query) use ($serviceId) {
                $query->where('service_id', $serviceId);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $services = Service::where('status', 1)->orderBy('name')->get();

        return view('Admin.landing_pages.index', compact('landingPages', 'search', 'services', 'serviceId'));
    }

    public function create()
    {
        $services = Service::where('status', 1)->orderBy('name')->get();

        return view('Admin.landing_pages.form', [
            'landingPage' => new LandingPage(),
            'locales' => $this->locales,
            'formAction' => route('landing-pages.store'),
            'formMethod' => 'POST',
            'services' => $services,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid('landing_', true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('landing-pages'), $filename);
            $data['file'] = 'landing-pages/' . $filename;
        }

        $data['feature_blocks'] = $this->transformFeatures($request);

        LandingPage::create($data);

        return redirect()
            ->route('landing-pages.index')
            ->with('success', 'Landing page created successfully.');
    }

    public function edit(LandingPage $landingPage)
    {
        $services = Service::where('status', 1)->orderBy('name')->get();

        return view('Admin.landing_pages.form', [
            'landingPage' => $landingPage,
            'locales' => $this->locales,
            'formAction' => route('landing-pages.update', $landingPage),
            'formMethod' => 'PUT',
            'services' => $services,
        ]);
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        $data = $this->validateData($request, true);

        if ($request->hasFile('file')) {
            if ($landingPage->file && Storage::disk('public')->exists($landingPage->file)) {
                Storage::disk('public')->delete($landingPage->file);
            }
            $file = $request->file('file');
            $filename = uniqid('landing_', true) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('landing-pages'), $filename);
            $data['file'] = 'landing-pages/' . $filename;
        }

        $data['feature_blocks'] = $this->transformFeatures($request, $landingPage);

        $landingPage->update($data);

        return redirect()
            ->route('landing-pages.index')
            ->with('success', 'Landing page updated successfully.');
    }

    public function destroy(LandingPage $landingPage)
    {
        if ($landingPage->file) {
            $this->deleteStorageFile($landingPage->file);
        }

        $this->deleteFeatureIcons($landingPage);
        $landingPage->delete();

        return redirect()
            ->route('landing-pages.index')
            ->with('success', 'Landing page removed.');
    }

    private function validateData(Request $request, bool $isUpdate = false): array
    {
        $baseRules = [
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'header_title' => ['required', 'string', 'max:255'],
            'header_desc' => ['required', 'string'],
            'second_title' => ['nullable', 'string', 'max:255'],
            'second_desc' => ['nullable', 'string'],
            'third_title' => ['nullable', 'string', 'max:255'],
            'third_desc' => ['nullable', 'string'],
        ];

        foreach ($this->locales as $locale) {
            if ($locale === 'nl') {
                continue;
            }

            $suffix = "_{$locale}";
            $baseRules["header_title{$suffix}"] = ['nullable', 'string', 'max:255'];
            $baseRules["header_desc{$suffix}"] = ['nullable', 'string'];
            $baseRules["second_title{$suffix}"] = ['nullable', 'string', 'max:255'];
            $baseRules["second_desc{$suffix}"] = ['nullable', 'string'];
            $baseRules["third_title{$suffix}"] = ['nullable', 'string', 'max:255'];
            $baseRules["third_desc{$suffix}"] = ['nullable', 'string'];
        }

        $fileRule = [$isUpdate ? 'nullable' : 'required', 'file', 'mimes:jpeg,png,webp,avif,svg', 'max:5120'];

        $featureRules = [
            'features' => ['nullable', 'array'],
            'features.*.icon' => ['nullable', 'file', 'mimes:jpeg,png,webp,avif,svg', 'max:2048'],
            'features.*.icon_existing' => ['nullable', 'string', 'max:255'],
        ];

        foreach ($this->locales as $locale) {
            $featureRules["features.*.title.{$locale}"] = ['nullable', 'string', 'max:255'];
            $featureRules["features.*.desc.{$locale}"] = ['nullable', 'string'];
        }

        return $request->validate(
            array_merge($baseRules, ['file' => $fileRule], $featureRules),
            [],
            [
                'file' => 'featured image/file',
                'features.*.icon' => 'feature icon',
            ]
        );
    }

    private function transformFeatures(Request $request, ?LandingPage $landingPage = null): ?array
    {
        $features = $request->input('features', []);
        if (!is_array($features) || empty($features)) {
            if ($landingPage) {
                $this->deleteFeatureIcons($landingPage);
            }
            return null;
        }

        $cleaned = [];
        $fileBag = $request->file('features', []);

        foreach ($features as $index => $feature) {
            $iconPath = $feature['icon_existing'] ?? null;
            $iconFile = $fileBag[$index]['icon'] ?? null;

            if ($iconFile) {
                if ($iconPath) {
                    $this->deleteStorageFile($iconPath);
                }
                $filename = uniqid('feature_icon_', true) . '.' . $iconFile->getClientOriginalExtension();
                $iconFile->move(public_path('landing-features'), $filename);
                $iconPath = 'landing-features/' . $filename;
            }

            $titles = $this->mapLocaleValues($feature['title'] ?? []);
            $descs = $this->mapLocaleValues($feature['desc'] ?? []);

            $hasContent = $iconPath
                || collect($titles)->filter(fn ($value) => filled($value))->isNotEmpty()
                || collect($descs)->filter(fn ($value) => filled($value))->isNotEmpty();

            if (!$hasContent) {
                continue;
            }

            $cleaned[] = [
                'icon' => $iconPath,
                'title' => $titles,
                'desc' => $descs,
            ];
        }

        if ($landingPage) {
            $this->purgeRemovedFeatureIcons($landingPage, $cleaned);
        }

        return empty($cleaned) ? null : $cleaned;
    }

    private function mapLocaleValues($values): array
    {
        $values = is_array($values) ? $values : [];
        $mapped = [];

        foreach ($this->locales as $locale) {
            $mapped[$locale] = $values[$locale] ?? null;
        }

        return $mapped;
    }

    private function purgeRemovedFeatureIcons(LandingPage $landingPage, array $newFeatures): void
    {
        $newPaths = collect($newFeatures)->pluck('icon')->filter()->all();
        $oldPaths = collect($landingPage->feature_blocks ?? [])->pluck('icon')->filter()->all();

        $toDelete = array_diff($oldPaths, $newPaths);

        foreach ($toDelete as $path) {
            $this->deleteStorageFile($path);
        }
    }

    private function deleteFeatureIcons(LandingPage $landingPage): void
    {
        collect($landingPage->feature_blocks ?? [])
            ->pluck('icon')
            ->filter()
            ->each(fn ($path) => $this->deleteStorageFile($path));
    }

    private function deleteStorageFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}

