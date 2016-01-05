<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 16/12/2015
 * Time: 09:48
 */

namespace ProjetoLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'description' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required|date'
    ];

}