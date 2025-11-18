<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->orderBy('created_at', 'desc')->paginate(10);
        $categories = BlogCategory::where('status',1)->get();
        return view('Admin.blog.index', compact('blogs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'blogcategories_id' => 'required|exists:blog_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keyword' => 'required',
            'tags' => 'nullable',
            'thumbnail_alt'=>'required',
            'image_alt'=>'required',
            // English
            'title_en' => 'nullable|string',
            'desc_en' => 'nullable|string',
            'meta_title_en' => 'nullable|string',
            'meta_desc_en' => 'nullable|string',
            'meta_keyword_en' => 'nullable|string',
            // French
            'title_fr' => 'nullable|string',
            'desc_fr' => 'nullable|string',
            'meta_title_fr' => 'nullable|string',
            'meta_desc_fr' => 'nullable|string',
            'meta_keyword_fr' => 'nullable|string',
            // German
            'title_de' => 'nullable|string',
            'desc_de' => 'nullable|string',
            'meta_title_de' => 'nullable|string',
            'meta_desc_de' => 'nullable|string',
            'meta_keyword_de' => 'nullable|string',
        ]);

        // Generate slug from title
        $slug = Str::slug($request->title);

        // Ensure unique slug
        $count = 1;
        $originalSlug = $slug;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Image Upload
        $image = $request->file('image');
        $imageName = time() . '_image.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/blogs'), $imageName);

        // Thumbnail Upload
        $thumb = $request->file('thumbnail');
        $thumbName = time() . '_thumb.' . $thumb->getClientOriginalExtension();
        $thumb->move(public_path('uploads/blogs'), $thumbName);

        // Parse tags if they're provided as a JSON string
        $tags = $request->tags;
        if (is_string($tags)) {
            try {
                $tags = json_decode($tags, true);
            } catch (\Exception $e) {
                $tags = [];
            }
        }

        Blog::create([
            'blogcategories_id' => $request->blogcategories_id,
            // Dutch (default)
            'title' => $request->title,
            'slug' => $slug,
            'desc' => $request->desc,
            'tags' => $tags,
            'image' => $imageName,
            'thumbnail' => $thumbName,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'status' => 1,
            'image_alt' => $request->image_alt,
            'thumbnail_alt' => $request->thumbnail_alt,
            // English
            'title_en' => $request->title_en,
            'desc_en' => $request->desc_en,
            'meta_title_en' => $request->meta_title_en,
            'meta_desc_en' => $request->meta_desc_en,
            'meta_keyword_en' => $request->meta_keyword_en,
            // French
            'title_fr' => $request->title_fr,
            'desc_fr' => $request->desc_fr,
            'meta_title_fr' => $request->meta_title_fr,
            'meta_desc_fr' => $request->meta_desc_fr,
            'meta_keyword_fr' => $request->meta_keyword_fr,
            // German
            'title_de' => $request->title_de,
            'desc_de' => $request->desc_de,
            'meta_title_de' => $request->meta_title_de,
            'meta_desc_de' => $request->meta_desc_de,
            'meta_keyword_de' => $request->meta_keyword_de,
        ]);

        return redirect()->back()->with('success', 'Blog created successfully');
    }


