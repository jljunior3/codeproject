<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\IClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;

    public function __construct(IClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        return $this->repository->create($request->all());
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request->all(), $id);
    }


    public function destroy($id)
    {
        $this->repository->delete($id);
    }
}
