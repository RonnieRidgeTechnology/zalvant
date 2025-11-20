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
        ]);
    }

    public function toggleStatus(LandingType $landingType)
    {
        $landingType->update([
            'status' => ! $landingType->status,
        ]);

        return redirect()->route('landing-types.index')->with('success', 'Landing type status updated.');
    }
}

