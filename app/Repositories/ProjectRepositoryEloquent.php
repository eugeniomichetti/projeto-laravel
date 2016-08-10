<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 16/12/2015
 * Time: 09:04
 */

namespace ProjetoLaravel\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use ProjetoLaravel\Entities\Project;
use ProjetoLaravel\Presenters\ProjectPresenter;


class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

    public function isOwner($projectId, $ownerId)
    {
        if (count($this->findWhere(['id' => $projectId, 'owner_id' => $ownerId]))) {
            return true;
        }

        return false;
    }

    public function hasMember($projectId, $memberId){

        $project = $this->find($projectId);

        foreach ($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }

        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }

}