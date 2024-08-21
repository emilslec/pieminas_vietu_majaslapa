<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonumentRequest;
use App\Models\Description;
use App\Models\Interval;
use App\Models\Monument;
use App\Models\MonumentsTypes;
use App\Models\PlaceDescription;
use App\Models\Type;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Storage;
use League\CommonMark\Exception\IOException;
use Ramsey\Uuid\Type\Integer;

class MonumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $types = Type::all();
        $intervals = Interval::all();
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

        if ($request->filled('interval')) {
            $interval_id = $request->interval;
            $monumentsQuery = $monumentsQuery->whereHas('intervals', function ($query) use ($interval_id) {
                $query->where('intervals.id', $interval_id);
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
        return view('monuments.index', compact('monuments', 'types', 'intervals', 'params'));
    }

    /**S
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $intervals = Interval::all();
        return view('monuments.create', compact('types', 'intervals'));
    }

    public function store(MonumentRequest $request)
    {

        $validated = $request->validated();
        $m = Monument::create([
            'title' => $validated['title'],
            'state' => $validated['state'],
            'location' => $validated['location'],
            'people' => $validated['people'],
            'cover' => $validated['cover']
        ]);

        $d = Description::create([
            'content' => $validated['description'],
            'monument_id' => $m->id,
        ]);

        $d2 = PlaceDescription::create([
            'content' => $validated['placeDescription'],
            'monument_id' => $m->id,
        ]);

        $m->types()->attach($validated['types']);
        $m->intervals()->attach($validated['intervals']);

        return redirect()->route('monuments.show', $m);
    }

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

    public function edit(string $id)
    {
        $monument = Monument::findOrFail($id);
        $types = Type::all();
        $intervals = Interval::all();
        $curTypes = $monument->types->pluck('id')->toArray();
        $curIntervals = $monument->intervals->pluck('id')->toArray();
        return view('monuments.edit', compact('monument', 'types', 'curTypes', 'intervals', 'curIntervals'));
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

    public function update(MonumentRequest $request, string $id)
    {

        $validated = $request->validated();
        $m = Monument::findOrFail($id);

        $m->title = $validated['title'];
        $m->state = $validated['state'];
        $m->location = $validated['location'];
        $m->people = $validated['people'];
        $m->cover = $validated['cover'];
        $m->save();

        $d = $m->description;

        $d->content = $validated['description'];
        $d->save();

        $d2 = $m->placeDescription;

        $d2->content = $validated['placeDescription'];
        $d2->save();

        $m->types()->sync($validated['types']);
        $m->intervals()->sync($validated['intervals']);

        return redirect()->route('monuments.show', $m);
    }

    public function generatePdf(Request $request)
    {
        //$monuments = Monument::select('id', 'title')->get();
        $monumentsQuery = Monument::query();

        if ($request->filled('number')) {
            $monumentsQuery = $monumentsQuery->where('id', $request->number);
        }
        if ($request->filled('type')) {
            $type_id = $request->type;
            $monumentsQuery = $monumentsQuery->whereHas('types', function ($query) use ($type_id) {
                $query->where('types.id', $type_id);
            });
        }
        if ($request->filled('interval')) {
            $interval_id = $request->interval;
            $monumentsQuery = $monumentsQuery->whereHas('intervals', function ($query) use ($interval_id) {
                $query->where('intervals.id', $interval_id);
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

        $monuments = $monumentsQuery->get()->chunk(100);
        $pdf = PDF::loadView('monuments.pdf', compact('monuments'));

        return $pdf->stream('monuments.pdf');
    }

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
