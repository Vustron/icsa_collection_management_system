<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentSubmission extends Model
{
    use HasFactory;

    protected $table = "payment_submissions";

    public $with = ["fee"];
    protected $fillable = [
        "student_id",
        "fees_id ",
        "screenshot_path",
        "amount_paid",
        "status ",
        "reviewed_by",
        "reviewed_at",
        "remarks",
    ];

    public function fee(){
        return $this->belongsTo(Fees::class, 'fees_id');
    }
}
