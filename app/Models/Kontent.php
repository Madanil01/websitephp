<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'deleted_at',
        'updated_at',
        'created_at',
    ];
}
