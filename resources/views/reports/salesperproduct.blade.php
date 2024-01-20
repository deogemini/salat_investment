@extends('layouts.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Profit for Each Sales</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <div class="btn-group me-2">
            <a href="{{ route('export.sales.report') }}" class="btn btn-sm btn-outline-secondary">Export</a>
        </div>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span data-feather="calendar"></span>
          This week
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Today</a></li>
          <li><a class="dropdown-item" href="#">This week</a></li>
          <li><a class="dropdown-item" href="#">This month</a></li>
          <li><a class="dropdown-item" href="#">This year</a></li>
        </ul>
      </div>

    </div>
  </div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Purchased Cost  </th>
        <th scope="col" >Sales Price</th>
        <th scope="col">Quantity Sold Out</th>
        <th scope="col" >Profit Made</th>
      </tr>
    </thead>
    <tbody>
        @php $i = 1;
        $grandTotalPurchasedTotal =0;
        $grandTotalPurchaseditems =0;
        @endphp
      @foreach($inventorySales as $sale)
      <tr>
        <td>{{ $i++ }}</td>

        <td> {{ $sale['product_name'] }}</td>
        <td>{{ $sale['product_cost'] }}</td>
        <td>{{ $sale['product_sale_price'] }}</td>
        <td>{{ $sale['product_quantity_sold'] }}</td>
        <td>{{ $sale['profit_per_product'] }}</td>

        @php

        $grandTotalPurchasedTotal += $sale['profit_per_product'];
        $grandTotalPurchaseditems += $sale['product_quantity_sold'];

        @endphp
      </tr>

      @endforeach
      <tr style="border-bottom:2px solid #F0C356;">
        <th>Grand Total</th>
        <td></td>
        <td></td>
        <td></td>
        <td> {{ $grandTotalPurchaseditems}}</td>
        <td> {{   $grandTotalPurchasedTotal}}</td>
      </tr>

    </tbody>

  </table>
</div>
@endsection
