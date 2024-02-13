<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $tecnology = Tecnology::all();
        return view('admin.project.create', compact('type', 'tecnology'));
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
        $project->img = Storage::put('uploads',$data['img']);

        $project->save();
        
        // prendo tecnologies se settato
        if(isset($data['tecnologies'])){
            $project->tecnologies()->sync($data['tecnologies']);
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
        $tecnology = Tecnology::all();
        return view('admin.project.edit', compact('project', 'type', 'tecnology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        // gestione immagini 
        $project->img = Storage::put('uploads',$data['img']);
        $project->update($data);
        
        // aggiorno elemento tecnologies
        if(isset($data['tecnologies'])){
            $project->tecnologies()->sync($data['tecnologies']);
        }else{
            $project->tecnologies()->sync([]);
        }
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // elimino elemento tecnologies
        $project->tecnologies()->sync([]);
        // elimino progetto
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title");
    }
}
