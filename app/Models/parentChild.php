<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentChild extends Model
{
    use HasFactory;

    public function userParent()
    {
        return $this->belongsTo(User::class, 'child_id', 'child_id');
    }

    public function userChild()
    {
        return $this->belongsTo(User::class, 'parent_id', 'parent_id');
    }
}
