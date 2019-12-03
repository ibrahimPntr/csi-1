<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityService extends Model
{
  public static $validation_rules = [
      'title' =>'required',
      'community_service_schema_id' => 'required',
      'partner' => 'required',
      'start_at' => 'required',
      'fund_amount' => 'required',
      'proposal_file'  => 'required',
      'report_file' => 'required'
  ];

  public function community_service_schemas(){
    return $this->belongsTo(CommunityServiceSchema::class);
  }

  public function community_service_members(){
    return $this->hasMany(CommunityServiceMember::class,'community_service_id','id');
  }
}
