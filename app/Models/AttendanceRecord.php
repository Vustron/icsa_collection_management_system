<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $table = "attendance_records";

    public $with = ["event"];
    protected $fillable = [
        "student_id ",
        "attendance_event_id",
        "date",
        "morning_check_in",
        "morning_check_out",
        "afternoon_check_in",
        "afternoon_check_out",
    ];

    public function event()
    {
        return $this->belongsTo(AttendanceEvent::class, "attendance_event_id");
    }
}
