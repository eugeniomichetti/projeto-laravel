<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 20:28
 */

namespace ProjetoLaravel\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use ProjetoLaravel\Transformers\ProjectNoteTranformer;

class ProjectNotePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ProjectNoteTranformer();
    }
}