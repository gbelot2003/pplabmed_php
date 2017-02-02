<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Persission extends EntrustPermission
{

    protected $fillable = ['name, display_name', 'decription'];

}
