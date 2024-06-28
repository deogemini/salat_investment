@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Products Categories</h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Add Product Category
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                $id=1;
                @endphp
                @foreach ($categories as $category)

                <tr>
                    <td>{{ $id++}}</td>
                    <td>{{ $category->category_name}}</td>
                    <td>{{ $category->description}}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
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


<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('categories.create') }}" method="post">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="category_name">Category Name <span id="required-field">*</span></label>
                                <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Enter Description">
                            </div>
                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
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
    <!-- container-fluid -->
</div>

@endsection

