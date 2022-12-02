@extends("layouts.admin")

@section('titulo')
    <span> Create Customers </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection

@section('contenido')

    @include('layouts.products.modals.create')

    <h3>Vista para dar de alta  Clientes</h3>

    <form class="needs-validation" novalidate>
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">Contact</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Address</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Number</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
              </div>
              <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom03">City</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom04">State</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationCustom05">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
        </div>


        <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom01">Type</label>
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            
            <div class="col-md-6 mb-3">
              <label for="validationCustom02">Credit Limit</label>
              <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>



          </div>

          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                ¿Active?
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
  

        
        <button class="btn btn-primary" type="submit">Submit form</button>
      </form>
      

@endsection

@push('styles')
    <link rel="stylesheet" href=" {{asset('libs/datatables/dataTables.bootstrap4.min.css')}} ">
@endpush


@push('scripts')
    <script src=" {{asset('libs/datatables/jquery.dataTables.min.js')}} "></script>
    <script src=" {{asset('libs/datatables/dataTables.bootstrap4.min.js')}} "></script>

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function () {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function () {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif

@endpush