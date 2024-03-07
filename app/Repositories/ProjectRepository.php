<?php
namespace App\Repositories;

use App\Models\Project;
class ProjectRepository{

public function createProject($projectData)
{
    try {
        $project                   = new Project();
        $project->name             = $projectData['name'];
        $project->title            = $projectData['title'];
        $project->user_id          = $projectData['user_id'];
        $project->created_by       = $projectData['created_by'];
        $project->updated_by       = $projectData['updated_by'];
        $project->status           = $projectData['status'];
        // $project->project_status   = 'Requested';
        // $uniqueCode                = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
        // $project->uniqprojectcode  = $uniqueCode;
        $project->save();
        return $project;
    } catch (\Exception $e) {
        throw $e;
    }
}

public function isProjectNameUnique($name, $userId)
{
    return Project::where('name', $name)
        ->where('user_id', $userId)
        ->doesntExist();
}


}