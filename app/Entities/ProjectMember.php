<?php

namespace ProjetoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'project_id',
        'member_id',
    ];
}