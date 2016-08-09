<?php

namespace ProjetoLaravel\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'extension',
    ];

    public function projects(){
        return $this->belongsTo(Project::class);
    }
}