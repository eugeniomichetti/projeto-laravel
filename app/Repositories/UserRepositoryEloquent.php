<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 30/11/2015
 * Time: 09:58
 */

namespace ProjetoLaravel\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use ProjetoLaravel\Entities\User;
use ProjetoLaravel\Presenters\ClientPresenter;

class UserRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return User::class;
    }
}