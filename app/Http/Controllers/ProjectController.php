<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use Illuminate\Http\Request;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function index(Request $request)
    {
        $query = Project::with('category')->latest();
    
        if ($request->has('category')) {
            $category = Category::where('name', $request->category)->firstOrFail();
            $projects = $query->where('category_id', $category->id)->paginate();
        } else {
            $projects = $query->paginate();
            $category = null;
        }
    
        return view('projects.index', [
            'newProject' => new Project(),
            'projects' => $projects,
            'category' => $category,
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveProjectRequest $request)
    {


        $project = new Project($request->validated());

        $this->authorize('create', $project);

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
        $this->authorize('create', $project);

        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Proyecto eliminado');
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $this->authorize('restore', $project);
        $project->restore();
    
        return redirect()->route('projects.index')->with('status', 'Proyecto restaurado');
    }
    
    public function forceDelete($id)
    {
        $project = Project::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $project);
    
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
    
        $project->forceDelete();
    
        return redirect()->route('projects.index')->with('status', 'Proyecto eliminado permanentemente');
    }


    public function create()
    {
        $this->authorize('create', $project = new Project());

        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);


        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function deletedList()
    {
        $deletedProjects = Project::onlyTrashed()->get();
        $newProject = new Project(); // Define la variable $newProject

        return view('projects.deleteList', compact('deletedProjects', 'newProject'));
    }

    public function showPreview($id)
{
    $project = Project::withTrashed()->findOrFail($id);

    return view('projects.showPreview', [
        'project' => $project
    ]);
}
    
}
