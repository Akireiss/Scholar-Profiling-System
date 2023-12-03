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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Repair Database</h5>

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
                    <x-label for="new_database_name">Database Name: <span class="text-sm text-danger">
                        (e.g., MyDatabase_01-2023)</span></x-label>
                    <x-input type="text" required name="database_name" id="new_database_name" />
                    @error('database_name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-4">
                    <x-label for="sql_file">Upload SQL File:</x-label>
                    <x-input type="file" required name="sql_file" id="sql_file"/>

                @error('sql_file')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                </div>
    <div class="col-12 d-flex justify-content-end align-items-center">
                        <span id="alert" class="text-success text-sm"></span>
                        <button class="btn btn-success mx-2" type="submit">Restore Database</button>
                    </div>
            </form>

        </div>
    </div>



@endsection
