<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    protected $fillable = ['name', 'code','status', 'extra', 'collegiate'];
}
