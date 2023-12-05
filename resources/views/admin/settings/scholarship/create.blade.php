@extends('layouts.index')
@section('content')


@if (request()->routeIs('admin.scholar.store'))
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

                <form id="scholarCreate" class="row g-3 needs-validation">
                    @csrf
                    @method('post')

                    <div class="col-md-4">
                        <x-label>Scholar Name</x-label>
                        <x-input type="text" required name="scholarship_name" />
                        <x-feedback />
                    </div>

                    <div class="col-md-4">
                        <x-label>Student Type</x-label>
                        <x-select name="scholarship_type" id="scholarship_type" >
                            <option value="0">Government</option>"
                            <option value="1">Private</option>
                        </x-select>
                    </div>


                    <div class="col-md-4">
                        <x-label>Status</x-label>
                        <x-select name="status">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </x-select>
                    </div>


                    <div class="col-12 d-flex justify-content-end align-items-center">
                            <span id="alert"></span>
                        <button class="btn btn-success mx-2" type="submit">Submit form</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endif


@if (request()->routeIs('admin.scholar.edit'))
<div>

    <div class="pagetitle">
        <h1>Scholarships</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Scholarships Edit</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('admin.students') }}" class="btn btn-success">Back</a>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student Data</h5>
            <form id="scholarUpdate" class="row g-3 needs-validation"
            method="post">
                @csrf
                @method('PUT')

                <div class="col-md-4">
                    <x-label>Scholar Name</x-label>
                    <x-input type="text" required name="scholarship_name" value="{{ $scholar->scholarship_name }}" />
                    <x-feedback />
                </div>

                <div class="col-md-4">
                    <x-label>Student Type</x-label>
                    <x-select name="scholarship_type" id="scholarship_type" >
                        <option value="0" {{ $scholar->scholarship_type == 0 ? 'selected' : '' }}>Government</option>"
                        <option value="1" {{ $scholar->scholarship_type == 1 ? 'selected' : '' }}>Private</option>"

                    </x-select>
                </div>


                <div class="col-md-4">
                    <x-label>Status</x-label>
                    <x-select name="status">
                        <option value="0" {{ $scholar->role == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $scholar->role == 1 ? 'selected' : '' }}>Staff</option>

                    </x-select>
                </div>


                <div class="col-12 d-flex justify-content-end align-items-center">
                        <span id="alert"></span>
                    <button class="btn btn-success mx-2" type="submit">Update Form</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endif



{{-- Create  --}}
   <script>
    $(document).ready(function () {
        $('#scholarCreate').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.scholar.store') }}',
                data: $('form').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#alert').removeClass('text-danger').addClass('text-success').text('Scholar successfully');
                },
                error: function (error) {
                    console.log(error);
                    $('#alert').removeClass('text-success').addClass('text-danger').text('Error creating user. Please check the form inputs.');
                }
            });
        });
    });
</script>

{{-- Update  --}}
<script>
    $(document).ready(function () {
        $('#scholarUpdate').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.scholar.update', ['scholar' => $scholar->id]) }}', // Include the ID in the URL
                data: $('#scholarUpdate').serialize(), // Use the correct form ID
                success: function (response) {
                    console.log(response);
                    $('#alert').removeClass('text-danger').addClass('text-success').text('Scholar updated successfully.');
                },
                error: function (error) {
                    console.log(error);
                    $('#alert').removeClass('text-success').addClass('text-danger').text('Error updating scholar. Please check the form inputs.');
                }
            });
        });
    });
</script>


@endsection
