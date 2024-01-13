@extends('layouts.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Profit and Loss Report</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <div class="btn-group me-2">
            <a href="{{ route('export.profitloss.report') }}" class="btn btn-sm btn-outline-secondary">Export</a>
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
        <th scope="col">Total Cost Purchase </th>
        <th scope="col">Total Sales</th>
        <th scope="col" >Profit/Loss</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($inventoryProducts as $inventoryProduct)
      <tr>
        <td>{{ $inventoryProduct->id }}</td>
        <td>{{ $inventoryProduct->product_name }}</td>
        <td>{{ $inventoryProduct->purchasedProducts->sum('total_cost')}}</td>
        <td>{{ $inventoryProduct->productSales->sum('total_cost') }}</td>
        <td>{{ $inventoryProduct->productSales->sum('total_cost') - $inventoryProduct->purchasedProducts->sum('total_cost') }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
