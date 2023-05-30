<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'Skills';
    protected $fillable = ['nombre'];

    /**Relacion N:M muchas habilidades pertenecen a muchas vacantes */
    public function vacantes(){
        return $this->belongsToMany(Vacante::class);
    }
}
