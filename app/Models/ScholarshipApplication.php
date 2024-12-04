<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scholarship_id',
        'current_institution',
        'program_of_study',
        'current_gpa',
        'past_education',
        'documents',
        'status',
    ];

    protected $casts = [
        'documents' => 'array', // Automatically decode JSON documents
        'date_of_birth' => 'date', // Cast date_of_birth to Carbon instance
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }
}

