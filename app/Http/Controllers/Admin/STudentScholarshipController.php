<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Scholarship;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScholarshipFund;
use App\Models\StudentFund;

class StudentScholarshipController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.scholarship.index', compact('students'));
    }
    public function edit($student)
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

        $governments = Scholarship::where('scholarship_type', 0)
            ->where('status', 0)->get();
        $privates = Scholarship::where('scholarship_type', 1)
            ->where('status', 0)->get();



        $student = Student::findOrFail($student);
      //  $studentFund = StudentFund::where('student_id', $student)->get();
        return view(
            'admin.scholarship.index',
            compact(
                'student',
                'nluc',
                'mluc',
                'sluc',
                'provinces',
                'municipalities',
                'barangays',
                'governments',
                'privates',
             //   'studentFund'
            )
        );
    }


     public function fetchFundSources($scholarshipId)
    {
        $fundSources = ScholarshipFund::where('scholarship_id', $scholarshipId)->get();

        return response()->json(['fundSources' => $fundSources]);
    }


    public function store(Request $request){

      $validated = $request->validate([
            'student_id' => 'required',
            'semester' => 'required',
            'school_year' => 'required',

            'government_scholarship_id' => 'nullable',
            'student_governemntfund_id' => 'nullable',

            'private_scholarship_id' => 'nullable',
            'student_privatefund_id' => 'nullable',
        ]);

        $student_scholar = new StudentFund;
        $student_scholar->student_id = $validated['student_id'];
        $student_scholar->semester = $validated['semester'];
        $student_scholar->school_year = $validated['school_year'];

        $student_scholar->government_scholarship_id = $validated['government_scholarship_id'];
        $student_scholar->student_governemntfund_id = $validated['student_governemntfund_id'];

        $student_scholar->private_scholarship_id = $validated['private_scholarship_id'];
        $student_scholar->student_privatefund_id = $validated['student_privatefund_id'];

        $student_scholar->save();


        return redirect()->back();
    }
}
