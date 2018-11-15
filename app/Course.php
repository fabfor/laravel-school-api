<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code','credits','name'];
    public $timestamps = false;

    public function students(){
      return $this->hasMany('App\Student');
    }

    public function teachers(){
      return $this->belongsToMany('App\Teacher');
    }


}
