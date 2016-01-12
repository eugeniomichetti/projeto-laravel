<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 16/12/2015
 * Time: 09:48
 */

namespace ProjetoLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'projet_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required',
    ];

}