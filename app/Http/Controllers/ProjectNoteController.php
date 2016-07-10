<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\IProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * ProjectController constructor.
     * @param IProjectNoteRepository $repository
     * @param ProjectNoteService $service
     */
    public function __construct(IProjectNoteRepository $repository, ProjectNoteService $service)
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

    public function show($id, $noteId)
    {
        return $this->service->findWhere(['project_id'=> $id, 'id'=>$noteId]);
    }

    public function update(Request $request, $id, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    public function destroy($id,$noteId)
    {
        return $this->service->delete($noteId);
    }
}
