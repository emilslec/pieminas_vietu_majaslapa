<?php

namespace App\Http\Controllers;

use App\Models\Monument;
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

        if ($request->filled('category')) {
            $monumentsQuery = $monumentsQuery->where('type_id', $request->category);
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

        $monuments = $monumentsQuery->paginate(3)->withQueryString();
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
        if (
            $request->title == null || $request->description == null || $request->type == null || $request->state == null || $request->location == null
            || $request->people == null
        ) {
            return redirect()->back();
        }

        $m = Monument::create([
            'title' => $request->title,
            'description' => $request->description,
            'type_id' => $request->type,
            'state' => $request->state,
            'location' => $request->location,
            'people' => $request->people
        ]);



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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $monument = Monument::findOrFail($id);
        $types = Type::all();
        return view('monuments.edit', compact('monument', 'types'));
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (
            $request->title == null || $request->description == null || $request->type == null || $request->state == null || $request->location == null
            || $request->people == null
        ) {
            return redirect()->back();
        }

        $m = Monument::findOrFail($id);

        $m->title = $request->title;
        $m->description = $request->description;
        $m->type_id = $request->type;
        $m->state = $request->state;
        $m->location = $request->location;
        $m->people = $request->people;
        $m->save();

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

        $m->delete();
        return redirect()->route('monuments.index');
    }
}
