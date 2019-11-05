<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    static $validation_rules = [
        'email' => 'required|email',
        'nim' => 'required',
        'name' => 'required',
        'year' => 'required',
    ];

    protected $guarded = [];
    protected $dates = ['birthdate'];
    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function getEmailAttribute($value)
    {
        return optional($this->user)->email;
    }
}
