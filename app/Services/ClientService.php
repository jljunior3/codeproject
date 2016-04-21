<?php

namespace CodeProject\Services;


use CodeProject\Repositories\IClientRepository;

class ClientServices
{
    protected $repository;

    public function __construct(IClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

}