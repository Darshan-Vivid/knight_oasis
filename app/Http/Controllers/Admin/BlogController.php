<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $baseQuery = Blogs::query();
        $order = $request->input('order', 'desc');
        $baseQuery->orderBy('created_at', $order);
        $perPage = $request->input('perPage', 5);
        $blog = $baseQuery->paginate($perPage);
        $total_blogs = Blogs::count();
        return view('admin.blogs.index', compact('blog', 'total_blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|max:3000',
            'image' => 'required|image',
        ]);

        $blog = new Blogs();
        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            $imagefile = $request->file('image');
            $imageName = time() . '.' . $imagefile->getClientOriginalExtension();
            $imageupload = 'images/blog/' . $imageName; // New path inside public/images/blog/
            $imagefile->move(public_path('images/blog/'), $imageName);
            $blog->image = $imageupload;
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $blog_id)
    {
        $blog = Blogs::findOrFail($blog_id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $blog_id)
    {
        $request->validate([
            'title' => 'required|string|max:60',
            'description' => 'required|max:3000',
            'image' => 'image',
        ]);

        $blog = Blogs::findOrFail($blog_id);
        if ($request->filled('title')) {
            $blog->title = $request->input('title');
        }
        if ($request->filled('description')) {
            $blog->description = $request->input('description');
        }

        if ($request->hasFile('image')) {
            // Delete the old image
            if (!empty($blog->image) && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            // Store new image
            $imagefile = $request->file('image');
            $imageName = time() . '.' . $imagefile->getClientOriginalExtension();
            $imageupload = 'images/blog/' . $imageName; // New path inside public/images/blog/
            $imagefile->move(public_path('images/blog/'), $imageName);
            $blog->image = $imageupload;
        }

        $blog->save();
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $blog_id)
    {
        $blog = Blogs::findOrFail($blog_id);

        // Get the correct image path from the database
        $filePath = public_path($blog->image);

        // Check if the file exists and delete it
        if (!empty($blog->image) && file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the blog entry from the database
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }

    public function view_blog(Request $request){
        $blogs = Blogs::all();
        // dd($blogs);
        return view('front.blogs.index', compact('blogs'));
    }

    public function blog_listing(Request $request){
        
    }
}
