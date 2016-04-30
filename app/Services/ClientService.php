<?php

namespace CodeProject\Services;


use CodeProject\Repositories\IClientRepository;
use CodeProject\Validators\ClientValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    private $validator;

    public function __construct(IClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function find($id){
        try {
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Cliente não encontrado.'
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
                'error'=>true, 'Cliente não encontrado, não pode ser atualizado.'
            ];
        }
    }

    public function delete($id)
    {
        try {
            $this->repository->find($id)->delete();
            return [
                'success'=>true, 'Cliente deletado com sucesso!'
            ];
        }catch (QueryException $e) {
            return [
                'error'=>true, 'Cliente não pode ser apagado pois existe projetos atrelados a ele.'
            ];
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true, 'Cliente não encontrado.'
            ];
        }catch (\Exception $e) {
            return [
                'error'=>true, 'Ocorreu algum erro ao excluir o Cliente.'
            ];
        }
    }

}