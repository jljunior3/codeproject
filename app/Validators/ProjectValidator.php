<?php

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'description' => 'required|max:500',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required',
    ];

}