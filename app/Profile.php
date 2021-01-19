<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    // use SoftDeletes;
    protected $fillable = ['age', 'address'];

    public function getAllUserOver20($id, $param){
        //code
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
