<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable =
    [
        'course_name',
        'campus_id',
    ];

    public function campus() {
        return $this->belongsTo(Campus::class);
    }
}
