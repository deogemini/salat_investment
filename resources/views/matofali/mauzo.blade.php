@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Data za Mauzo ya Tofali </h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 ">
            <div class="col-sm-auto text-right">
                <div>
                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal" >
                            <i class="ri-add-line align-bottom me-1"></i> Ingiza Mauzo ya Tofali
                        </button>

                </div>
            </div>
        </div>
        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm" id="myDataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Maelezo</th>
                  <th scope="col">Bei ya kuuza</th>
                  <th scope="col">Idadi yaliyouzwa</th>
                  <th scope="col">Jumla</th>
                  <th scope="col">Muda</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                $grandtotalndanistock=0;
                $grandtotalIliyouzwa=0;
                $grandtotalIliyobakia=0;
                @endphp
                @foreach ($mauzo_tofali as $matofali)

                <tr>
                    <td>{{ $i++}}</td>
                    <td>{{$matofali->tofali->special_code }}</td>
                    <td>{{$matofali->tofali->bei_rejareja }}</td>
                    <td>{{$matofali->quantity }}</td>
                    <td>{{$matofali->total_cost}} </td>
                    <td>{{$matofali->updated_at}} </td>
                    <td>
                        <button class="btn btn-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#showModal-edit"
                            onclick="populateEditModal({{ json_encode($matofali) }})">
                            <i class="bx bx-edit"></i> Edit
                        </button>
                    </td>
                    @php
                    $grandtotalIliyouzwa += $matofali->quantity;
                    $grandtotalIliyobakia += $matofali->total_cost;
                    @endphp
                     </tr>
                  @endforeach

              </tbody>
              <tfoot>

                <tr style="border-bottom:2px solid #F0C356;">
                    <th>Grand Total</th>
                    <td></td>
                    <td></td>
                    <td>{{$grandtotalIliyouzwa}}</td>
                    <td>{{$grandtotalIliyobakia}}</td>
                  </tr>
              </tfoot>


            </table>

    </div>

</div>

</div>


<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Sajili Mauzo Matofali</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('matofaliMauzo.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="aina">Chagua stock ya Tofali <span id="required-field">*</span></label>
                            <select name="matofali_stock_id" class="form-select">
                                @foreach ($tofalizote as $item)
                                    <option value="{{ $item->id }}">{{ $item->special_code }} ni Shilingi {{$item->bei_rejareja}} yamebaki {{$item->idadi_matofali_stock - $item->idadi_matofali_soldout}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                                <label class="form-label" for="quantity">jaza kiasi</label>
                                <input type="number" class="form-control" name="quantity" placeholder="andika idadi ya matofali uliyouza">
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




<script>
    function populateEditModal(shambaData) {
        // Populate modal fields with data
        document.getElementById('id').value = shambaData.id;
        document.getElementById('location').value = shambaData.location;
        document.getElementById('buying_cost').value = shambaData.buying_cost;
        document.getElementById('size').value = shambaData.size;
        document.getElementById('date_of_buying').value = shambaData.date_of_buying;

        // You can add more fields based on your shamba object properties
    }
</script>


@endsection


