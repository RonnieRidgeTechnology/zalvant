<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.blog.categories', compact('categories'));
    }
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_de' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($validated['title']);

        $category = BlogCategory::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'title_de' => $request->title_de,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Category created successfully']);
        }

        return redirect()->back()->with('success', 'Category created successfully');
    } catch (\Illuminate\Validation\ValidationException $e) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
        return redirect()->back()->with('error', 'Validation failed');
    }
}

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_de' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($validated['title']);

        $category->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'title_de' => $request->title_de,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Category updated successfully']);
        }

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function show($id)
    {
        $category = BlogCategory::findOrFail($id);
        return response()->json($category);
    }
       public function changeStatus($id, $status)
    {
        $technology = BlogCategory::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}
