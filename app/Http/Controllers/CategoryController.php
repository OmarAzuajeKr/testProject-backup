<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $projects = $category->projects()->with('category')->paginate(10); 
    
        return view('projects.index', [
            'category' => $category,
            'projects' => $projects,
            'newProject' => new \App\Models\Project(), // Asegúrate de pasar la variable $newProject
            'deletedProjects' => \App\Models\Project::onlyTrashed()->get() // También pasa los proyectos eliminados si es necesario
        ]);
    }
}