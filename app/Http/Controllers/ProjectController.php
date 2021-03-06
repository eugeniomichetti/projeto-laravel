<?php

namespace ProjetoLaravel\Http\Controllers;

use Illuminate\Http\Request;
use ProjetoLaravel\Repositories\ProjectRepository;
use ProjetoLaravel\Services\ProjectService;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->service->checkProjectPermission($id) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        return $this->repository->with('owner')->with('client')->with('members')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($this->service->checkProjectPermission($id) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->service->checkProjectPermission($id) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        $this->repository->skipPresenter()->find($id)->delete();
    }
}
