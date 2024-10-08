@extends('layouts.dashboard')

@section('content')
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h4 class="card-title mb-0 text-center">Manage Sales Deposition</h4>
        </div>

        <div class="card-body">

            <div class="row g-4 mb-3 ">
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                        <i class="ri-add-line align-bottom me-1"></i> Add Sales Deposition
                    </button>

                </div>
            </div>

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table table-striped table-sm" id="myDataTable">
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
                            $grandTotalDeposited = 0;
                            $i = 1;
                        @endphp
                        @foreach ($depositions as $deposition)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $deposition->depositer_name }}</td>
                                <td>{{ $deposition->bankAccount->bank_name ?? '0' }}</td>
                                <td>{{ $deposition->bankAccount->account_number ?? '0' }}</td>
                                <td>{{ $deposition->bankAccount->account_name ?? '0' }}</td>
                                <td>{{ formatAmount($deposition->amount) }}</td>
                                <td>{{ $deposition->created_at }}</td>
                                @php

                                    $grandTotalDeposited += $deposition->amount;
                                @endphp
                            </tr>
                        @endforeach

                    </tbody>

                    <tfoot>
                        <tr style="border-bottom:2px solid #F0C356;">
                            <th>Grand Total</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ formatAmount($grandTotalDeposited) }}</td>
                            <td></td>
                        </tr>

                    </tfoot>


                </table>

            </div>

        </div>

    </div>

    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h4 class="card-title mb-0 text-center">Manage Withdraw</h4>
        </div>

        <div class="card-body">

            <div class="row g-4 mb-3 ">
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                        data-bs-target="#showModalWithdraw">
                        <i class="ri-add-line align-bottom me-1"></i> Make withdrawal
                    </button>

                </div>
            </div>

            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table table-striped table-sm" id="myDataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Withdrawer Name</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Bank Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Day & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $grandTotalDeposited = 0;
                            $i = 1;
                        @endphp
                        @foreach ($withdraws as $withdraws)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $withdraws->withdrawer_name }}</td>
                                <td>{{ $withdraws->description }}</td>
                                <td>{{ $withdraws->bankAccount->bank_name ?? '0' }}</td>
                                <td>{{ $withdraws->bankAccount->account_number ?? '0' }}</td>
                                <td>{{ $withdraws->bankAccount->account_name ?? '0' }}</td>
                                <td>{{ formatAmount($withdraws->amount) }}</td>
                                <td>{{ $withdraws->created_at }}</td>
                                @php

                                    $grandTotalDeposited += $withdraws->amount;
                                @endphp
                            </tr>
                        @endforeach

                    </tbody>

                    <tfoot>

                        <tr style="border-bottom:2px solid #F0C356;">
                            <th>Grand Total</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ formatAmount($grandTotalDeposited) }}</td>
                            <td></td>
                        </tr>
                    </tfoot>


                </table>

            </div>

        </div>

    </div>



    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label class="form-label" for="category_name">Depositor Name <span
                                        id="required-field">*</span></label>
                                <input type="text" class="form-control" name="depositer_name"
                                    placeholder="Enter Category Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="hospital">Bank Account <span
                                        id="required-field">*</span></label>
                                <select name="bankaccount_id" class="form-select">
                                    <option value="" selected>Please Select Account</option>
                                    @foreach ($bankAccounts as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->bank_name . ' ' . $item->account_name . ' ' . $item->account_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter Description">
                            </div>
                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are
                                    mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="showModalWithdraw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Make with draw</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('deposition.withdraw') }}" method="post">
                        @csrf
                        <div>
                            <div class="mb-3">
                                <label class="form-label" for="withdrawer_name">Withdrawer Name <span
                                        id="required-field">*</span></label>
                                <input type="text" class="form-control" name="withdrawer_name"
                                    placeholder="Name of will with draw money">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Maelezo <span
                                        id="required-field">*</span></label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="andika maelezo ya kutoa pesa">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="hospital">Bank Account <span
                                        id="required-field">*</span></label>
                                <select name="bankaccount_id" class="form-select">
                                    <option value="" selected>Please Select Account</option>
                                    @foreach ($bankAccounts as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->bank_name . ' ' . $item->account_name . ' ' . $item->account_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Amount</label>
                                <input type="number" class="form-control" name="amount"
                                    placeholder="Enter Description">
                            </div>
                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span>
                                    are mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
