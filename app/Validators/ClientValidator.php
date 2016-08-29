<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 07/12/2015
 * Time: 08:43
 */

namespace ProjetoLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'obs' => 'string'
    ];
}