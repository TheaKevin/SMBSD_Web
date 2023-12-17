<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nickname', 'gender', 'address', 'dob', 'classSMBSD',
        'classSchool', 'schoolName', 'hobby', 'hope', 'ekskul', 'point'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calculateAge()
    {
        if ($this->dob) {
            return Carbon::parse($this->dob)->age;
        }
        
        return null;
    }
}
