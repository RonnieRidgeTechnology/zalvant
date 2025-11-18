<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(10);

        return view('Admin.Faq.index', compact('faqs'));
    }
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'question_en' => 'nullable|string',
            'answer_en' => 'nullable|string',
            'question_fr' => 'nullable|string',
            'answer_fr' => 'nullable|string',
            'question_de' => 'nullable|string',
            'answer_de' => 'nullable|string',
        ]);

        // Create a new FAQ
        Faq::create($validatedData);

        return redirect()->back()->with('success', 'FAQ created successfully!');
    }
    public function edit(Faq $faq)
    {
        // Fetch all FAQ categories
        $faq = Faq::all();

        return view('admin.faq.index', compact('faq'));
    }
    public function update(Request $request, Faq $faq)
    {
        // Validate the input
        $validatedData = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'question_en' => 'nullable|string',
            'answer_en' => 'nullable|string',
            'question_fr' => 'nullable|string',
            'answer_fr' => 'nullable|string',
            'question_de' => 'nullable|string',
            'answer_de' => 'nullable|string',
        ]);

        // Update the FAQ
        $faq->update($validatedData);

        return redirect()->back()->with('success', 'FAQ updated successfully!');
    }
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }


    public function changeStatus($id, $status)
    {
        $faq = Faq::findOrFail($id);
        $faq->status = $status;
        $faq->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    public function search(Request $request)
    {
        $categoryId = $request->category_id;

        $faqs = Faq::when($categoryId && $categoryId != 'all', function ($query) use ($categoryId) {
            return $query->where('faq_category_id', $categoryId);
        })->with('category')->get();

        return response()->json(['faqs' => $faqs]);
    }
}
