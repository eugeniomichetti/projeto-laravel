<?php

namespace ProjetoLaravel\Http\Controllers;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use ProjetoLaravel\Http\Requests;
use ProjetoLaravel\Entities\User;
use ProjetoLaravel\Repositories\UsertRepository;

class UserController extends Controller
{
    /**
     * @var UsertRepository
     */
    private $repository;

    public function __construct(UsertRepository $repository)
    {
        $this->repository = $repository;
    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->find($userId);
    }
}
