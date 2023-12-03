@extends('layouts.index')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">User Information</h5>
            <form action="{{ route('manual.backup') }}" method="POST">
                @csrf
                @method('post')
                <p>
                    Creating regular backups of your database is crucial for data integrity and system recovery.
                    In case of unexpected events or data loss, having a recent backup ensures that you can
                    restore your system to a known, stable state. Please follow the steps below to perform a
                    system backup:
                </p>
                    <li>Click the "Perform System Backup" button below.</li>
                    <li>Wait for the backup process to complete.</li>
                    <li>Download and store the backup file in a secure location.</li>

                    <div class="col-12 d-flex justify-content-end align-items-center">
                        <span id="alert" class="text-success text-sm"></span>
                        <button class="btn btn-success mx-2" type="submit">Back Up</button>
                    </div>
            </form>
        </div>
    </div>

    <!-- Restore Database Form -->
    <div class="flex-1">
        <div class="bg-white px-6 py-4 shadow rounded-lg">
            <h6 class="text-md my-1  font-bold uppercase mt-1">Repair Database</h2>

            @if (session('success'))
                <div class="text-success p-2 rounded text-green-700 mb-2">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="text-danger p-2 rounded text-red-700 mb-2">
                    {{ session('error') }}
                </div>
            @endif

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



@endsection
