<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'date_of_birth',
        'city_id',
        'user_id'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
    
    // relationship method
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
{
    return $this->hasOne(User::class, 'student_id');
}

}

