<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentSubmission extends Model
{
    use HasFactory;

    protected $table = "payment_submissions";
    protected $fillable = [
        "student_id",
        "fees_id ",
        "screenshot_path",
        "amount_paid",
        "submitted_at",
        "status ",
        "reviewed_by",
        "reviewed_at",
        "remarks",
    ];
}
