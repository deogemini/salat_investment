@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Inventory Management</h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Add Product in Stock
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Category</th>
                  <th scope="col">Retails</th>
                  {{-- <th scope="col">Whole Sale Price</th> --}}
                  <th scope="col">Stock Purchased Quantity</th>
                  <th scope="col">Remaining Stock Quantity</th>
                  <th scope="col">Time In</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($inventories as $inventory)

                <tr>
                    <td>{{$inventory->id}}</td>
                    <td>{{ $inventory->product_name .' ->'.' ' . $inventory->reference_number }}</td>
                    <td>{{$inventory->product_description}}</td>
                    <td>{{$inventory->productCategory->category_name}}</td>
                    <td>{{$inventory->retail_price}}</td>
                    {{-- <td>{{$inventory->whole_sale_price}}</td> --}}
                    <td>{{$inventory->quantity_in}}</td>
                    <td>{{$inventory->quantity_now}}</td>
                    <td>{{$inventory->created_at}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Product in Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form action="{{ route('inventory.create') }}" method="post">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="category_name">Product Name <span id="required-field">*</span></label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Name of Product">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description</label>
                                <input type="text" class="form-control" name="product_description" placeholder="Enter product Description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Retail Price</label>
                                <input type="number" class="form-control" name="retail_price" placeholder="set retail price ">
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="description">Wholesale price</label>
                                <input type="number" class="form-control" name="whole_sale_price" placeholder="set whole sale price">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label" for="hospital">Product Categories <span id="required-field">*</span></label>
                                <select name="product_category_id" class="form-select">
                                    <option value="" selected>Please Select Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
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

