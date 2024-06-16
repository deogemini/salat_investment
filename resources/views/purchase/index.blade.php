@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Management of Purchases</h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Record Purchases
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Cost</th>
                  <th scope="col">Other Cost</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Cost</th>
                  <th scope="col">Time in</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $grandTotalPurchasedCost = 0;
                    $grandTotalPurchasedOtherCost = 0;
                    $grandTotalPurchasedQuantity = 0;
                    $grandTotalPurchasedTotal =0;
                    $id=1;
                @endphp
                @foreach ($purchases as $purchase)

                <tr>
                    <td>{{ $id++}}</td>
                    <td>{{$purchase->productInventory->product_name .':'. $purchase->productInventory->reference_number}}</td>
                    <td>{{ $purchase->product_cost}}</td>
                    <td>{{ $purchase->other_product_cost}}</td>
                    <td>{{ $purchase->quantity}}</td>
                    <td>{{ formatAmount($purchase->total_cost)}}</td>
                    <td>{{ $purchase->created_at->format('Y-m-d H:i')}}</td>
                    @php
                    $grandTotalPurchasedCost += $purchase->product_cost;
                    $grandTotalPurchasedOtherCost += $purchase->other_product_cost;
                    $grandTotalPurchasedQuantity += $purchase->quantity;
                    $grandTotalPurchasedTotal += $purchase->total_cost;

                    @endphp
                  </tr>
                  @endforeach
                  <tr style="border-bottom:2px solid #F0C356;">
                    <th>Grand Total</th>
                    <td></td>
                    <td> {{$grandTotalPurchasedCost}}</td>
                    <td> {{$grandTotalPurchasedOtherCost}}</td>
                    <td> {{$grandTotalPurchasedQuantity}}</td>
                    <td> {{$grandTotalPurchasedTotal}}</td>
                    <td></td>

                  </tr>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Purchases </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('purchase.create') }}" method="post">
                        @csrf
                        <div>

                            <div class="mb-3">
                                <label class="form-label" for="hospital">Product Inventories <span id="required-field">*</span></label>
                                <select name="product_inventory_id" class="form-select">
                                    <option value="" selected>Please Select Product</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->product_name .' -> '. $item->reference_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category_name">Product Cost <span id="required-field">*</span></label>
                                <input type="number" class="form-control" name="product_cost" placeholder="Enter Product Purchased Price">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category_name">Other Product Cost <span id="required-field">*</span></label>
                                <input type="number" class="form-control" name="other_product_cost" placeholder="Enter Other Associated">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Quantity</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity of products">
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

