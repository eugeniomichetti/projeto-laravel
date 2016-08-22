<?php

namespace ProjetoLaravel\Http\Controllers;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use ProjetoLaravel\Http\Requests;
use ProjetoLaravel\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->find($userId);
    }
}
