<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mockery\Undefined;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $project = Project::all();
        return view('admin.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Type::all();
        $technology = Technology::all();
        return view('admin.project.create', compact('type', 'technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();

        $project->fill($data);
        $project->slug = Str::of($project->title)->slug('-');
        // gestione immagini 
        
        if(isset($data['img'])){
            $project->img = Storage::put('uploads',$data['img']);
        }else{
            $project->img = 'img';
        }
        
        $project->save();
        // prendo technologies se settato
        if(isset($data['technologies'])){
            $project->technologies()->sync($data['technologies']);
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {   
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $type = Type::all();
        $technology = Technology::all();
        return view('admin.project.edit', compact('project', 'type', 'technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->slug = Str::of($data['title'])->slug('-');
        // gestione immagini 
        $project->img = Storage::put('uploads',$data['img']);
        $project->update($data);
        
        // aggiorno elemento technologies
        if(isset($data['technologies'])){
            $project->technologies()->sync($data['technologies']);
        }else{
            $project->technologies()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // elimino elemento technologies
        $project->technologies()->sync([]);
        // elimino progetto
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title");
    }
}
