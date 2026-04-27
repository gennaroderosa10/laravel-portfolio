<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'technologies'])->latest()->paginate(6);

        $types = Type::all();

        $latestProjects = Project::with(['type', 'technologies'])->latest()->take(5)->get();

        return view('projects.index', compact('projects', 'types', 'latestProjects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'content' => 'nullable|string',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $project = Project::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'type_id' => $data['type_id'],
            'content' => $data['content'] ?? null,
        ]);

        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('projects.index')
            ->with('success', 'Progetto creato con successo!');
    }

    public function show(Project $project)
    {
        $project->load(['type', 'technologies']);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        $project->load('technologies');

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'content' => 'nullable|string',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $project->update([
            'title' => $data['title'],
            'author' => $data['author'],
            'type_id' => $data['type_id'],
            'content' => $data['content'] ?? null,
        ]);

        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Progetto aggiornato con successo!');
    }

    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Progetto eliminato con successo!');
    }
}
