<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 16/12/2015
 * Time: 09:47
 */

namespace ProjetoLaravel\Services;


use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;
use ProjetoLaravel\Repositories\ProjectRepository;
use ProjetoLaravel\Validators\ProjectValidator;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Filesystem\Factory;
use ProjetoLaravel\Entities\Project;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    protected $validator;
    /**
     * @var Filesystem
     */
    private $fileSystem;
    /**
     * @var Factory
     */
    private $storage;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $fileSystem, Factory $factory, Factory $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->fileSystem = $fileSystem;
        $this->storage = $storage;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        } catch (ValidationException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function createFile(array $data)
    {
        //Name, extension, projectId, description, file
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id . "." . $data['extension'], $this->fileSystem->get($data['file']));

    }
}