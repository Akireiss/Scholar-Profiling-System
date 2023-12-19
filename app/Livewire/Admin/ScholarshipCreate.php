<?php

namespace App\Livewire\Admin;

use App\Models\Campus;
use App\Models\Student;
use Livewire\Component;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Scholarship;
use App\Models\StudentFund;
use App\Models\Municipality;
use App\Traits\StudentTrait;

class ScholarshipCreate extends Component
{
    public $lastname;
    public $firstname;
    public $initial;
    public $student_id;

    public $campus;
    public $student_type;

    public $sex;
    public $civil_status;
    public $contact;
    public $email;

    public $school_name;
    public $lastYear;

    public $province_id;
    public $municipal_id;
    public $barangay_id;

    public $course;
    public $level;

    public $father;
    public $mother;
    public $successMessage;
    public $errorMessage;

    //Filter
    public $school_year;
    public $semester;
    public $first_scholarship_id;
    public $student_firstfund_id;

    public $second_scholarship_id;
    public $student_secondfund_id;

    public $existingStudent;

    public function studentSearch()
    {
        $this->existingStudent = Student::where('student_id', $this->student_id)->first();

        if ($this->existingStudent) {
            $this->lastname = $this->existingStudent->lastname;
            $this->firstname = $this->existingStudent->firstname;
            $this->initial = $this->existingStudent->initial;
            //
            $this->student_type = $this->existingStudent->student_type;
            $this->sex = $this->existingStudent->sex;
            $this->civil_status = $this->existingStudent->civil_status;
            $this->email = $this->existingStudent->email;

            $this->campus = $this->existingStudent->campus->campus_name;


            $this->contact = $this->existingStudent->contact;
            $this->school_name = $this->existingStudent->school_name ?? "No Data";
            $this->lastYear = $this->existingStudent->lastYear ?? "No Data";
            //
            $this->province_id = $this->existingStudent->province->id;
            $this->municipal_id = $this->existingStudent->municipal->id;
            $this->barangay_id = $this->existingStudent->barangay->id;
            //
            $this->course = $this->existingStudent->course->courses;
            $this->level = $this->existingStudent->level;
            //
            $this->father = $this->existingStudent->father;
            $this->mother = $this->existingStudent->mother;

            if ($this->existingStudent->studentFund->isNotEmpty()) {
                // Accessing the school_year of the first fund in the collection
                $this->school_year = $this->existingStudent->studentFund->first()->school_year;
                $this->semester = $this->existingStudent->studentFund->first()->semester;
                $this->first_scholarship_id = $this->existingStudent->studentFund->first()->first_scholarship_id;
                $this->student_firstfund_id = $this->existingStudent->studentFund->first()->student_firstfund_id;

                $this->second_scholarship_id = $this->existingStudent->studentFund->first()->second_scholarship_id;
                $this->student_secondfund_id = $this->existingStudent->studentFund->first()->student_secondfund_id;
            } else {
                $this->school_year = null; // or provide a default value
                $this->semester =  null;
                $this->first_scholarship_id = null;
                $this->student_firstfund_id = null;

                $this->second_scholarship_id = null;
                $this->student_secondfund_id = null;
            }




        } else {
            $this->errorMessage = 'Student not found. Please check the ID or create a new student.';
            $this->successMessage = null;
        }
    }

    public function render()
    {

        $scholarships = Scholarship::where('scholarship_type',
        0)->get();
        $secondScholarships = Scholarship::where('scholarship_type',
        1)->get();

        $provinces = Province::all();
        $municipalities = Municipality::where('province_id', 1)->get();
        $barangays = Barangay::where('municipal_id', 1)->get();
        return view('livewire.admin.scholarship-create', compact('secondScholarships','scholarships','provinces', 'municipalities', 'barangays'))
        ->extends('layouts.index')->section('content');
    }

    public function saveStudentFund()
    {
        $this->validate([
            'semester' => 'required',
            'school_year' => 'required',
            'first_scholarship_id' => 'required',
            'student_firstfund_id' => 'required',
            'second_scholarship_id' => 'required',
            'student_secondfund_id' => 'required',
        ]);

        if ($this->existingStudent) {
            $existingRecord = StudentFund::where([
                'student_id' => $this->existingStudent->id,
                'school_year' => $this->school_year,
                'semester' => $this->semester,
            ])->first();

            if ($existingRecord) {
                $existingRecord->update([
                    'school_year' => $this->school_year,
                    'semester' => $this->semester,
                    'first_scholarship_id' => $this->first_scholarship_id,
                    'student_firstfund_id' => $this->student_firstfund_id,
                    'second_scholarship_id' => $this->second_scholarship_id,
                    'student_secondfund_id' => $this->student_secondfund_id,
                ]);
            } else {
                StudentFund::create([
                    'student_id' => $this->existingStudent->id,
                    'school_year' => $this->school_year,
                    'semester' => $this->semester,
                    'first_scholarship_id' => $this->first_scholarship_id,
                    'student_firstfund_id' => $this->student_firstfund_id,
                    'second_scholarship_id' => $this->second_scholarship_id,
                    'student_secondfund_id' => $this->student_secondfund_id,
                ]);
            }
        } else {
            $this->addError('student_id', 'Student not found. Please check the ID or create a new student.');
        }
    }



}
