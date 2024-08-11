@extends('layouts.dashboard')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
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
                        <button
                        class="btn btn-info btn-sm"
                        title="Edit"
                        data-bs-toggle="modal"
                        data-bs-target="#editCategory"
                        data-id="{{$category->id}}"
                        data-categoryName="{{$category->category_name}}"
                        data-categoryDescription="{{$category->description}}"
                         style="margin-right: 5px;">
                         <i class="bx bx-edit" style="margin-right: 3px;"></i> Edit
                        </button>
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
        <div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form id="edit_form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" id="category_name" class="form-control" name="category_name" required />
                        </div>
                        <div class="mb-3">
                            <label for="category_description" class="form-label">Category Description</label>
                            <input type="text" id="category_description" class="form-control" name="category_description" required />
                            <input type="hidden" name="id" id="id">
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

<script>
    document.getElementById('editCategory').addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var category_name = button.getAttribute('data-categoryName');
        var category_description = button.getAttribute('data-categoryDescription');

        var modal = this;
        modal.querySelector('#category_name').value = category_name;
        modal.querySelector('#category_description').value = category_description;

        var fullUrl = window.location.protocol + "//" + window.location.host + window.location.pathname.replace('/index', '');
        modal.querySelector('#editForm').action = fullUrl + '/update/' + id;
    });
    </script>

@endsection

