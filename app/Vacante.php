<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $table = 'vacantes';
    protected $fillable = ['user_id','categoria_id','experiencia_id','ubicacion_id','salario_id','titulo','imagen','activa','descripcion'];

    /**Relacion 1:N muchas vacantes pertenecen a un usuario*/
    public function users(){
        return $this->belongsTo(User::class);
    }

    /**Relacion 1:1 Una vacante tiene una categoria */
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    /**Relacion 1:1 una vacante tiene una experiencia*/
    public function experiencia(){
        return $this->belongsTo(Experiencia::class);
    }

    /**Relacion 1:1 una vacante tiene una ubicación*/
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }

    /**Relacion 1:1 una vacante tiene un salario*/
    public function salario(){
        return $this->belongsTo(Salary::class);
    }

    /**Relacion N:M Muchas vacantes tienen muchas habilidades*/
    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    /**relacion 1:1 una vacante tiene un reclutador (es el usuario) */
    public function reclutador(){
        return $this->belongsTo(User::class,'user_id');
    }

    /**Relacion 1:N Una vacante tiene muchos candidatos*/
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }

   

}
