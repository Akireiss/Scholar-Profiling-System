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
          <a href="{{ route('admin.scholarship') }}" class="btn btn-success">Back</a>
      </div>


      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Personal Information</h5>

          <form class="row g-3">

       <div class="col-md-4">
        <x-label>Student Id</x-label>
        <x-input type="number" wire:model.lazy="student_id" />

        <button type="button" wire:click="studentSearch" wire:loading.attr="disabled">Search</button>

        @if($successMessage)
            <div class="alert alert-success" role="alert">
                {{ $successMessage }}
            </div>
        @endif

        @if($errorMessage)
            <div class="alert alert-danger" role="alert">
                {{ $errorMessage }}
            </div>
        @endif
    </div>

    <div>Student Information</div>
    <div class="col-md-4">
        <x-label>Last Name</x-label>
        <x-input type="text" wire:model.lazy="lastname"/>
    </div>
    <div class="col-md-4">
        <x-label>First Name</x-label>
        <x-input type="text" wire:model.lazy="firstname"/>
    </div>
    <div class="col-md-4">
        <x-label>Middle Name</x-label>
        <x-input type="text" wire:model.lazy="initial"/>
    </div>




            <div class="col-12 d-flex justify-content-end  ">
                <button class="btn btn-success" type="submit">Submit form</button>
            </div>
          </form>
        </div>
      </div>

</div>
