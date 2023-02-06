<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['type', 'technologies'])->get();

        foreach($projects as $project) {
            if($project->cover_image) {
                $project->cover_image = url("storage/$project->cover_image");
            }else {
                $project->cover_image = url("storage/uploads/img-bellizzi.jpg");
            }
        }

        return response()->json($projects);
    }

    public function show($slug){
        $project = Project::where('slug', $slug)->with(['type','technologies'])->first();

        if($project->cover_image) {
            $project->cover_image = url("storage/$project->cover_image");
        }else {
            $project->cover_image = url("storage/uploads/img-bellizzi.jpg");
        }

        return response()->json($project);
    }
}
