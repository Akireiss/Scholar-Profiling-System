@extends('layouts.index')
@section('content')


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
        <a href="{{ route('admin.scholar.create') }}" class="btn btn-success">Add Scholarship</a>
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

                      <th>Scholar Name</th>
                      <th>Scholar Tyre</th>
                      <th>Status</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($scholars as  $scholar)

                    <tr>
                      <td>{{$scholar->scholarship_name }}</td>
                      <td>{{$scholar->scholarship_type== 0 ? 'Government' : ($scholar->scholarship_type == 1 ? 'Private' : 'Unknown') }}</td>
                      <td> {{ $scholar->status == 0 ? 'Active' : ($scholar->status == 1 ? 'Inactive' : 'Unknown') }}</td>
                        <td><a class="btn btn-success" href="{{ url('admin/scholars/edit/' . $scholar->id ) }}">
                            Edit
                        </a></td>
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
