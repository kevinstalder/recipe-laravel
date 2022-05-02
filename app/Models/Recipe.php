<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'title',
        'description',
        'prep_time',
        'total_time',
        'ingredients',
        'instructions',
        'images',
        'nutritional',
    ];
}
