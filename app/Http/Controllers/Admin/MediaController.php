<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mediaFiles = Media::all();
        return view('admin.media.create', compact('mediaFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $fileName = $file->getClientOriginalName();
            $filePath = 'images/media/';

            // Store the file in public/images/ext
            $file->move(public_path($filePath), $fileName);

            // Save in database
            Media::create([
                'name' => $fileName,
                'type' => $file->getClientMimeType(),
                'url' => $filePath . $fileName
            ]);

            return redirect()->back()->with('success', 'Media uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload media.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $media_id)
    {
        $media = Media::findOrFail($media_id);
        $filePath = public_path($media->url);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $media->delete();
        return redirect()->route('media.index')->with('success', 'Media deleted successfully!');
    }
}
