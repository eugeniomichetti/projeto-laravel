<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use ProjetoLaravel\Entities\Client;
use League\Fractal\TransformerAbstract;

class ProjectClientTranformer extends TransformerAbstract
{
    public function transform(Client $client)
    {
        return [
            'name' => $client->name,
        ];
    }
}