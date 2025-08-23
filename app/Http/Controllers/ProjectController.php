<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\Mapped;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Project::with(['aboutProject', 'featureProject', 'stackProject'])->latest()->paginate(5);

            $projects->getCollection()->transform(function ($project) {
                return Mapped::projectMap($project);
            });

            return ApiResponse::success($projects,  'Successfully Get All Projects Data');
        } catch (\Throwable $th) {
            return ApiResponse::error('Something went wrong', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $project = Project::with(['aboutProject', 'featureProject', 'stackProject'])->find($id);

            if (!$project) {
                return ApiResponse::error('Project Not Found', null, 404);
            }

            $project = Mapped::projectMap($project);

            return ApiResponse::success($project, 'Successfully Retrieve Project Data');
        } catch (\Throwable $th) {
            return ApiResponse::error('Something went wrong', $th->getMessage());
        }
    }
}
