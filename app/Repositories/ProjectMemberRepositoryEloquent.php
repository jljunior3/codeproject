<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\ProjectMember;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProjectNoteRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements IProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
