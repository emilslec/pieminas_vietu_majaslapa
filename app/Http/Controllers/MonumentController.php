<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Monument;
use App\Models\MonumentsTypes;
use App\Models\PlaceDescription;
use App\Models\Type;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MonumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $types = Type::all();
        $monumentsQuery = Monument::query();

        if ($request->has('clear')) {
            $monuments = Monument::all();
            return redirect()->route('monuments.index', compact('monuments', 'types'));
        }

        if ($request->filled('number')) {
            $monumentsQuery = $monumentsQuery->where('id', $request->number);
        }

        if ($request->filled('type')) {
            $type_id = $request->type;
            $monumentsQuery = $monumentsQuery->whereHas('types', function ($query) use ($type_id) {
                $query->where('types.id', $type_id);
            });
        }

        if ($request->filled('person')) {
            $monumentsQuery->where('people', 'like', "%{$request->person}%");
        }

        if ($request->filled('title')) {
            $monumentsQuery->where('title', 'like', "%{$request->title}%");
        }

        if ($request->filled('state')) {
            $monumentsQuery->where('state', 'like', "%{$request->state}%");
        }

        if ($request->filled('location')) {
            $monumentsQuery->where('location', 'like', "%{$request->location}%");
        }

        $monuments = $monumentsQuery->paginate(10)->withQueryString();
        $params = $request->monumentsQuery;
        return view('monuments.index', compact('monuments', 'types', 'params'));
    }

    /**S
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('monuments.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $m = Monument::create([
            'title' => $request->title,
            'state' => $request->state,
            'location' => $request->location,
            'people' => $request->people,
            'cover' => $request->cover
        ]);

        $d = Description::create([
            'content' => $request->description,
            'monument_id' => $m->id,
        ]);

        $d2 = PlaceDescription::create([
            'content' => $request->description,
            'monument_id' => $m->id,
        ]);

        $m->types()->attach($request->types);

        return redirect()->route('monuments.show', $m);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $monument = Monument::findOrFail($id);
        return view('monuments.show', compact('monument'));
    }

    public function showOldImages($id)
    {
        $monument = Monument::findOrFail($id);

        return view('images.old-images', compact('monument'));
    }

    public function showNewImages($id)
    {
        $monument = Monument::findOrFail($id);

        return view('images.new-images', compact('monument'));
    }

    public function showDocuments($id)
    {
        $monument = Monument::findOrFail($id);

        return view('images.documents', compact('monument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $monument = Monument::findOrFail($id);
        $types = Type::all();
        $curTypes = $monument->types->pluck('id')->toArray();
        return view('monuments.edit', compact('monument', 'types', 'curTypes'));
    }

    public function editOldImages(string $id)
    {
        $monument = Monument::findOrFail($id);
        return view('images.edit-old-images', compact('monument'));
    }

    public function editNewImages(string $id)
    {
        $monument = Monument::findOrFail($id);
        return view('images.edit-new-images', compact('monument'));
    }

    public function editDocuments(string $id)
    {
        $monument = Monument::findOrFail($id);
        return view('images.edit-documents', compact('monument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (
            $request->title == null || $request->description == null || $request->types == null || $request->state == null || $request->location == null
            || $request->people == null || $request->cover == null || $request->placeDescription == null
        ) {
            return redirect()->back();
        }

        $m = Monument::findOrFail($id);

        $m->title = $request->title;
        $m->state = $request->state;
        $m->location = $request->location;
        $m->people = $request->people;
        $m->cover = $request->cover;
        $m->save();

        $d = $m->description;

        $d->content = $request->description;
        $d->save();

        $d2 = $m->placeDescription;

        $d2->content = $request->placeDescription;
        $d2->save();

        $m->types()->sync($request->types);

        return redirect()->route('monuments.show', $m);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $m = Monument::findOrFail($id);
        foreach ($m->oldImages as $image) {
            Storage::delete('public/' . $image->path);

            $image->delete();
        }

        foreach ($m->newImages as $image) {
            Storage::delete('public/' . $image->path);

            $image->delete();
        }

        $m->description->delete();
        $m->delete();
        return redirect()->route('monuments.index');
    }
}
