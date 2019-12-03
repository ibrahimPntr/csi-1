<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
  public static $validation_rules = [
      'title' =>'required',
      'research_schema_id' => 'required',
      'start_at' => 'required',
      'fund_amount' => 'required',
      'proposal_file'  => 'required',
      'report_file' => 'required'
  ];

  public function research_schemas(){
    return $this->belongsTo(ResearchSchema::class);
  }

  public function research_members(){
    return $this->hasMany(ResearchMember::class,'research_id','id');
  }
}
