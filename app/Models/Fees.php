<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fees extends Model
{
    use HasFactory;

    protected $table = "fees";

    public $with = ['category', 'issuer'];
    protected $fillable = [
        "fees_id",
        "collection_status ",
        "assigned_to",
        "collection_date",
        "last_contact_date ",
        "remarks",
    ];

    public function category()
    {
        return $this->belongsTo(CollectionCategory::class, 'category_id');
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issued_by');
    }
}
