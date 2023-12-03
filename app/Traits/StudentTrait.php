<?php
namespace App\Traits;

use App\Models\Barangay;
use App\Models\Municipality;

trait StudentTrait
{
    public $student_id;
    public $campus;
    public $student_type;
    public $school_name;
    public $lastYear;

    public $lastname ;
    public $firstname ;
    public $initial ;
    public $sex ;
    public $civil_status ;
    public $contact ;

    public $email;
    public $courseNluc;
    public $courseMluc;
    public $courseSluc;
    public $level;



    public $province_id;
    public $municipal_id;
    public $barangay_id;
    public $father;
    public $mother;


    private function resetForm()
    {
        // Reset form fields to their initial state
        $this->student_id = '';
        $this->campus = '';
        $this->student_type = '';
        $this->school_name = '';
        $this->lastYear = '';
        $this->lastname = '';
        $this->firstname = '';
        $this->initial = '';
        $this->sex = '';
        $this->civil_status = '';
        $this->contact = '';
        $this->email = '';
        $this->province_id = '';
        $this->municipal_id = '';
        $this->barangay_id = '';

       $this->courseNluc =  '';
       $this->courseMluc = '';
       $this->courseSluc = '';
       $this->level = '';


        $this->level = '';
        $this->course = '';
        // ... reset other fields
    }

}
