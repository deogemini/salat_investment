@extends('layouts.dashboard')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0 text-center">Data za Aina ya Matumizi </h4>
        </div>

        <div class="card-body">
            <div class="row g-4 mb-3 ">
                <div class="col-sm-auto text-right">
                    <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                            <i class="ri-add-line align-bottom me-1"></i> Sajili Aina Matumizi
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table table-striped table-sm" id="myDataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Aina ya Matumizi</th>
                            <th scope="col">Maelezo Yake</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($ainamatumizi as $matumizi)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $matumizi->name }}</td>
                            <td>{{ $matumizi->description }}</td>
                            <td>

                                <button class="btn btn-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#showModal-edit"
                                    <i class="bx bx-edit"></i> Edit
                                </button>

                                <form action="{{ route('ainamatumizi.destroy', $matumizi->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="bx bx-trash"></i> Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Sajili Matumizi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="card-body form-steps">
                <form id="registration_form" action="{{ route('ainamatumizi.create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="andika jina ya aina ya matumizi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_of_buying">Maelezo ya Matumizi</label>
                        <input type="text" class="form-control" name="description" placeholder="Andika Maelezo yake" required>
                    </div>
                    <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are mandatory</b></p>
                    <div class="d-flex align-items-start gap-3 mt-4">
                        <button type="submit" class="btn btn-success btn-label right ms-auto">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="showModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update the Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="{{ route('ainamatumizi.update')}}" method="PUT">
                @csrf
                <div class="modal-body">
                    <label for="editName" class="form-label">Name of Expenditure</label>
                    <input type="text" id="editName" value="{{$matumizi->name}}" class="form-control" name="name" required />

                    <label for="editDescription" class="form-label">Description of Expenditure</label>
                    <input type="text" id="editDescription" value="{{$matumizi->description}}"class="form-control" name="description" required />
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
