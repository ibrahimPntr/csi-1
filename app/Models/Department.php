<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
}
