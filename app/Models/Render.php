<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Render extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "image_id",
        "service_name",
        "user_id",
        "before_src",
        "after_src",
        "regenerated",
        "style",
        "color",
        "type",
        "requested_at"
    ];
}