public function edit($id)
{
    $blog = Blog::with('category', 'comments')->find($id);

    if (!$blog) {
        return response()->json(['error' => 'Blog not found'], 404);
    }

    // Tags ko array bana kar bhejna
    $tags = is_string($blog->tags) ? json_decode($blog->tags, true) : $blog->tags;

    return response()->json([
        'data' => [
            'id' => $blog->id,
            // Dutch (default)
            'title' => $blog->title,
            'desc' => $blog->desc,
            'meta_title' => $blog->meta_title,
            'meta_desc' => $blog->meta_desc,
            'meta_keyword' => $blog->meta_keyword,
            // English
            'title_en' => $blog->title_en,
            'desc_en' => $blog->desc_en,
            'meta_title_en' => $blog->meta_title_en,
            'meta_desc_en' => $blog->meta_desc_en,
            'meta_keyword_en' => $blog->meta_keyword_en,
            // French
            'title_fr' => $blog->title_fr,
            'desc_fr' => $blog->desc_fr,
            'meta_title_fr' => $blog->meta_title_fr,
            'meta_desc_fr' => $blog->meta_desc_fr,
            'meta_keyword_fr' => $blog->meta_keyword_fr,
            // German
            'title_de' => $blog->title_de,
            'desc_de' => $blog->desc_de,
            'meta_title_de' => $blog->meta_title_de,
            'meta_desc_de' => $blog->meta_desc_de,
            'meta_keyword_de' => $blog->meta_keyword_de,
            // Universal fields
            'blogcategories_id' => $blog->blogcategories_id,
            'status' => $blog->status,
            'image' => $blog->image,
            'thumbnail' => $blog->thumbnail,
            'image_alt' => $blog->image_alt,
            'thumbnail_alt' => $blog->thumbnail_alt,
            'tags' => $tags,
            'category' => $blog->category ? $blog->category->title : null,
            'comments_count' => $blog->comments ? $blog->comments->count() : 0,
        ]
    ]);
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'desc' => 'required',
        'blogcategories_id' => 'required|exists:blog_categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        'meta_title' => 'required',
        'meta_desc' => 'required',
        'meta_keyword' => 'required',
        'tags' => 'nullable',
        'image_alt' => 'required',
        'thumbnail_alt' => 'required',
        // English
        'title_en' => 'nullable|string',
        'desc_en' => 'nullable|string',
        'meta_title_en' => 'nullable|string',
        'meta_desc_en' => 'nullable|string',
        'meta_keyword_en' => 'nullable|string',
        // French
        'title_fr' => 'nullable|string',
        'desc_fr' => 'nullable|string',
        'meta_title_fr' => 'nullable|string',
        'meta_desc_fr' => 'nullable|string',
        'meta_keyword_fr' => 'nullable|string',
        // German
        'title_de' => 'nullable|string',
        'desc_de' => 'nullable|string',
        'meta_title_de' => 'nullable|string',
        'meta_desc_de' => 'nullable|string',
        'meta_keyword_de' => 'nullable|string',
    ]);

    // Always generate new slug from title
    $slug = Str::slug($request->title);
    $count = 1;
    $originalSlug = $slug;
    while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    // Handle image uploads
    if ($request->hasFile('image')) {
        if ($blog->image && file_exists(public_path('uploads/blogs/' . $blog->image))) {
            unlink(public_path('uploads/blogs/' . $blog->image));
        }
        $image = $request->file('image');
        $imageName = time() . '_image.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/blogs'), $imageName);
        $blog->image = $imageName;
    }

    if ($request->hasFile('thumbnail')) {
        if ($blog->thumbnail && file_exists(public_path('uploads/blogs/' . $blog->thumbnail))) {
            unlink(public_path('uploads/blogs/' . $blog->thumbnail));
        }
        $thumb = $request->file('thumbnail');
        $thumbName = time() . '_thumb.' . $thumb->getClientOriginalExtension();
        $thumb->move(public_path('uploads/blogs'), $thumbName);
        $blog->thumbnail = $thumbName;
    }

    // Parse tags if they're provided as a JSON string
    $tags = $request->tags;
    if (is_string($tags)) {
        try {
            $tags = json_decode($tags, true);
        } catch (\Exception $e) {
            $tags = [];
        }
    }

    // Update the blog
    $blog->update([
        'blogcategories_id' => $request->blogcategories_id,
        // Dutch (default)
        'title' => $request->title,
        'slug' => $slug,
        'desc' => $request->desc,
        'tags' => $tags,
        'meta_title' => $request->meta_title,
        'meta_desc' => $request->meta_desc,
        'meta_keyword' => $request->meta_keyword,
        'image_alt' => $request->image_alt,
        'thumbnail_alt' => $request->thumbnail_alt,
        // English
        'title_en' => $request->title_en,
        'desc_en' => $request->desc_en,
        'meta_title_en' => $request->meta_title_en,
        'meta_desc_en' => $request->meta_desc_en,
        'meta_keyword_en' => $request->meta_keyword_en,
        // French
        'title_fr' => $request->title_fr,
        'desc_fr' => $request->desc_fr,
        'meta_title_fr' => $request->meta_title_fr,
        'meta_desc_fr' => $request->meta_desc_fr,
        'meta_keyword_fr' => $request->meta_keyword_fr,
        // German
        'title_de' => $request->title_de,
        'desc_de' => $request->desc_de,
        'meta_title_de' => $request->meta_title_de,
        'meta_desc_de' => $request->meta_desc_de,
        'meta_keyword_de' => $request->meta_keyword_de,
    ]);

    return redirect()->back()->with('success', 'Blog updated successfully');
}


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete original image file
        $imagePath = public_path('uploads/blogs/' . $blog->image);
        if ($blog->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete thumbnail file
        $thumbPath = public_path('uploads/blogs/' . $blog->thumbnail);
        if ($blog->thumbnail && file_exists($thumbPath)) {
            unlink($thumbPath);
        }

        // Delete the blog record
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully');
    }
    public function changeStatus($id, $status)
    {
        $technology = Blog::findOrFail($id);
        $technology->status = $status;
        $technology->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    // Comment
    public function comment(Request $request)
    {
        // Base validation
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'comment' => 'required|string',
            'name'    => 'nullable|string|max:255',
            'email'   => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        Comment::create($validated);

        return back()->with('success', 'Your comment has been posted.');
    }
    //reply
    public function reply(Request $request)
{
    $validated = $request->validate([
        'comment_id' => 'required|exists:comments,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    CommentReply::create($validated);

    return back()->with('success', 'Your reply has been posted.');
}
    //All Comment
    public function allComment($id)
    {
        $comments = Comment::with('replies')->where('blog_id', $id)->get();
        return view('admin.blog.comment', compact('comments'));
    }
    // Toggle comment status
    public function toggleCommentStatus(Request $request, $id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->status = $comment->status == 1 ? 0 : 1;
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Comment status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating comment status'
            ], 500);
        }
    }
    // Delete comment
    public function deleteComment($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            // Delete all replies associated with this comment
            $comment->replies()->delete();
            // Delete the comment
            $comment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment and its replies deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting comment and replies'
            ], 500);
        }
    }

}
