<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class AttendanceFee extends Model
{
    use HasFactory;

    protected $table = "attendance_fees";
    protected $fillable = ["fee_id ", "attendance_record_id  ", "amount"];

    public $with = ["attendanceRecord"];

    public function attendanceRecord()
    {
        return $this->belongsTo(
            AttendanceRecord::class,
            "attendance_record_id"
        );
    }
}
