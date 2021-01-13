<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['age', 'address'];

    public function getAllUserOver20($id, $param){
        //code
    }
}
