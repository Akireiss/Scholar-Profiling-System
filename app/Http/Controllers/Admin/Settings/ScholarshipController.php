<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index() {
        $scholars = Scholarship::all();
        return view('admin.settings.scholarship.index', compact('scholars'));
    }

    public function create() {
        return view('admin.settings.scholarship.create');
    }

    public function store(Request $request) {
        $scholarship_name = $request->input('scholarship_name');
        $scholarship_type = $request->input('scholarship_type');
        $status = $request->input('status');

        $scholarship = Scholarship::create([
            'scholarship_name' => $scholarship_name,
            'scholarship_type' => $scholarship_type,
            'status' => $status,
        ]);
        return response()->json();

    }

    public function edit($scholar) {
        $scholar = Scholarship::findOrFail($scholar);
        return view('admin.settings.scholarship.create', compact('scholar'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'scholarship_name' => 'required|string',
            'scholarship_type' => 'required|in:0,1',
            'status' => 'required|in:0,1',
        ]);

        $scholar = Scholarship::findOrFail($id);
        $scholar->update($request->all());

        return response()->json();
    }

}
