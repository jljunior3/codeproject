<?php

namespace CodeProject\Services;

use CodeProject\Repositories\ProjectTasksRepositoryEloquent;
use CodeProject\Validators\ProjectTasksValidator;
use CodeProject\Repositories\IProjectTasksRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectTasksService
{
    /**
     * @var ProjectTasksRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ProjectTasksValidator
     */
    private $validator;

    public function __construct(IProjectTasksRepository $repository, ProjectTasksValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function findWhere($id){
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Tasks do Projeto não encontrado.'
            ];
        }
    }

    public function create(array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e){
            return [
                'error' => true, 'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){
            return [
                'error' => true, 'message' => $e->getMessageBag()
            ];
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Task não encontrado, não pode ser atualizado.'
            ];
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return [
                'success'=>true, 'Task deletado com sucesso!'
            ];
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Task não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true, 'Ocorreu algum erro ao excluir a task.'
            ];
        }  
    }

}