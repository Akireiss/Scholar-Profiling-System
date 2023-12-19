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
        <a href="{{ route('admin.student.scholarship') }}" class="btn btn-success">Back</a>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Personal Information</h5>

            <div class="row g-3">

                <div class="row">
                    <div class="col-md-6">
                        <x-label>Student ID</x-label>
                        <div class="input-group">

                            <span class="input-group-text">Student ID</span>
                            <input type="number" class="form-control" wire:model.lazy="student_id">
                            <button type="button" class="btn btn-primary" wire:click="studentSearch" wire:loading.attr="disabled">Search</button>
                        </div>

                        @if ($successMessage)
                            <div class="alert alert-success" role="alert">
                                {{ $successMessage }}
                            </div>
                        @endif

                        @if ($errorMessage)
                            <div class="alert alert-danger" role="alert">
                                {{ $errorMessage }}
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class=""> <!-- Adding margin bottom for spacing -->
                            <x-label>Campus</x-label>
                            <x-input wire:model="campus" disabled />
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <x-label>Student Type</x-label>
                    <x-input wire:model="student_type" disabled />

                </div>


                <div class="col-md-6">
                    <x-label>If new, indicate school last attended</x-label>
                    <x-input type="text" required name="school_name" wire:model="school_name" />
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>School year last attended</x-label>
                    <x-input type="text" id="validationCustom02" required name="lastYear" wire:model="lastYear" />
                    <x-feedback />
                </div>



                <div class="mx-2">Student Information</div>
                <div class="col-md-4">
                    <x-label>Last Name</x-label>
                    <x-input type="text" wire:model.lazy="lastname" />
                </div>
                <div class="col-md-4">
                    <x-label>First Name</x-label>
                    <x-input type="text" wire:model.lazy="firstname" />
                </div>
                <div class="col-md-4">
                    <x-label>Middle Name</x-label>
                    <x-input type="text" wire:model.lazy="initial" />
                </div>



                <div class="col-md-6">
                    <x-label>Sex</x-label>
                    <x-input type="text" required name="sex" wire:model="sex" />
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Civil Status</x-label>
                    <x-input type="text" id="validationCustom02" required name="civil_status"
                        wire:model="civil_status" />
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>Contact Number</x-label>
                    <x-input type="number" id="validationCustom02" required name="contact" wire:model="contact" />
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Email</x-label>
                    <x-input type="text" id="validationCustom02" required name="email" wire:model="email" />
                    <x-feedback />
                </div>


                <div class="col-md-4">
                    <x-label>Province</x-label>
                    <x-select name="province_id" wire:model="province_id">

                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->province }}</option>
                        @endforeach

                    </x-select>
                    <x-feedback />
                </div>

                <div class="col-md-4">
                    <x-label>Municipality</x-label>
                    <x-select name="municipal_id" wire:model="municipal_id">
                        @foreach ($municipalities as $municipal)
                            <option value="{{ $municipal->id }}">{{ $municipal->municipality }}</option>
                        @endforeach
                    </x-select>
                    <x-feedback />
                </div>

                <div class="col-md-4">
                    <x-label>Barangay</x-label>
                    <x-select name="barangay_id" wire:model="barangay_id">
                        @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->id }}">{{ $barangay->barangay }}</option>
                        @endforeach
                    </x-select>
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>Year Level</x-label>
                    <x-input type="number" id="validationCustom02" required name="level" wire:model="level" />
                    <x-feedback />
                </div>


                <div class="col-md-6">
                    <x-label>Course</x-label>
                    <x-input disabled type="text" id="validationCustom02" required name="course"
                        wire:model="course" />
                </div>


                <div class="mx-2">Family Information</div>
                <div class="col-md-6">
                    <x-label>Father's name</x-label>
                    <x-input type="text" required name="father" wire:model="father" />
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Mother's name</x-label>
                    <x-input type="text" id="validationCustom02" required wire:model="mother" name="mother" />
                    <x-feedback />
                </div>

                <div class="mx-2">Fund Information</div>

                <form wire:submit.prevent="saveStudentFund" class="row">

                <div class="col-md-6">
                    <x-label>Semester</x-label>
                    <x-select required wire:model="semester" name="semester" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </x-select>
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>School Year</x-label>
                    <x-select required wire:model="school_year"
                        name="school_year" >
                        <option value="2001-2002">2001-2002</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2022-2023">2022-2023</option>
                        <option value="2023-2024">2023-2024</option>
                </x-select>
                    <x-feedback />
                </div>


                    <div class="col-md-6">
                        <x-label>Scholarship Type</x-label>
                        <x-select wire:model="first_scholarship_id" name="scholarshipType">
                            <option value="0">Government</option>
                            <option value="1">Private</option>
                        </x-select>
                        <x-feedback />
                    </div>

                    <div class="col-md-6">
                        <x-label>Fund</x-label>
                        <x-select wire:model="student_firstfund_id" name="student_firstfund_id">
                            @foreach ($scholarships as $scholarship)
                                <option value="{{ $scholarship->id }}">
                                    {{ $scholarship->scholarship_name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-feedback />
                    </div>




                    <div class="col-md-6">
                        <x-label>Scholarship Type</x-label>
                        <x-select wire:model="second_scholarship_id" name="scholarshipType">
                            <option value="0">Government</option>
                            <option value="1">Private</option>
                        </x-select>
                        <x-feedback />
                    </div>

                    <div class="col-md-6">
                        <x-label>Fund</x-label>
                        <x-select wire:model="student_secondfund_id" name="student_secondfund_id">
                            @foreach ($secondScholarships as $scholarship)
                                <option value="{{ $scholarship->id }}">
                                    {{ $scholarship->scholarship_name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-feedback />
                    </div>
                    <div class="col-12 d-flex justify-content-end mt-4">
                        @if($existingStudent && $existingStudent->studentFund->isNotEmpty())
                            <button class="btn btn-success" type="submit">Update</button>
                        @else
                            <button class="btn btn-success" type="submit">Add</button>
                        @endif
                    </div>

            </form>
        </div>
    </div>

</div>
