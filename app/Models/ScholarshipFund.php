<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipFund extends Model
{
    use HasFactory;
    protected $table = 'student_scholarship_fund';
    protected $fillable = [
     'fund_name',
     'scholarship_id',
     'status',
    ];
}
