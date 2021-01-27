<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable= ['name'];

    const ADMIN_ROLE = 1;
    const USER_ROLE = 2;
    const SUPER_ADMIN_ROLE = 3;

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
