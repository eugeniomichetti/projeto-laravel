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
        'owner_id' => 'required|integer',
        'client_id'=> 'required|integer',
        'name' => 'required|max:255',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required|date'
    ];

}