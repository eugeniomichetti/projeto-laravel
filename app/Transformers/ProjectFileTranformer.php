<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 19:28
 */

namespace ProjetoLaravel\Transformers;

use League\Fractal\TransformerAbstract;
use ProjetoLaravel\Entities\ProjectFile;

class ProjectFileTranformer extends TransformerAbstract
{
    public function transform(ProjectFile $projectFile)
    {
        return [
            'id' => $projectFile->id,
            'project_id' => $projectFile->project_id,
            'name' => $projectFile->name,
            'extension' => $projectFile->extension,
            'description' => $projectFile->description
        ];
    }
}