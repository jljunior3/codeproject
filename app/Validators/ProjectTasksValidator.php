<?php

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTasksValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required',
        'name' => 'required',
        'start_date' => 'required',
        'due_date' => 'required',
        'status' => 'required',
    ];

}