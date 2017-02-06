<?php namespace App;

use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole
{

    protected $fillable = ['name, display_name', 'decription'];

    public function getPermsListsAttribute()
    {
        return $this->perms->pluck('id')->all();
    }

}
