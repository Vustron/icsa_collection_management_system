<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institute extends Model
{
    use HasFactory;

    protected $table = 'institutes';
    protected $fillable = ['institute_name'];

    public function users()
    {
        return $this->hasMany(User::class, 'institute_id');
    }
}
