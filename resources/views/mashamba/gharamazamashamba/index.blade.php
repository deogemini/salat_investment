@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Gharama za Kuhudumia Mashamba </h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Sajili Mashamba
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Jina la Shamba</th>
                  <th scope="col">Gharama ya kununua shamba</th>
                  <th scope="col">Ukubwa wa shamba (Hekari)</th>
                  <th scope="col">Lini Limenunuliwa</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mashamba as $shamba)

                <tr>
                    <td>{{ $shamba->id}}</td>
                    <td>{{"Shamba ". $shamba->location }}</td>
                    <td>{{ $shamba->buying_cost}}</td>
                    <td>{{ $shamba->size}}</td>
                    <td>{{ $shamba->date_of_buying}}</td>
                    <td>
                        {{-- <a href="{{ route('sales.edit',$product_sales->id )}}"> --}}
                        <button class="btn btn-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="showModal-edit"><i class="bx bx-edit"></i> Edit </button></td>
                  </tr>
                  @endforeach
              </tbody>


            </table>

    </div>

</div>

</div>


<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Sajili Shamba</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('mashamba.create') }}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label class="form-label" for="description">Eneo Shamba lilipo</label>
                                <input type="text" class="form-control" name="location" placeholder="andika jina la eneo shamba lilipo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama ya kununua shamba</label>
                                <input type="text" class="form-control" name="buying_cost" placeholder="andika gharama uliyonunulia shamba">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Ukubwa wa Shamba</label>
                                <input type="text" class="form-control" name="size" placeholder="Andika Ukubwa wa shamba">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Siku Shamba liliponuliwa</label>
                                <input type="text" class="form-control" name="date_of_buying" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                            </div>
                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        {{-- edit modal --}}
        <div class="modal fade" id="showModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form id="edit_form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email-field" class="form-label">Name</label>
                            <input type="text" id="full_name" class="form-control" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email-field" class="form-label">Phone Number</label>
                            <input type="number" id="phone_number" class="form-control" name="phone_number" required />
                            <input type="hidden" name="user_id" id="user_id">
                        </div>
                        <div class="mb-3" id="update_alert">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="update_btn"> <i class=" bx bxs-save"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>




@endsection


