<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use App\Models\Type;
use App\Models\Participant;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $types = Type::all();
        $people = Person::all();
        $monuments = Monument::all();

        if ($request->has('clear')) {
            return redirect()->route('monuments.index', compact('monuments', 'types', 'people'));
        }

        if ($request->filled('person')) {


            $people_ids = DB::table('people')
                ->where('name', 'like', "%$request->person%")
                ->get()->pluck('id');
            $ids = Participant::all()->whereIn('person_id', $people_ids)->pluck('monument_id');
            $monuments = $monuments->whereIn('id', $ids);
        }

        if ($request->filled('category')) {
            $monuments = $monuments->where('type_id', $request->category);
        }


        if ($request->filled('title')) {
            // Filter monuments where title contains the search term
            $monuments = $monuments->filter(function ($monument) use ($request) {
                return stripos($monument->title, $request->title) !== false;
            });
        }
        return view('monuments.index', compact('monuments', 'types', 'people'));
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
        if ($request->title == null || $request->description == null || $request->type == null) {
            return redirect()->back();
        }
        //all clear - updating the post!
        // $categoryy = Category::where('title', $request->category)->first();
        $m = Monument::create([
            'title' => $request->title,
            'description' => $request->description,
            'type_id' => $request->type,
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
