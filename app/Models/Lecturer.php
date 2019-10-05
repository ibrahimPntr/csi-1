<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public static $validation_rules = [
        'email' =>'required|email',
        'nidn' => 'required',
        'name' => 'required',
        'nik'  => 'required',
    ];

    protected $guarded=[];

    protected $dates = ['birthdate'];

    public $incrementing = false;

    public function user(){
        return $this->hasOne(User::class, 'id');
    }

    public function getEmailAttribute($value)
    {
        return optional($this->user)->email;
    }

}
