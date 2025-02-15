<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Fees extends Model
{
    use HasFactory;

    protected $table = 'fees';
    protected $fillable = ['fees_id', 'collection_status ', 'assigned_to', 'collection_date', 'last_contact_date ', 'remarks'];
}
