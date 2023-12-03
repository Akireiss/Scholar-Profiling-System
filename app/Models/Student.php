<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
         'campus',
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
}
