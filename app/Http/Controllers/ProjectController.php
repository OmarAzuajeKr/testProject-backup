<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with ('category')->latest()->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProjectRequest $request)
    {
        $project = new Project($request->validated());

        if ($request->hasFile('image')) {
            $project->image = $request->file('image')->store('images', 'public');
        }

        $project->save();

        return redirect()->route('projects.index')->with('status', 'Proyecto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(SaveProjectRequest $request, Project $project)
    {
    
        $project->fill($request->validated());
    
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('images', 'public');
        }
    
        $project->save();
    
        return redirect()->route('projects.show', $project)->with('status', 'Proyecto actualizado');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
    
        $project->delete();
    
        return redirect()->route('projects.index')->with('status', 'Proyecto eliminado');
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project(),
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }
}