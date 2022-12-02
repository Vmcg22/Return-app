@extends('layouts.admin')

@section('titulo')
    <span> Create Customers </span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    @include('layouts.products.modals.create')

    <h3>Vista para dar de alta Clientes</h3>

    <form class="needs-validation" novalidate action="{{url('/customers')}}" method="POST">
      @csrf
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Ingresa el Nombre" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Ingresa la Dirección"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom02">Código</label>
                <div class="form-group">
                    <select class="form-control" id="codigo_pais" name="codigo_pais">
                        <option> USA +1 </option>
                        <option> México +52</option>
                        <option> China +86 </option>
                        <option> Alemania +355 </option>
                        <option> Argentina +54 </option>
                    </select>
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom02">Phone Nummber</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    placeholder="Ingresa el Número de Teléfono" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Ingresa la Ciudad" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Ingresa el Estado" required>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Ingresa el Código Postal"
                    required>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationCustom01">Type</label>
                <select class="custom-select my-1 mr-sm-2" id="type" name="type">
                    <option selected>Selecciona...</option>
                    <option value="1">CIO</option>
                    <option value="2">Manager</option>
                    <option value="3">Support</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationCustom02">Credit Limit</label>
                <input type="text" class="form-control" id="credit_limit" name="credit_limit" placeholder="Ingresa el Crédito Límite"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>

        <!---
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" checked="checked" id="active" name="active" required>
                <label class="form-check-label" for="invalidCheck">
                    ¿Estará Activo?
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        --->

        <button class="btn btn-primary" type="submit">Guardar Datos</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href=" {{ asset('libs/datatables/dataTables.bootstrap4.min.css') }} ">
@endpush


@push('scripts')
    <script src=" {{ asset('libs/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('libs/datatables/dataTables.bootstrap4.min.js') }} "></script>

    @if (!$errors->isEmpty())
        @if ($errors->has('post'))
            <script>
                $(function() {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function() {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif

@endpush
