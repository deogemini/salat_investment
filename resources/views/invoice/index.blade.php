@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Management of Invoices </h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Create Invoice</a>

                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                    <th>SN</th>
        <th>Customer Name</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
              </thead>
              <tbody>
@php
    $i=1;
@endphp
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $invoice->customer_name }}</td>
                    <td>{{ $invoice->total_amount }}</td>
                    <td>{{ $invoice->is_paid ? 'Paid' : 'Unpaid' }}</td>
                    <td>
                        <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-warning">Download PDF</a>
                    </td>
                </tr>
                @endforeach
              </tbody>

</table>
</div>
@endsection
