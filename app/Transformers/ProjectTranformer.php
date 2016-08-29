<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use ProjetoLaravel\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTranformer extends TransformerAbstract
{

    protected $defaultIncludes = ['client', 'members'];

    public function transform(Project $project)
    {
        return [
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'owner_id' => $project->owner_id,
            'name' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
        ];
    }

    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ProjectClientTranformer());
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTranformer());
    }
}