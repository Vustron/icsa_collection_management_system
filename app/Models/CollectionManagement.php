<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

    
class CollectionManagement extends Model
{use HasFactory;

    protected $table = 'collection_management';
    protected $fillable = ['event_name', 'start_date ', 'end_date'];
}
