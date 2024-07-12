<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monument;
use App\Models\NewImages;
use App\Models\OldImages;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'type' => 'required',
        ], [
            'image.mimes' => 'Allowed image types: jpeg, png, jpg',
            'image.max' => 'Max image size is 1MB'
        ]);


        $folder = "images/{$id}/{$request->type}";
        $path = $request->file('image')->store($folder, 'public');

        // Save the image path to the database
        if ($request->type == 'historical') {
            OldImages::create([
                'monument_id' => $id,
                'path' => $path,
            ]);
        } else {
            NewImages::create([
                'monument_id' => $id,
                'path' => $path,
            ]);
        }


        return redirect()->back();
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
    public function destroy(string $id)
    {
        //
    }
}
