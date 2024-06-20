@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Matumizi Cement  </h4>
    </div>

    <div class="card-body">

        <div class="container">
            <div class="row g-4 mb-3">
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success btn-custom" data-bs-toggle="modal" data-bs-target="#showModal">
                        <i class="ri-add-line align-bottom me-1"></i> Ingiza Stock Mpya ya Cement
                    </button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-warning btn-custom" data-bs-toggle="modal" data-bs-target="#matumiziModal">
                        <i class="ri-add-line align-bottom me-1"></i> Toa Mifuko iliyotumika
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Jina ya Cement</th>
                  <th scope="col">Bei ya kununulia</th>
                  <th scope="col">idadi ya mifuko</th>
                  <th scope="col">Gharama ya Jumla</th>
                  <th scope="col">Idadi iliyotumika</th>
                  <th scope="col">Idadi iliyobakia</th>
                  <th scope="col">Muda </th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                $grandtotalCementCost = 0;
                $grandtotalMifukondanistock=0;
                $grandtotalUsed=0;
                $grandtotalRemaining=0;
                @endphp
                @foreach ($cements as $cement)

                <tr>
                    <td>{{ $i++}}</td>
                    <td>{{ $cement->jina_cement}}</td>
                    <td>{{ $cement->buying_price}}</td>
                    <td>{{ $cement->quantity_in}}</td>
                    <td>{{$cement->total_cost}}</td>
                    <td>{{$cement->quantity_out}}</td>
                    <td>{{$cement->quantity_in - $cement->quantity_out}}</td>
                    <td>{{ $cement->updated_at}}</td>
                    <td>
                        <button class="btn btn-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#showModal-edit"
                            onclick="populateEditModal({{ json_encode($cement) }})">
                            <i class="bx bx-edit"></i> Edit
                        </button>
                    </td>
                    @php
                    $grandtotalCementCost += $cement->total_cost;
                    $grandtotalMifukondanistock += $cement->quantity_in;
                    $grandtotalUsed += $cement->quantity_out;
                    $grandtotalRemaining += ($cement->quantity_in - $cement->quantity_out  );
                    @endphp
                     </tr>
                  @endforeach

                  <tr style="border-bottom:2px solid #F0C356;">
                    <th>Grand Total</th>
                    <td></td>
                    <td></td>
                    <td>{{$grandtotalMifukondanistock}}</td>
                    <td>{{$grandtotalCementCost}}</td>
                    <td>{{$grandtotalUsed}}</td>
                    <td>{{$grandtotalRemaining}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Sajili Cement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('cement.ingizaStock') }}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label class="form-label" for="cement_name">Jina la Cement</label>
                                <input type="text   " class="form-control" name="cement_name" placeholder="andika jina la cement mfuko">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="buying_price">Bei ya Kununua</label>
                                <input type="number" class="form-control" name="buying_price" placeholder="andika bei ya mfuko mmoja wa cement">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="idadi_cement_mifuko">Jaza kiasi</label>
                                <input type="number" class="form-control" name="idadi_cement_mifuko" placeholder="andika idadi ya mifuko ya cement unayoingiza">
                            </div>

                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="matumiziModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Toa Cement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('cement.toaStock') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="aina">Chagua aina ya matumizi <span id="required-field">*</span></label>
                            <select name="cement_id" class="form-select">
                                @foreach ($cements as $item)
                                    <option value="{{ $item->id }}">{{ $item->jina_cement }} Tzs {{$item->buying_price}} Imebaki mifuko {{$item->quantity_in - $item->quantity_out }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                                <label class="form-label" for="idadi_cement_mifuko">Jaza kiasi</label>
                                <input type="number" class="form-control" name="idadi_cement_mifuko" placeholder="andika idadi ya mifuko ya cement uliotumia">
                            </div>

                            <p style="margin-top: 15px;"><b>NOTE: Fields marked with <span id="required-field">*</span> are mandatory</b></p>
                            <div class="d-flex align-items-start gap-3 mt-4">
                                <button type="submit" class="btn btn-success btn-label right ms-auto">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        {{-- edit modal --}}
      <!-- Edit Modal -->
      <div class="modal fade" id="showModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Badilisha Taarifa ya aina ya matumizi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('mashamba.update')}}" method="post">
                    @csrf
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <label for="location" class="form-label">Jina </label>
                        <input type="text" id="location" class="form-control" name="location" required />
                        <input type="text" id="id" hidden class="form-control" name="id" required />

                        <label for="buying_cost" class="form-label">maelezo</label>
                        <input type="number"  id="buying_cost" class="form-control" name="buying_cost" required />
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


@endsection


