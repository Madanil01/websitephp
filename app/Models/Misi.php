<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}