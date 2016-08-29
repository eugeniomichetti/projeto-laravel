<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use ProjetoLaravel\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTranformer extends TransformerAbstract
{
    public function transform(User $member)
    {
        return [
            'name' => $member->name,
        ];
    }
}