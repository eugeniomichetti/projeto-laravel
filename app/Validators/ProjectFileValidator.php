<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 16/12/2015
 * Time: 09:48
 */

namespace ProjetoLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer',
        'name' => 'required',
        'file' => 'required|mimes:jpeg,jpg,png,pdf,zip',
        'description' => 'required',
    ];

}