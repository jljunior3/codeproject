<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\IProjectNoteRepository;
use CodeProject\Repositories\IProjectTasksRepository;
use CodeProject\Services\ProjectTasksService;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
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

    public function show($id, $memberId)
    {
        return $this->service->findWhere(['project_id'=> $id, 'id'=>$memberId]);
    }

    public function update(Request $request, $projectId, $memberId)
    {
        return $this->service->update($request->all(),$projectId, $memberId);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
