<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionCategory extends Model
{
    use HasFactory;

    protected $table = "collection_categories";
    protected $fillable = [
        "category_name",
        "collection_fee",
        "description",
        "institute_id",
    ];

    public function institute()
    {
        return $this->belongsTo(Institute::class, "institute_id");
    }
}
