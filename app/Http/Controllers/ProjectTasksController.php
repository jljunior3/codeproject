<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\IProjectNoteRepository;
use CodeProject\Repositories\IProjectTasksRepository;
use CodeProject\Services\ProjectTasksService;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /**
     * @var ProjectTasksRepository
     */
    private $repository;
    /**
     * @var ProjectTasksService
     */
    private $service;

    /**
     * ProjectController constructor.
     * @param IProjectTasksRepository $repository
     * @param ProjectTasksService $service
     */
    public function __construct(IProjectTasksRepository $repository, ProjectTasksService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id, $taskId)
    {
        return $this->service->findWhere(['project_id'=> $id, 'id'=>$taskId]);
    }

    public function update(Request $request, $id, $taskId)
    {
        return $this->service->update($request->all(), $taskId);
    }

    public function destroy($id,$taskId)
    {
        return $this->service->delete($taskId);
    }
}
