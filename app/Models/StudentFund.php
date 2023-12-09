<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFund extends Model
{
   use HasFactory;

   protected $table = 'student_fund';
   protected $fillable = [
    'student_id',
    'school_year',
    'semester',


    'government_scholarship_id',
    'student_governemntfund_id',

    'private_scholarship_id',
    'student_privatefund_id',

   ];
}
