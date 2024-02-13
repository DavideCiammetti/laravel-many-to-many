<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technology = Technology::all();
        return view('admin.technology.technologyIndex', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.technology.createTechnology');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeTechnologyRequest $request)
    {
        $data = $request->validated();
        $technology = new Technology();
        $technology->fill($data);
        $technology->slug = Str::of($technology->title)->slug('-');

        $technology->save();
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technology.showTechnology', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.editTechnology', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();
        $technology->slug = Str::of($data['title'])->slug('-');
        $technology->update($data);
        
        // aggiorno elemento technologies
        return redirect()->route('admin.technologies.show', $technology)->with('message', "$technology->title");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        // $technology->projects()->detach();
        $technology->projects()->sync([]);
        $technology_title = $technology->title;

        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', "$technology_title");
    }
}
