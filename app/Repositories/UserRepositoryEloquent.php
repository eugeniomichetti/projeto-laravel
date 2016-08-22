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

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function model()
    {
        return User::class;
    }
}