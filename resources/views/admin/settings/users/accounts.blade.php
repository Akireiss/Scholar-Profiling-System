@extends('layouts.index')
@section('content')


    <div class="pagetitle">
      <h1>User Accounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">User Accounts</li>
        </ol>
      </nav>
    </div>

    <div class="d-flex justify-content-end my-2">
        <a href="{{ route('admin.account.create') }}" class="btn btn-success">Add Account</a>
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
                        <b>N</b>ame
                      </th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                 <tbody>
                    @foreach ($users as $user)

                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->username }}</td>
                      <td>
                        {{ $user->role == 0 ? 'Admin' : ($user->role == 1 ? 'Staff' : 'Unknown Role') }}
                    </td>

                      <td></td>
                    </tr>
                    @endforeach




                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>

    @endsection
