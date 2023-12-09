@extends('layouts.index')
@section('content')

    @if (request()->routeIs('admin.student.scholarship'))
        <div class="pagetitle">
            <h1>Scholarships</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Scholarships</li>
                </ol>
            </nav>
        </div>

        <div class="d-flex justify-content-end my-2">
            <a href="{{ route('admin.scholarship.create') }}" class="btn btn-success">Add Scholar</a>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>Campus</th>
                                        <th>Course</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $student->firstname }} {{ $student->last_name }}</td>
                                            <td>{{ $student->campus_id }}</td>
                                            <td>{{ $student->course_id }}</td>
                                            <td>
                                                <a href="{{ route('admin.student.scholarship.edit', ['student' => $student->id]) }}"
                                                    class="btn btn-sm btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No Data</td>
                                        </tr>
                                    @endforelse



                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if (request()->routeIs('admin.student.scholarship.edit'))
        <div>

            <div class="pagetitle">
                <h1>Scholarships</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Scholarships</li>
                    </ol>
                </nav>
            </div>

            <div class="d-flex justify-content-end my-2">
                <a href="" class="btn btn-success">Back</a>
            </div>


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Data</h5>

                    <div class="row g-3 needs-validation">


                        <div class="col-md-4">
                            <x-label>Student Id</x-label>
                            <x-input type="number" required name="student_id" value="{{ $student->student_id }}" />
                            <x-feedback />
                        </div>

                        <div class="col-md-4">
                            <x-label>Campus</x-label>
                            <x-select id="campusSelect" onchange="toggleCourseFields()" name="campus">
                                <option value="0" {{ $student->campus->id == 0 ? 'selected' : '' }}>NLUC</option>
                                <option value="1" {{ $student->campus->id == 1 ? 'selected' : '' }}>MLUC</option>
                                <option value="2" {{ $student->campus->id == 2 ? 'selected' : '' }}>SLUC</option>
                                <option value="3" {{ $student->campus->id == 3 ? 'selected' : '' }}>OUS</option>
                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-4">
                            <x-label>Student Type</x-label>
                            <x-select name="student_type" id="studentType" onchange="toggleFields()">
                                <option value="New" {{ $student->student_type == 'New' ? 'selected' : '' }}>New</option>
                                <option value="Continuing" {{ $student->student_type == 'Continuing' ? 'selected' : '' }}>
                                    Continuing</option>
                                <option value="Returning" {{ $student->student_type == 'Returning' ? 'selected' : '' }}>
                                    Returning</option>
                            </x-select>
                        </div>

                        <div class="col-md-6" id="newStudentFields" style="display:none;">
                            <x-label>If new, indicate school last attended</x-label>
                            <x-input type="text" required name="school_name" value="{{ $student->school_name }}" />
                            <x-feedback />
                        </div>

                        <div class="col-md-6" id="schoolYearFields" style="display:none;">
                            <x-label>School year last attended</x-label>
                            <x-input type="text" id="validationCustom02" required name="lastYear"
                                value="{{ $student->lastYear }}" />
                            <x-feedback />
                        </div>


                        <div class="mx-1">Student Information</div>
                        <div class="col-md-4">
                            <x-label>Last Name</x-label>
                            <x-input type="text" required name="lastname" value="{{ $student->lastname }}" />
                            <x-feedback />
                        </div>
                        <div class="col-md-4">
                            <x-label>First Name</x-label>
                            <x-input type="text" id="validationCustom02" required name="firstname"
                                value="{{ $student->firstname }}" />
                            <x-feedback />
                        </div>
                        <div class="col-md-4">
                            <x-label>Middle Name</x-label>
                            <x-input type="text" id="validationCustom02" required name="initial"
                                value="{{ $student->initial }}" />
                            <x-feedback />
                        </div>

                        <div class="col-md-6">
                            <x-label>Sex</x-label>
                            <x-input type="text" required name="sex" value="{{ $student->sex }}" />
                            <x-feedback />
                        </div>
                        <div class="col-md-6">
                            <x-label>Civil Status</x-label>
                            <x-input type="text" id="validationCustom02" required name="civil_status"
                                value="{{ $student->civil_status }}" />
                            <x-feedback />
                        </div>

                        <div class="col-md-6">
                            <x-label>Contact Number</x-label>
                            <x-input type="number" id="validationCustom02" required name="contact"
                                value="{{ $student->contact }}" />
                            <x-feedback />
                        </div>
                        <div class="col-md-6">
                            <x-label>Email</x-label>
                            <x-input type="text" id="validationCustom02" required name="email"
                                value="{{ $student->email }}" />
                            <x-feedback />
                        </div>

                        <div class="col-md-4">
                            <x-label>Province</x-label>
                            <x-select name="province_id">

                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->provDesc }}</option>
                                @endforeach

                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-4">
                            <x-label>Municipality</x-label>
                            <x-select name="municipal_id">
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->citymunCode }}"
                                        {{ $municipality->citymunCode == $student->municipal_id ? 'selected' : '' }}>
                                        {{ $municipality->citymunDesc }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-4">
                            <x-label>Barangay</x-label>
                            <x-select name="barangay_id">
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->brgyCode }}">{{ $barangay->brgyDesc }}</option>
                                @endforeach
                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-6">
                            <x-label>Year Level</x-label>
                            <x-input type="number" id="validationCustom02" required name="level"
                                value="{{ $student->level }}" />
                            <x-feedback />
                        </div>


                        <div class="col-md-6" id="defaultCourseFields">
                            <x-label>Course</x-label>
                            <x-input disabled type="text" id="validationCustom02" required name="course"
                                value="{{ $student->course_id }}" />
                        </div>

                        <div class="col-md-6" id="nlucCourseFields" style="display:none;">
                            <x-label>Course NLUC</x-label>
                            <x-select name="courseNluc">
                                @foreach ($nluc as $n)
                                    <option value="{{ $n->id }}">{{ $n->courses }}</option>
                                @endforeach
                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-6" id="mlucCourseFields" style="display:none;">
                            <x-label>Course MLUC</x-label>
                            <x-select name="courseMluc">
                                @foreach ($mluc as $m)
                                    <option value="{{ $m->id }}">{{ $m->courses }}</option>
                                @endforeach
                            </x-select>
                            <x-feedback />
                        </div>

                        <div class="col-md-6" id="slucCourseFields" style="display:none;">
                            <x-label>Course SLUC</x-label>
                            <x-select name="courseSluc">
                                @foreach ($sluc as $s)
                                    <option value="{{ $s->id }}">{{ $s->courses }}</option>
                                @endforeach
                            </x-select>
                            <x-feedback />
                        </div>




                        <div class="mx-1">Family Information</div>
                        <div class="col-md-6">
                            <x-label>Father's name</x-label>
                            <x-input type="text" required name="father" value="{{ $student->father }}" />
                            <x-feedback />
                        </div>
                        <div class="col-md-6">
                            <x-label>Mother's name</x-label>
                            <x-input type="text" value="{{ $student->mother }}" id="validationCustom02" required
                                name="mother" />
                            <x-feedback />
                        </div>



                        @if ($student->studentFund->isNotEmpty())
                        <?php $studentFund = $student->studentFund->first(); ?>


                        <div class="mx-1">Additional Information</div>

                        <form action=""
                        method="POST" class="row">
                            @csrf
                            @method('POST')
                            <div class="col-md-6" style="display: none;">
                                <x-label>Student ID</x-label>
                                <x-input type="hidden" required name="student_id"
                                value="{{ $student->id }}"/>
                                <x-feedback />
                            </div>



                            <div class="col-md-6">
                                <x-label>Semester</x-label>
                                <x-select required name="semester">
                                    <option value="1" {{ $studentFund->semester == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $studentFund->semester == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $studentFund->semester == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $studentFund->semester == 4 ? 'selected' : '' }}>4</option>
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>School Year {{ $studentFund->government_scholarship_id }}</x-label>
                                <x-select required name="school_year">
                                    <option value="2020" {{ $studentFund->school_year == 2020 ? 'selected' : '' }}>2020</option>
                                    <option value="2021" {{ $studentFund->school_year == 2021 ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $studentFund->school_year == 2022 ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $studentFund->school_year == 2023 ? 'selected' : '' }}>2023</option>
                                </x-select>
                                <x-feedback />
                            </div>




                            <div class="mt-3 mx-2">Scholarships</div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Government</x-label>
                                <x-select id="governmentScholarship"  name="government_scholarship_id">
                                    @foreach ($governments as $gov)
                                        <option value="{{ $gov->id }}"
                                            {{ $studentFund->government_scholarship_id == $gov->id ? 'selected' : '' }}
                                            >{{ $gov->scholarship_name }}</option>
                                    @endforeach
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Government</x-label>
                                <x-select id="governmentFundSource"  name="student_governemntfund_id" readonly>

                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Private</x-label>
                                <x-select id="privateScholarship"  name="private_scholarship_id">
                                    @foreach ($privates as $pri)
                                        <option value="{{ $pri->id }}"
                                            {{ $studentFund->private_scholarship_id == $pri->id ? 'selected' : '' }}
                                            >{{ $pri->scholarship_name }}</option>
                                    @endforeach
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Private</x-label>
                                <x-select id="privateFundSource" name="student_privatefund_id" readonly>

                                </x-select>
                                <x-feedback />
                            </div>



                            <div class="col-12 d-flex justify-content-end align-items-center">
                                <x-text-alert />
                                <div wire:loading wire:target="saveStudent" class="mx-4">
                                    Loading...
                                </div>
                                <button class="btn btn-success mt-2" type="submit">Update</button>
                            </div>

                        </form>



                    </div>
                </div>
            </div>


                  @else




                        <div class="mx-1">Additional Information</div>

                        <form action="{{ route('student.scholar.create') }}"
                        method="POST" class="row">
                            @csrf
                            @method('POST')
                            <div class="col-md-6" style="display: none;">
                                <x-label>Student ID</x-label>
                                <x-input type="hidden" required name="student_id" value="{{ $student->id }}"/>
                                <x-feedback />
                            </div>



                            <div class="col-md-6">
                                <x-label>Semester</x-label>
                                <x-select required name="semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>School Year</x-label>
                                <x-select required name="school_year">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </x-select>
                                <x-feedback />
                            </div>




                            <div class="mt-3 mx-2">Scholarships</div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Government</x-label>
                                <x-select id="governmentScholarship"  name="government_scholarship_id">
                                    @foreach ($governments as $gov)
                                        <option value="{{ $gov->id }}">{{ $gov->scholarship_name }}</option>
                                    @endforeach
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Government</x-label>
                                <x-select id="governmentFundSource"  name="student_governemntfund_id" readonly>

                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Private</x-label>
                                <x-select id="privateScholarship"  name="private_scholarship_id">
                                    @foreach ($privates as $pri)
                                        <option value="{{ $pri->id }}">{{ $pri->scholarship_name }}</option>
                                    @endforeach
                                </x-select>
                                <x-feedback />
                            </div>

                            <div class="col-md-6">
                                <x-label>Fund Sources For Private</x-label>
                                <x-select id="privateFundSource" name="student_privatefund_id" readonly>

                                </x-select>
                                <x-feedback />
                            </div>



                            <div class="col-12 d-flex justify-content-end align-items-center">
                                <x-text-alert />
                                <div wire:loading wire:target="saveStudent" class="mx-4">
                                    Loading...
                                </div>
                                <button class="btn btn-success mt-2" type="submit">Create</button>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
            @endif




    @endif




    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#governmentScholarship').change(function() {
                var selectedGovernmentScholarship = $(this).val();
                fetchFundSources(selectedGovernmentScholarship, 'governmentFundSource');
            });

            $('#privateScholarship').change(function() {
                var selectedPrivateScholarship = $(this).val();
                fetchFundSources(selectedPrivateScholarship, 'privateFundSource');
            });

            function fetchFundSources(scholarshipId, targetElementId) {
    $.ajax({
        url: '/fetch-fund-sources/' + scholarshipId,
        type: 'GET',
        success: function(response) {
            if (response.fundSources) {
                var selectElement = $('#' + targetElementId);
                selectElement.empty();

                $.each(response.fundSources, function(index, fundSource) {
                    selectElement.append('<option value="' + fundSource.id + '">' + fundSource.fund_name + '</option>');
                });
            } else {
                console.error('No fundSources found in the response:', response);
            }
        },
        error: function(error) {
            console.error('Error fetching fund sources:', error);
        }
    });
}

        });
    </script>


<script>
    function toggleCourseFields() {
        var campusSelect = document.getElementById('campusSelect').value;
        var defaultCourseFields = document.getElementById('defaultCourseFields');
        var nlucCourseFields = document.getElementById('nlucCourseFields');
        var mlucCourseFields = document.getElementById('mlucCourseFields');
        var slucCourseFields = document.getElementById('slucCourseFields');

        // Hide all course fields by default
        defaultCourseFields.style.display = 'none';
        nlucCourseFields.style.display = 'none';
        mlucCourseFields.style.display = 'none';
        slucCourseFields.style.display = 'none';

        // Show the corresponding course field based on the selected campus
        if (campusSelect === '0') {
            nlucCourseFields.style.display = 'block';
        } else if (campusSelect === '1') {
            mlucCourseFields.style.display = 'block';
        } else if (campusSelect === '2') {
            slucCourseFields.style.display = 'block';
        } else {
            defaultCourseFields.style.display = 'block';
        }
    }
</script>
@endsection
