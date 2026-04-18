<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type')->latest()->paginate(6);

        $types = Type::all();

        $latestProjects = Project::with('type')->latest()->take(5)->get();

        return view('projects.index', compact('projects', 'types', 'latestProjects'));
    }

    public function create()
    {
        $types = Type::all();

        return view('projects.create', compact('types'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'content' => 'nullable|string',
        ]);

        Project::create($data);

        return redirect()->route('projects.index')
            ->with('success', 'Progetto creato con successo!');
    }

    public function show(Project $project)
    {
        $project->load('type');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();

        return view('projects.edit', compact('project', 'types'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'content' => 'nullable|string',
        ]);

        $project->update($data);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Progetto aggiornato con successo!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Progetto eliminato con successo!');
    }
}
