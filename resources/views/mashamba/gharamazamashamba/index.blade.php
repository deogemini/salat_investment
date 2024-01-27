@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0 text-center">Gharama za Kuhudumia Mashamba </h4>
    </div>

    <div class="card-body">

        <div class="row g-4 mb-3 justify-content-end">
            <div class="col-sm-auto">
                <div>
                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#showModal">
                        <i class="ri-add-line align-bottom me-1"></i> Ingiza Gharama zote za Shambani
                    </button>
                </div>
            </div>
            <div class="col-sm-auto">
                <div>
                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#addMojaMojaModal">
                        <i class="ri-add-line align-bottom me-1"></i> Ingiza Gharama moja moja za Shambani
                    </button>
                </div>
            </div>
        </div>



        <div class="table-responsive table-card mt-3 mb-1">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Jina la Shamba</th>
                  <th scope="col">Gharama ya kusafisha shamba</th>
                  <th scope="col">Gharama ya kulima</th>
                  <th scope="col">Gharama ya mbegu</th>
                  <th scope="col">Gharama ya Kupanda</th>
                  <th scope="col">Gharama ya kupalilia</th>
                  <th scope="col">Idadi ya mifuko ya Mbolea</th>
                  <th scope="col">Gharama za mbolea</th>
                  <th scope="col">Nauli za pikipiki</th>
                  <th scope="col">Wafanyakazi</th>
                  <th scope="col">Mwaka wa Kilimo</th>
                  <th scope="col">Jumla ya Gharama</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($gharama_za_mashamba as $shamba)

                <tr>
                    <td>{{ $shamba->id}}</td>
                    <td>{{"Shamba ". $shamba->mashamba->location }}</td>
                    <td>{{$shamba->kusafisha_shamba }}</td>
                    <td>{{$shamba->kulima_shamba }}</td>
                    <td>{{$shamba->mbegu_za_shamba }}</td>
                    <td>{{$shamba->kupalilia_shamba }}</td>
                    <td>{{$shamba->kupanda_shamba }}</td>
                    <td>{{$shamba->mifuko_ya_mbolea }}</td>
                    <td>{{$shamba->gharama_za_mbolea }}</td>
                    <td>{{$shamba->nauli_pikipiki }}</td>
                    <td>{{$shamba->wafanyakazi }}</td>
                    <td>{{$shamba->muda_msimu_mwaka }}</td>
                    <td>{{$shamba->total }}</td>
                    <td>
                        {{-- <a href="{{ route('sales.edit',$product_sales->id )}}"> --}}
                        <button class="btn btn-info btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="showModal-edit"><i class="bx bx-edit"></i> Edit </button></td>
                  </tr>
                  @endforeach
                    <tr style="border-bottom:2px solid #F0C356;">
                        <th>Grand Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Sajili  zote zilizotumika Shamba</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('gharama_mashamba.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="hospital">Product Inventories <span id="required-field">*</span></label>
                            <select name="mashamba_id" class="form-select">
                                <option value="" selected>Please Select Product</option>
                                @foreach ($mashamba as $item)
                                    <option value="{{ $item->id }}">{{ 'Shamba la ' . $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama ya kusafisha shamba</label>
                                <input type="number" class="form-control" name="kusafisha_shamba" placeholder="andika gharama ya kusafisha shamba">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama ya Kulima shamba</label>
                                <input type="number" class="form-control" name="kulima_shamba" placeholder="andika gharama ya kulima shamba">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="description">Gharama ya Mbegu</label>
                                    <input type="number" class="form-control" name="mbegu_za_shamba" placeholder="andika gharama kununua mbegu">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="description">Gharama za kupanda</label>
                                    <input type="number" class="form-control" name="kupanda_shamba" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama za kupalilia</label>
                                <input type="number" class="form-control" name="kupalilia_shamba" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="description">Idadi ya Mifuko ya Mbolea</label>
                                    <input type="number" class="form-control" name="mifuko_ya_mbolea" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="description">Gharama za kuweka Mbolea</label>
                                    <input type="number" class="form-control" name="gharama_za_mbolea" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama za pikipiki</label>
                                <input type="number" class="form-control" name="nauli_pikipiki" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama za wafanyakazi</label>
                                <input type="number" class="form-control" name="wafanyakazi" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Msimu wa kilimo</label>
                                <input type="text" class="form-control" name="muda_msimu_mwaka" placeholder="Andika Mwaka/Tarehe ya siku uliponunua shamba">
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
</div>

<div class="modal fade" id="addMojaMojaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Sajili gharama moja moja zilizotumika Shamba</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="card-body form-steps">
                    <form id="registration_form" action="{{ route('gharama_mashamba.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="hospital">Mashamba Yaliyopo <span id="required-field">*</span></label>
                            <select name="mashamba_id" class="form-select">
                                <option value="" selected>Chagua Shamba</option>
                                @foreach ($mashamba as $item)
                                    <option value="{{ $item->id }}">{{ 'Shamba la ' . $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="hospital">Mashamba Yaliyopo <span id="required-field">*</span></label>
                            <select name="gharama_husika" class="form-select">
                                <option value="" selected>Chagua Gharama</option>
                                    <option value="kusafisha_shamba">Gharama za Kusafisha Shamba</option>
                                    <option value="kulima_shamba">Gharama za Kulima Shamba</option>
                                    <option value="mbegu_za_shamba">Gharama za Mbegu </option>
                                    <option value="kupanda_shamba">Gharama za Kupanda Shamba</option>
                                    <option value="kupalilia_shamba">Gharama za Kupalilia Shamba</option>
                                    <option value="gharama_za_mbolea">Gharama za Mifuko ya mbolea</option>
                                    <option value="nauli_pikipiki">Gharama za nauli za pikipiki</option>
                                    <option value="wafanyakazi">Gharama za wafanyakazi</option>
                                    <option value="mifuko_ya_mboleaa">Gharama za wafanyakazi</option>
                            </select>
                        </div>

                            <div class="mb-3">
                                <label class="form-label" for="description">Gharama iliyotumika</label>
                                <input type="number" class="form-control" name="thamani_yenyewe" placeholder="andika gharama ya kulima shamba">
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
</div>

        {{-- edit modal --}}
    <div class="modal fade" id="showModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sales</h5>
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




@endsection


