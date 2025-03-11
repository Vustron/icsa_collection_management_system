<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";

    public $with = ["fee", "receivedBy"];

    protected $fillable = [
        "fees_id",
        // "institute_id ",
        "amount_paid",
        "payment_method ",
        "received_by",
        "payment_submission_id",
    ];

    public function fee()
    {
        return $this->belongsTo(Fees::class, "fees_id");
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, "received_by");
    }
}
