<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use ProjetoLaravel\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTranformer extends TransformerAbstract
{
    public function transform(ProjectNote $projectNote)
    {
        return [
            'id' => $projectNote->id,
            'project_id' => $projectNote->project_id,
            'title' => $projectNote->title,
            'note' => $projectNote->note
        ];
    }
}