<?php

namespace ProjetoLaravel\Http\Controllers;

use Illuminate\Http\Request;
use ProjetoLaravel\Repositories\ProjectFileRepository;
use ProjetoLaravel\Services\ProjectFileService;

class ProjectFileController extends Controller
{
    /**
     * @var ProjectFileRepository
     */
    private $repository;
    /**
     * @var ProjectFileService
     */
    private $service;

    public function __construct(ProjectFileRepository $repository, ProjectFileService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    /**
     * Show the form for download the project file.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFile($id)
    {
        if ($this->service->checkProjectPermission($id) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        return response()->download($this->service->getFilePath($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extesion = $file->getClientOriginalExtension();

        $data['file'] = $file;
        $data['extension'] = $extesion;
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['project_id'] = $request->project_id;

        return $this->service->create($data);
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
        return $this->repository->find($id);
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
        if ($this->checkProjectPermission($id) == false) {
            return ['error' => 'Acesso negado ao projeto!'];
        }
        $this->repository->delete($id);
    }

}
