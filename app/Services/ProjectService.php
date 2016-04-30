<?php

namespace CodeProject\Services;


use CodeProject\Repositories\IProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;

    public function __construct(IProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function find($id){
        try {
            return $this->repository->with(['owner','client'])->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Projeto não encontrado.'
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
                'error'=>true, 'Projeto não encontrado, não pode ser atualizado.'
            ];
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return [
                'success'=>true, 'Projeto deletado com sucesso!'
            ];
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Projeto não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true, 'Ocorreu algum erro ao excluir o projeto.'
            ];
        }  
    }

}