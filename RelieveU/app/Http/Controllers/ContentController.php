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
        $contents = Content::where('type', 'Artikel')->get(); // Hanya tipe "Artikel"
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
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('contents');
        }

        Content::create([
            'title' => $request->title,
            'type' => 'Artikel', // Tipe ditentukan sebagai "Artikel"
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('contents.index')->with('success', 'Artikel added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        if ($content->type !== 'Artikel') {
            abort(404);
        }

        return view('contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        if ($content->type !== 'Artikel') {
            abort(404);
        }

        return view('contents.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        if ($content->type !== 'Artikel') {
            abort(404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        $filePath = $content->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                \Storage::delete($filePath);
            }
            $filePath = $request->file('file')->store('contents');
        }

        $content->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('contents.index')->with('success', 'Artikel updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        if ($content->type !== 'Artikel') {
            abort(404);
        }

        if ($content->file_path) {
            \Storage::delete($content->file_path);
        }

        $content->delete();

        return redirect()->route('contents.index')->with('success', 'Artikel deleted successfully!');
    }
}