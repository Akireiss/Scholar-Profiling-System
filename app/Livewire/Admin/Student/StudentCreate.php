<?php

namespace App\Livewire\Admin\Student;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipality;
use App\Traits\StudentTrait;

class StudentCreate extends Component
{
    use StudentTrait;


    public function render()
    {
        $provinces = Province::where('regCode', '01')->get();
        $municipalities = Municipality::where('provCode', '0133')->get();
        $barangays = Barangay::where('citymunCode', '012801')->get();

        $nluc = Course::whereHas('campus', function ($query) {
            $query->where('campus_name', 'NLUC');
        })->get();

        $mluc = Course::whereHas('campus', function ($query) {
            $query->where('campus_name', 'MLUC');
        })->get();

        $sluc = Course::whereHas('campus', function ($query) {
            $query->where('campus_name', 'SLUC');
        })->get();

        return view('livewire.admin.student.student-create',
        compact('nluc', 'mluc', 'sluc', 'provinces','municipalities', 'barangays'))
        ->extends('layouts.index')->section('content');
    }


    public function saveStudent()
    {


        $courseId = null; // Initialize course ID to null

        switch ($this->campus) {
            case '0':
                $courseId = $this->courseNluc;
                break;
            case '1':
                $courseId = $this->courseMluc;
                break;
            case '2':
                $courseId = $this->courseSluc;
                break;
        }

        Student::create([
            'student_id' => $this->student_id,
            'campus' => $this->campus,
            'student_type' => $this->student_type,
            'school_name' => $this->school_name,
            'lastYear' => $this->lastYear,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'initial' => $this->initial,
            'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'contact' => $this->contact,
            'email' => $this->email,
            'province_id' => $this->province_id,
            'municipal_id' => $this->municipal_id,
            'barangay_id' => $this->barangay_id,
            'level' => $this->level,
            'father' => $this->father,
            'mother' => $this->mother,
            'course_id' => $courseId,
        ]);

        $this->resetForm();

    }

}
