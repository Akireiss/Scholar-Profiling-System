<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = [
        'student_id',
        'lastname',
        'firstname',
        'initial',
        'email',
        'sex',
        'civil_status',
        'province_id',
        'municipal_id',
        'barangay_id',
         'campus_id',
        'course_id',
        'level',
        'father',
        'mother',
        'contact',
        'student_type',

        'school_name',
        'lastYear',

        'student_status'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function campus() {
        return $this->belongsTo(Campus::class);
    }
}
