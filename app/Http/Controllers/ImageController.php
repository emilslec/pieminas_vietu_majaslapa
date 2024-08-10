<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\NewImages;
use App\Models\OldImages;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{

    public function storeOld(StoreImageRequest $request, string $id)
    {
        $validated = $request->validated();

        $folder = "images/{$id}/historical";
        $path = $request->file('image')->store($folder, 'public');

        OldImages::create([
            'monument_id' => $id,
            'path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function storeNew(StoreImageRequest $request, string $id)
    {
        $validated = $request->validated();

        $folder = "images/{$id}/recent";
        $path = $request->file('image')->store($folder, 'public');

        NewImages::create([
            'monument_id' => $id,
            'path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function storeDocument(StoreImageRequest $request, string $id)
    {
        $validated = $request->validated();

        $folder = "images/{$id}/documents";
        $path = $request->file('image')->store($folder, 'public');

        Document::create([
            'monument_id' => $id,
            'path' => $path,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

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
    public function destroyDocument(string $id)
    {
        $d = Document::findOrFail($id);
        Storage::delete('public/' . $d->path);
        $d->delete();
        return redirect()->back();
    }
}
