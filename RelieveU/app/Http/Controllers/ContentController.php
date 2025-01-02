<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContentRequest;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Poster,Video,Artikel,Tips & Trik',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('contents');
        }

        Content::create([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('contents.index')->with('success', 'Content added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        if ($content->file_path) {
            Storage::delete($content->file_path);
        }

        $content->delete();
        return redirect()->route('contents.index')->with('success', 'Content deleted successfully!');
    }
}
