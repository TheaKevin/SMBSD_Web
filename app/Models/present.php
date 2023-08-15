<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class present extends Model
{
    use HasFactory;

    protected $fillable = [
        'presentImage', 'presentName', 'presentPoints'
    ];
}
