
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
        <a href="{{ route('admin.students') }}" class="btn btn-success">Back</a>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student Data</h5>

            <form class="row g-3 needs-validation" wire:submit.prevent="saveStudent" novalidate>


                <div class="col-md-4">
                    <x-label>Student Id</x-label>
                    <x-input type="number" required wire:model="student_id" />
                    <x-feedback />
                </div>

                <div class="col-md-4">
                    <x-label>Campus</x-label>
                    <x-select id="campusSelect" onchange="toggleCourseFields()"
                    wire:model="campus" >
                        <option value="0">NLUC</option>
                        <option value="1">MLUC</option>
                        <option value="2">SLUC</option>
                        <option value="3">OUS</option>
                    </x-select>
                    <x-feedback />
                </div>

                <div class="col-md-4">
                    <x-label>Student Type</x-label>
                    <x-select wire:model="student_type" id="studentType" onchange="toggleFields()">
                        <option value="New">New</option>
                        <option value="Continuing">Continuing</option>
                        <option value="Returning">Returning</option>
                    </x-select>
                </div>

                <div class="col-md-6" id="newStudentFields" style="display:none;">
                    <x-label>If new, indicate school last attended</x-label>
                    <x-input type="text" required wire:model="school_name"/>
                    <x-feedback />
                </div>

                <div class="col-md-6" id="schoolYearFields" style="display:none;">
                    <x-label>School year last attended</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="lastYear"/>
                    <x-feedback />
                </div>


                <div>Student Information</div>
                <div class="col-md-4">
                    <x-label>Last Name</x-label>
                    <x-input type="text" required wire:model="lastname"/>
                    <x-feedback />
                </div>
                <div class="col-md-4">
                    <x-label>First Name</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="firstname"/>
                    <x-feedback />
                </div>
                <div class="col-md-4">
                    <x-label>Middle Name</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="initial"/>
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>Sex</x-label>
                    <x-input type="text" required wire:model="sex" />
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Civil Status</x-label>
                    <x-input type="text" id="validationCustom02"
                    required wire:model="civil_status"/>
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>Contact Number</x-label>
                    <x-input type="number" id="validationCustom02" required wire:model="contact"/>
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Email</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="email"/>
                    <x-feedback />
                </div>



                    <div class="col-md-4">
                        <x-label>Province</x-label>
                        <x-select wire:model="province_id">

                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->provDesc }}</option>

                            @endforeach

                        </x-select>
                        <x-feedback />
                    </div>

                    <div class="col-md-4">
                        <x-label>Municipality</x-label>
                        <x-select wire:model="municipal_id">
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->citymunCode }}">{{ $municipality->citymunDesc }}</option>
                            @endforeach
                        </x-select>
                        <x-feedback />
                    </div>

                    <div class="col-md-4">
                        <x-label>Barangay</x-label>
                        <x-select wire:model="barangay_id">
                            @foreach ($barangays as $barangay)
                                <option value="{{ $barangay->brgyCode }}">{{ $barangay->brgyDesc }}</option>
                            @endforeach
                        </x-select>
                        <x-feedback />
                    </div>

                <div class="col-md-6">
                    <x-label>Year Level</x-label>
                    <x-input type="number" id="validationCustom02" required wire:model="level"/>
                    <x-feedback />
                </div>


<div class="col-md-6" id="defaultCourseFields">
    <x-label>Course</x-label>
    <x-input disabled type="text" id="validationCustom02" required wire:model="course"/>
</div>

<div class="col-md-6" id="nlucCourseFields" style="display:none;">
    <x-label>Course NLUC</x-label>
    <x-select wire:model="courseNluc">
        @foreach ($nluc as $n)
        <option value="{{ $n->id }}">{{ $n->courses }}</option>
        @endforeach
    </x-select>
    <x-feedback />
</div>

<div class="col-md-6" id="mlucCourseFields" style="display:none;">
    <x-label>Course MLUC</x-label>
    <x-select wire:model="courseMluc">
        @foreach ($mluc as $m)
        <option value="{{ $m->id }}">{{ $m->courses }}</option>
        @endforeach
    </x-select>
    <x-feedback />
</div>

<div class="col-md-6" id="slucCourseFields" style="display:none;">
    <x-label>Course SLUC</x-label>
    <x-select wire:model="courseSluc">
        @foreach ($sluc as $s)
        <option value="{{ $s->id }}">{{ $s->courses }}</option>
        @endforeach
    </x-select>
    <x-feedback />
</div>




                <div>Parent Information</div>
                <div class="col-md-6">
                    <x-label>Father's name</x-label>
                    <x-input type="text" required wire:model="father"/>
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Mother's name</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="mother"/>
                    <x-feedback />
                </div>

                <div class="col-12 d-flex justify-content-end align-items-center">
                    <x-text-alert />
                    <div wire:loading wire:target="saveStudent" class="mx-4">
                        Loading...
                    </div>
                    <button class="btn btn-success mx-2" type="submit">Submit form</button>
                </div>
            </form>

        </div>
    </div>






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





</div>
