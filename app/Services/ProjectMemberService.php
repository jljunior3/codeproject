<?php

namespace CodeProject\Services;


use CodeProject\Validators\ProjectMemberValidator;
use CodeProject\Repositories\IProjectMemberRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectMemberService
{
    /**
     * @var ProjectMemberRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ProjectMemberValidator
     */
    private $validator;

    public function __construct(IProjectMemberRepository $repository, ProjectMemberValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function find($id){
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Membro do Projeto não encontrado.'
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
                'error'=>true, 'Projeto Note não encontrado, não pode ser atualizado.'
            ];
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->delete($id);
            return [
                'success'=>true, 'Membro do Projeto deletado com sucesso!'
            ];
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Membro do Projeto não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true, 'Ocorreu algum erro ao excluir o membro do projeto.'
            ];
        }  
    }

}