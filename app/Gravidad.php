<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gravidad extends Model
{
    //TODO: Preguntar cual es el campo de autoalimentación
    /**
     * @var array
     */
    protected $fillable = ['name', 'status'];

}
