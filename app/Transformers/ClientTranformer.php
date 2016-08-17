<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use League\Fractal\TransformerAbstract;
use ProjetoLaravel\Entities\Client;

class ClientTranformer extends TransformerAbstract
{
    /**
     * @param Client $client
     * @return array
     */
    public function transform(Client $client)
    {
        return [
            'id' => (int) $client->id,
            'name' => $client->name,
            'responsible' => $client->responsible,
            'email' => $client->email,
            'phone' => $client->phone,
            'address' => $client->address,
            'obs' => $client->obs,
        ];
    }
}