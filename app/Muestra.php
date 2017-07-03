<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{

    /**
     * @var string
     */
    protected $table = 'muestras';

    /**
     * @var array
     */
    protected $fillable = [
        'serial', 'firma_id', 'body'
    ];
}
