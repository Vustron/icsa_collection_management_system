<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class AttendanceEvent extends Model
{
    use HasFactory;

    protected $table = "attendance_events";
    protected $fillable = ["event_name", "start_date ", "end_date"];
}
