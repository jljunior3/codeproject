<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function member(){
        return $this->belongsTo(User::class);
    }

}
