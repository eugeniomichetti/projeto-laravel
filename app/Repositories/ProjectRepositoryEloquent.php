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


class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

}