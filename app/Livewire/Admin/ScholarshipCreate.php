<?php

namespace App\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;
use App\Traits\StudentTrait;

class ScholarshipCreate extends Component
{
    public $lastname;
    public $firstname;
    public $initial;
    public $student_id;

    public $successMessage;
    public $errorMessage;

    public function studentSearch()
    {
        $existingStudent = Student::where('student_id', $this->student_id)->first();

        if ($existingStudent) {
            $this->lastname = $existingStudent->lastname;
            $this->firstname = $existingStudent->firstname;
            $this->initial = $existingStudent->initial;

        } else {
            $this->errorMessage = 'Student not found. Please check the ID or create a new student.';
            $this->successMessage = null; // Reset success message if student is not found.
        }
    }



    public function render()
    {
        return view('livewire.admin.scholarship-create')
        ->extends('layouts.index')->section('content');
    }
}
