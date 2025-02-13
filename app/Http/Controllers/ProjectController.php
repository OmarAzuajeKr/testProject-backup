<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    
    public function index()
    {
        
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    

    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProjectRequest $request)
    {

      $project = new Project ($request->validated());

      $project -> image = $request->file('image')->store('images', 'public');

        $project->save();


        return redirect()->route('projects.index')->with('status', 'Proyecto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show( Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
         

    }

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Proyecto eliminado');
    }


    public function create()
    {
        return view('projects.create', [
            'project' => new Project()
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'description' => 'required',
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.show', $project)->with('status', 'Proyecto actualizado');
    }
}
