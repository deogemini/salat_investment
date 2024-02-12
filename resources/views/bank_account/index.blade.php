@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Bank Accounts Management</h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Add Bank Account
                        </button>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Name</th>
                  <th scope="col">Account Number</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bankAccounts as $bankAccount)

                <tr>
                    <td>{{ $bankAccount->id}}</td>
                    <td>{{ $bankAccount->bank_name}}</td>
                    <td>{{ $bankAccount->account_name}}</td>
                    <td>{{ $bankAccount->account_number}}</td>
                  </tr>
                  @endforeach
              </tbody>


            </table>

    </div>

</div>

</div>

<div class="card" style="margin-top: 30px;">
    <div class="card-header">
        <h3 class="card-title mb-0 text-center">Summary of Accounts</h3>
    </div>

    <div class="card-body">
     <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Name</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
              @php
                   $i = 1;
              @endphp
  @foreach($bankAccounts as $bankAccount)
   <tr>
                <td>{{$i++}}</td>
                    <td>{{ $bankAccount->bank_name }}</td>
                    <td>{{ $bankAccount->account_number }}</td>
                    <td>{{ $bankAccount->account_name }}</td>
                    <td>{{ $bankAccount->totalDeposited }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Bank Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('bankaccount.create') }}" method="post">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="bank_name">Bank Name <span id="required-field">*</span></label>
                                <input type="text" class="form-control" name="bank_name" placeholder="Enter Three Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="account_name">Account Name</label>
                                <input type="text" class="form-control" name="account_name" placeholder="Enter Account Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="account_number">Account Number</label>
                                <input type="text" class="form-control" name="account_number" placeholder="Enter Account">
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

