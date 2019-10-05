<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    public static $validation_rules = [
        'user_id' => 'required|',
        'education_level' => 'required',
        'school_name' => 'required',
        'dept' => 'required',
        'year_start' => 'required',
        'year_finish' => 'required',
        'certificate_no' => 'required',
        'certificate_file' => 'file|mimes:pdf'
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
