<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $project = Project::with('type')->get();

        return response()->json(
            [
                "success" => true,
                "data" => $project
            ]
        );
    }


    public function show(Project $project)
    {

        $project->load('type', 'technologies');

        return response()->json(
            [
                "success" => true,
                "data" => $project
            ]
        );
    }
}
