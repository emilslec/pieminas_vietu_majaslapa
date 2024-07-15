<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewImages;
use App\Models\OldImages;
use Illuminate\Support\Facades\Storage;


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
    public function storeOld(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'image.mimes' => 'Allowed image types: jpeg, png, jpg',
            'image.max' => 'Max image size is 1MB'
        ]);


        $folder = "images/{$id}/historical";
        $path = $request->file('image')->store($folder, 'public');

        // Save the image path to the database
        OldImages::create([
            'monument_id' => $id,
            'path' => $path,
        ]);



        return redirect()->back();
    }
    public function storeNew(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'image.mimes' => 'Allowed image types: jpeg, png, jpg',
            'image.max' => 'Max image size is 1MB'
        ]);


        $folder = "images/{$id}/recent";
        $path = $request->file('image')->store($folder, 'public');

        // Save the image path to the database

        NewImages::create([
            'monument_id' => $id,
            'path' => $path,
        ]);



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
    public function destroyOld(string $id)
    {
        $i = OldImages::findOrFail($id);
        Storage::delete('public/' . $i->path);
        $i->delete();
        return redirect()->back();
    }
    public function destroyNew(string $id)
    {
        $i = NewImages::findOrFail($id);
        Storage::delete('public/' . $i->path);
        $i->delete();
        return redirect()->back();
    }
}
