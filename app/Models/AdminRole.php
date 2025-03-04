<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRole extends Model
{
    use HasFactory;

    protected $table = "admin_roles";
    protected $fillable = ["user_id", "role_id", "system_id", "deleted_at"];

    protected $with = ["user", "roleName", "systemName"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function roleName()
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function systemName()
    {
        return $this->belongsTo(System::class, "system_id");
    }
}
