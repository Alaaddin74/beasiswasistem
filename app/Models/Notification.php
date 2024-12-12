<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scholarship_application_id',
        'message',
        'seen',
    ];


    public function getScholarshipName()
    {
        $shcolarship_application = ScholarshipApplication::findorfail($this->scholarship_application_id);
        return Scholarship::find($shcolarship_application->scholarship_id)->title;
    }
}
