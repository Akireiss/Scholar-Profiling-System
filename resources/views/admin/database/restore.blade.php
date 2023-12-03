@include('layouts.header')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">User Information</h5>
<form action="{{ route('restore.database') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <x-label for="new_database_name">Database Name: <span class="text-sm text-danger">(e.g., MyDatabase_01-2023)</span></x-label>
        <input type="text" required name="database_name" id="new_database_name" class="border rounded p-2 w-full"/>
        @error('database_name')
        <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-4">
        <x-label for="sql_file">Upload SQL File:</x-label>
        <input type="file" required name="sql_file" id="sql_file"
            class="block w-full border border-gray-200 shadow-sm rounded-md text-sm
            file:bg-transparent file:border-0
            file:bg-gray-100 file:mr-4
            file:py-2.5 file:px-4">

    @error('sql_file')
    <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
    </div>
<div class="col-12 d-flex justify-content-end align-items-center">
            <span id="alert" class="text-success text-sm"></span>
            <button class="btn btn-success mx-2" type="submit">Update Profile</button>
        </div>
</form>
    </div>
</div>
@include('layouts.footer')
