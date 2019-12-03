<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityServiceSchema extends Model
{
  public static $validation_rules = [
      'name' =>'required'
  ];

  public function research(){
    return $this->hasMany(CommunityService::class,'community_service_schema_id','id');
  }
}
