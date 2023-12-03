@extends('layouts.index')
@section('content')

<div>

    <div class="pagetitle">
        <h1>User Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
            </ol>
        </nav>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Information</h5>

            <form id="updateProfileForm" class="row g-3 needs-validation" novalidate method="POST"
             action="{{ route('admin.update.profile') }}">
                @csrf



                <div class="col-md-6">
                    <x-label>Name</x-label>
                    <x-input type="text" required name="name" value="{{ $user->name }}"/>
                    <x-feedback />
                </div>

                <div class="col-md-6">
                    <x-label>Username</x-label>
                    <x-input type="text" id="validationCustom02" required name="username" value="{{ $user->username }}"/>
                    <x-feedback />
                </div>


                <div class="col-md-6">
                    <x-label>Password</x-label>
                    <x-input type="text"  name="password"/>
                    <x-feedback />
                </div>
                <div class="col-md-6">
                    <x-label>Role</x-label>
                    <x-select required name="role">
                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Staff</option>
                    </x-select>
                    <x-feedback />
                </div>


                <div class="col-12 d-flex justify-content-end align-items-center">
                    <span id="alert" class="text-success text-sm"></span>
                    <button class="btn btn-success mx-2" type="submit">Update User</button>
                </div>
            </form>

        </div>
    </div>


</div>
<script>
 $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.update.profile') }}',
                data: $('form').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#alert').removeClass('text-danger').addClass('text-success').text('User created successfully');
                },
                error: function (error) {
                    console.log(error);
                    $('#alert').removeClass('text-success').addClass('text-danger').text('Error creating user. Please check the form inputs.');
                }
            });
        });
    });
</script>
@endsection
