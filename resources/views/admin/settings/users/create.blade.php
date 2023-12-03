@extends('layouts.index')
@section('content')
    <div>

        <div class="pagetitle">
            <h1>Create User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">User Create</li>
                </ol>
            </nav>
        </div>


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Information</h5>

                <form class="row g-3 needs-validation" novalidate method="POST">
                    @csrf
                    @method('post')


                    <div class="col-md-6">
                        <x-label>Name</x-label>
                        <x-input type="text" required id="name" name="name" />
                        <x-feedback />
                    </div>

                    <div class="col-md-6">
                        <x-label>Username</x-label>
                        <x-input type="text" id="username" required name="username" />
                        <x-feedback />
                    </div>


                    <div class="col-md-6">
                        <x-label>Password</x-label>
                        <x-input type="text" required name="password" id="password" />
                        <x-feedback />
                    </div>
                    <div class="col-md-6">
                        <x-label>Role</x-label>
                        <x-select name="role" id="role">
                            <option value="0">Admin</option>
                            <option value="1">Staff</option>
                        </x-select>
                        <x-feedback />
                    </div>
                    <div class="col-12 d-flex justify-content-end align-center">
                        <span id="alert" class="text-success text-sm"></span>
                        <button class="btn btn-success mx-2" type="submit">Update Profile</button>
                    </div>

                </form>

            </div>
        </div>


    </div>



   <!-- Your existing form code -->

   <script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('create.user') }}',
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
