<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "school_id",
        "program_id",
        "rfid",
        "first_name",
        "middle_name",
        "last_name",
        "email",
        "set",
        "year",
        "status",
        "delete_flag",
    ];

    protected $casts = [
        "id" => "integer",
        "user_id" => "integer",
        "school_id" => "integer",
        "program_id" => "integer",
        "year" => "integer",
        "delete_flag" => "boolean",
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
