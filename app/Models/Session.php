<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "token",
        "ip_address",
        "expires_at",
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "expires_at" => "datetime",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
