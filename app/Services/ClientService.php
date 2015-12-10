<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 01/12/2015
 * Time: 09:44
 */

namespace ProjetoLaravel\Services;


use Illuminate\Contracts\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;
use ProjetoLaravel\Repositories\ClientRepository;
use ProjetoLaravel\Validators\ClientValidator;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    protected $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
}