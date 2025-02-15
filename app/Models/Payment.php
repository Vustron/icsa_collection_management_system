<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

  
class Payment extends Model
{  use HasFactory;
   
    protected $table = 'payments';
    protected $fillable = ['fees_id', 'institute_id ', 'amount_paid','payment_date', 'payment_method ', 'received_by'];
}
