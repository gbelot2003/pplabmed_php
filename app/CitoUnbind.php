<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitoUnbind extends Model
{
    /**
     * Table Reference
     * @var string
     */
    public $table = 'cito_unbinds';

    /**
     * Mass Assing protection filter
     * @var array
     *
     */
    protected $fillable = ['unbind'];
}
