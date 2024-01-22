@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Manage Sales Deposition</h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Add Sales Deposition
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Depositor Name</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">Account Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Day & Time</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $grandTotalDeposited =0;
                @endphp
                @foreach ($depositions as $deposition)

                <tr>
                    <td>{{ $deposition->id}}</td>
                    <td>{{ $deposition->depositer_name}}</td>
                    <td>{{ $deposition->bank_name}}</td>
                    <td>{{ $deposition->account_number}}</td>
                    <td>{{ $deposition->account_name}}</td>
                    <td>{{ $deposition->amount}}</td>
                    <td>{{ $deposition->created_at}}</td>
                    @php

                    $grandTotalDeposited += $deposition->amount;
                    @endphp
                  </tr>
                  @endforeach
                  <tr style="border-bottom:2px solid #F0C356;">
                    <th>Grand Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{  $grandTotalDeposited }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Sales Deposition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('deposition.create') }}" method="post">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="category_name">Depositor Name <span id="required-field">*</span></label>
                                <input type="text" class="form-control" name="depositer_name" placeholder="Enter Category Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" placeholder="Enter Description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Account Number</label>
                                <input type="text" class="form-control" name="account_number" placeholder="Enter Description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Account Name</label>
                                <input type="text" class="form-control" name="account_name" placeholder="Enter Description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter Description">
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

