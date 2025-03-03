<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionCategory extends Model
{
    use HasFactory;

    protected $table = "collection_categories";
    protected $fillable = ["category_name", "description"];
}
