<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable; //HasApiTokens - Add rani if need ninyu akong gi remove kay lainan ko kitag red tnx

    protected $fillable = [
        "user_name",
        "email",
        "password",
        "salt",
        "provider",
        "institute_id",
    ];

    protected $hidden = ["password", "salt"];

    protected $casts = [
        "id" => "integer",
        "session_id" => "integer",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        // "gcash_number" => "integer",
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function roles()
    {
        return $this->hasMany(AdminRole::class, "user_id");
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, "institute_id");
    }
}
