<?php
/**
 * Created by PhpStorm.
 * User: TECNOLOGIA
 * Date: 07/12/2015
 * Time: 08:43
 */

namespace ProjetoLaravel\Validators;


use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required',
    ];
}