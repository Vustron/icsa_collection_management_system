<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "user_name",
        "email",
        "password",
        "salt",
        "role",
        "provider",
    ];

    protected $hidden = ["password", "salt"];

    protected $casts = [
        "id" => "integer",
        "session_id" => "integer",
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "gcash_number" => "integer",
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}
