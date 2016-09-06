<?php

namespace ProjetoLaravel\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use ProjetoLaravel\Entities\ProjectFile;
use ProjetoLaravel\Presenters\ProjectFilePresenter;

/**
 * Class ProjectFileRepositoryEloquent
 * @package namespace ProjetoLaravel\Repositories;
 */
class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectFile::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return ProjectFilePresenter::class;
    }
}
