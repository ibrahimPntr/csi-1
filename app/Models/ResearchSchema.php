<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchSchema extends Model
{
  public static $validation_rules = [
      'name' =>'required'
  ];

  public function research(){
    return $this->hasMany(Research::class,'research_schema_id','id');
  }
}
