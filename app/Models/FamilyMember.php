<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    public static $validation_rules = [
        'name' => 'required',
        'relationship' => 'required',
        'gender' => 'required',
        'birthday' => 'date',
        'address' => 'required',
        'phone' => 'numeric',
        'email' => 'email',
        'alive' => 'required'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
