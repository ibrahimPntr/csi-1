<?php

namespace App\Models;

use App\ThesisTopic;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
        private static $status = [
            0 => 'Pengajuan',
            5 => 'Seminar Proposal',
            10 => 'Masa Bimbingan',
            15 => 'Pengajuan Seminar Hasil',
            20 => 'Sudah Seminar Hasil',
            25 => 'Pengajuan Sidang',
            30 => 'Selesai Sidang',
            35 => 'Batal TA/Tidak Selesai'
        ];

        public function thesisTopic(){
            return $this->belongsTo(ThesisTopic::class,'thesis_id','id');
        }
        public function student(){
            return $this->belongsTo(Student::class,'student_id','id');
        }

        public static function thesisList(int $count){
            $theses = self::where('status',0)
                ->orWhere('status',30)
                ->orWhere('status',35)
                ->paginate($count);
            $theses->each(function ($thesis){
                    return $thesis->status = self::$status[$thesis->status];
            });
            return $theses;
        }
}
