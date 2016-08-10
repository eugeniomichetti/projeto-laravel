<?php

namespace ProjetoLaravel\Http\Middleware;

use Closure;
use ProjetoLaravel\Repositories\ProjectRepository;

class CheckProjectOwner
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $request->project;
        if ($this->repository->isOwner($projectId, $userId) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        return $next($request);
    }
}
