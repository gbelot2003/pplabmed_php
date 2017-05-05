<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitoSerial extends Model
{

    /**
     * Table Reference
     * @var string
     */
    public $table = 'cito_serials';

    /**
     * Mass Assing protection filter
     * @var array
     *
     */
    protected $fillable = ['sereal'];


}
