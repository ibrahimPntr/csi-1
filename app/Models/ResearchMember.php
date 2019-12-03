<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchMember extends Model
{
  public static $validation_rules = [
      'user_id' =>'required',
      'research_id' =>'required',
      'position' =>'required'
  ];

  public function research(){
    return $this->belongsTo(Research::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
