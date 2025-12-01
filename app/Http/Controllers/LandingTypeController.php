<?php

namespace App\Http\Controllers;

use App\Models\LandingType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingTypeController extends Controller
{
    public function index()
    {
        $types = LandingType::latest()->paginate(10);

        return view('Admin.landing_types.index', compact('types'));
    }

    public function create()
    {
        return view('Admin.landing_types.form', [
            'type' => new LandingType(),
            'formAction' => route('landing-types.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Handle deal images upload
        $this->handleDealImagesUpload($request, $data);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name_en'] ?? $data['name']);
        }

        LandingType::create($data);

        return redirect()->route('landing-types.index')->with('success', 'Landing type created successfully.');
    }

    public function edit(LandingType $landingType)
    {
        return view('Admin.landing_types.form', [
            'type' => $landingType,
            'formAction' => route('landing-types.update', $landingType),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(Request $request, LandingType $landingType)
    {
        $data = $this->validateData($request, $landingType->id);
        // Handle deal images upload (keep old paths if no new file)
        $this->handleDealImagesUpload($request, $data, $landingType);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name_en'] ?? $data['name']);
        }

        $landingType->update($data);

        return redirect()->route('landing-types.index')->with('success', 'Landing type updated successfully.');
    }

    public function destroy(LandingType $landingType)
    {
        $landingType->delete();

        return redirect()->route('landing-types.index')->with('success', 'Landing type deleted successfully.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:landing_types,name,' . $ignoreId],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_fr' => ['nullable', 'string', 'max:255'],
            'name_de' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:landing_types,slug,' . $ignoreId],

            // Banner section
            'main_title' => ['nullable', 'string'],
            'main_title_en' => ['nullable', 'string'],
            'main_title_fr' => ['nullable', 'string'],
            'main_title_de' => ['nullable', 'string'],
            'main_desc' => ['nullable', 'string'],
            'main_desc_en' => ['nullable', 'string'],
            'main_desc_fr' => ['nullable', 'string'],
            'main_desc_de' => ['nullable', 'string'],

            // Offer section
            'offer_title' => ['nullable', 'string'],
            'offer_title_en' => ['nullable', 'string'],
            'offer_title_fr' => ['nullable', 'string'],
            'offer_title_de' => ['nullable', 'string'],
            'offer_desc' => ['nullable', 'string'],
            'offer_desc_en' => ['nullable', 'string'],
            'offer_desc_fr' => ['nullable', 'string'],
            'offer_desc_de' => ['nullable', 'string'],

            // AI deals section
            'deal_ai_title' => ['nullable', 'string'],
            'deal_ai_title_en' => ['nullable', 'string'],
            'deal_ai_title_fr' => ['nullable', 'string'],
            'deal_ai_title_de' => ['nullable', 'string'],
            'deal_ai_desc' => ['nullable', 'string'],
            'deal_ai_desc_en' => ['nullable', 'string'],
            'deal_ai_desc_fr' => ['nullable', 'string'],
            'deal_ai_desc_de' => ['nullable', 'string'],

            // Deal 1
            'deal1_name' => ['nullable', 'string', 'max:255'],
            'deal1_name_en' => ['nullable', 'string', 'max:255'],
            'deal1_name_fr' => ['nullable', 'string', 'max:255'],
            'deal1_name_de' => ['nullable', 'string', 'max:255'],
            'deal1_desc' => ['nullable', 'string'],
            'deal1_desc_en' => ['nullable', 'string'],
            'deal1_desc_fr' => ['nullable', 'string'],
            'deal1_desc_de' => ['nullable', 'string'],
            'deal1_image' => ['nullable', 'image', 'max:2048'],

            // Deal 2
            'deal2_name' => ['nullable', 'string', 'max:255'],
            'deal2_name_en' => ['nullable', 'string', 'max:255'],
            'deal2_name_fr' => ['nullable', 'string', 'max:255'],
            'deal2_name_de' => ['nullable', 'string', 'max:255'],
            'deal2_desc' => ['nullable', 'string'],
            'deal2_desc_en' => ['nullable', 'string'],
            'deal2_desc_fr' => ['nullable', 'string'],
            'deal2_desc_de' => ['nullable', 'string'],
            'deal2_image' => ['nullable', 'image', 'max:2048'],

            // Deal 3
            'deal3_name' => ['nullable', 'string', 'max:255'],
            'deal3_name_en' => ['nullable', 'string', 'max:255'],
            'deal3_name_fr' => ['nullable', 'string', 'max:255'],
            'deal3_name_de' => ['nullable', 'string', 'max:255'],
            'deal3_desc' => ['nullable', 'string'],
            'deal3_desc_en' => ['nullable', 'string'],
            'deal3_desc_fr' => ['nullable', 'string'],
            'deal3_desc_de' => ['nullable', 'string'],
            'deal3_image' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    /**
     * Handle upload of deal images and fill $data with stored paths.
     */
    private function handleDealImagesUpload(Request $request, array &$data, ?LandingType $existing = null): void
    {
        foreach ([1, 2, 3] as $i) {
            $field = "deal{$i}_image";

            if ($request->hasFile($field)) {
                $image = $request->file($field);
                $imageName = uniqid('deal' . $i . '_') . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/landing-types');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->move($destinationPath, $imageName);
                $data[$field] = 'uploads/landing-types/' . $imageName;
            } elseif ($existing) {
                // Preserve existing image path when not uploading new one
                $data[$field] = $existing->$field;
            }
        }
    }

    public function toggleStatus(LandingType $landingType)
    {
        $landingType->update([
            'status' => ! $landingType->status,
        ]);

        return redirect()->route('landing-types.index')->with('success', 'Landing type status updated.');
    }
}

