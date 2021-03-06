<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 30/11/2015
 * Time: 09:58
 */

namespace ProjetoLaravel\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use ProjetoLaravel\Entities\Client;
use ProjetoLaravel\Presenters\ClientPresenter;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    protected $fieldSearchable = [
        'name',
        'email'
    ];

    public function model()
    {
        return Client::class;
    }

    public function presenter()
    {
        return ClientPresenter::class;
    }

    public function boot()
    {
        $this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }
}