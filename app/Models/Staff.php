<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public static $validation_rules = [
        'email' => 'required|email|unique:users,email',
        'nip' => 'required',
        'name' => 'required',
        'nik' => 'required',
        'photo' => 'image',
    ];

    protected $guarded = [];
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
