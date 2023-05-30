<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatos';
    protected $fillable = ['nombre','email','cv','vacante_id'];
}
