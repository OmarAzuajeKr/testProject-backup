<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    
    public function index()
    {
        
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    

    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'description' => 'required',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index');
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


    public function create()
    {
        return view('projects.create');
    }
}
