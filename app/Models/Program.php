<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = "programs";

    protected $fillable = ["institute_id ", "name", "status", "delete_flag"];

    protected $casts = [
        "id" => "integer",
        "delete_flag" => "boolean",
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, "institute_id");
    }

    const CREATED_AT = "date_created";
    const UPDATED_AT = "date_updated";
}
