@extends('layouts.admin')

@section('titulo')
    <span> Create Customers </span>

    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>
@endsection

@section('contenido')
    @include('layouts.products.modals.create')

    <form class="needs-validation" novalidate action="{{ url('/customers') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom01">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Ingresa el Nombre..."
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Address</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Ingresa el Correo Electrónico..." required>
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
                    placeholder="Ingresa el Número de Teléfono..." required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-9 mb-3">
                <label>GeoLocation:</label>
                <input type="text" class="form-control" id="searchInput" placeholder="Type address..." />
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label>GeoLocation:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="addressCorrect" name="addressCorrect" required>
                    <label class="form-check-label" for="invalidCheck">
                        ¿La dirección es correcta?
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>

            <div id="map">

            </div>
        </div>
        <br>

        <div class="form-row">

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Address</label>
                <input type="text" class="form-control" id="addressGoogleMaps" name="addressGoogleMaps"
                    placeholder="Calle Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid address.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Número</label>
                <input type="text" class="form-control" id="numberGoogleMaps" name="numberGoogleMaps"
                    placeholder="Número Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid address.
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Colonia</label>
                <input type="text" class="form-control" id="colonyGoogleMaps" name="colonyGoogleMaps"
                    placeholder="Colonia Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid colony.
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="zipGoogleMaps" name="zipGoogleMaps"
                    placeholder="ZIP Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="cityGoogleMaps" name="cityGoogleMaps"
                    placeholder="Ciudad Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control" id="stateGoogleMaps" name="stateGoogleMaps"
                    placeholder="Estado Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom05">País</label>
                <input type="text" class="form-control" id="countryGoogleMaps" name="countryGoogleMaps"
                    placeholder="País Geolocalización..." required readonly>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom05">Coordenadas Geográficas (Lat,Long)</label>
                <input type="text" class="form-control" id="geoCoordGoogleMaps" name="geoCoordGoogleMaps"
                    placeholder="Coordenadas Geolocalización" required readonly>
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
                <input type="text" class="form-control" id="credit_limit" name="credit_limit"
                    placeholder="Ingresa el Crédito Límite" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Guardar Datos</button>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href=" {{ asset('libs/datatables/dataTables.bootstrap4.min.css') }} ">
@endpush


@push('scripts')
    <script src=" {{ asset('libs/datatables/jquery.dataTables.min.js') }} "></script>
    <script src=" {{ asset('libs/datatables/dataTables.bootstrap4.min.js') }} "></script>
    <script src=" {{ asset('libs/Scripts/Customers/Class/DireccionGoogleMapClass.js') }} "></script>
    <script src=" {{ asset('libs/Scripts/Customers/Functions/fill.js') }} "></script>
    <script src=" {{ asset('libs/Scripts/Customers/Functions/DireccionGoogleMapClass.js') }} "></script>
    <script src=" {{ asset('libs/Scripts/Customers/FunctionsGoogleMaps/returnMap.js') }} "></script>

    <script>
        var direccionMaps;
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDcL8shIV5zZH3XYA1H6CjoH9MFUnzBD7s&callback=initMap">
    </script>
@endpush
