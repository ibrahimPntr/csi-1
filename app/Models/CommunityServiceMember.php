<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityServiceMember extends Model
{
  public static $validation_rules = [
      'user_id' =>'required',
      'community_service_id' =>'required',
      'position' =>'required'
  ];

  public function community_service(){
    return $this->belongsTo(CommunityService::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
