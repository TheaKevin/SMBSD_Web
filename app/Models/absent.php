<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'absentDate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
