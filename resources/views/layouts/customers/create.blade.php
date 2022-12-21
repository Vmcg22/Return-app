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
                <input type="text" class="form-control {{$errors->has('contact') ? 'is-invalid' : ''}}" id="contact" name="contact" placeholder="Ingresa el Nombre..."
                    required>

                @if ($errors->has('contact'))
                    <span class="text-danger"> {{ $errors->first('contact') }} </span>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Address</label>
                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email"
                    placeholder="Ingresa el Correo Electrónico..." required>
                
                @if ($errors->has('email'))
                    <span class="text-danger"> {{ $errors->first('email') }} </span>
                @endif

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
                <input type="text" class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}" id="phone_number" name="phone_number"
                    placeholder="Ingresa el Número de Teléfono..." required>

                @if ($errors->has('phone_number'))
                    <span class="text-danger"> {{ $errors->first('phone_number') }} </span>
                @endif
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
                <input type="text" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" id="addressGoogleMaps" name="addressGoogleMaps"
                    placeholder="Calle Geolocalización..." required readonly>
                
                @if ($errors->has('address'))
                    <span class="text-danger"> {{ $errors->first('address') }} </span>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Número</label>
                <input type="text" class="form-control {{$errors->has('number') ? 'is-invalid' : ''}}" id="numberGoogleMaps" name="numberGoogleMaps"
                    placeholder="Número Geolocalización..." required readonly>
                
                @if ($errors->has('number'))
                    <span class="text-danger"> {{ $errors->first('number') }} </span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Colonia</label>
                <input type="text" class="form-control {{$errors->has('colony') ? 'is-invalid' : ''}}" id="colonyGoogleMaps" name="colonyGoogleMaps"
                    placeholder="Colonia Geolocalización..." required readonly>

                @if ($errors->has('colony'))
                    <span class="text-danger"> {{ $errors->first('colony') }} </span>
                @endif
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control {{$errors->has('zip') ? 'is-invalid' : ''}}" id="zipGoogleMaps" name="zipGoogleMaps"
                    placeholder="ZIP Geolocalización..." required readonly>

                @if ($errors->has('zip'))
                    <span class="text-danger"> {{ $errors->first('zip') }} </span>
                @endif
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control {{$errors->has('city') ? 'is-invalid' : ''}}" id="cityGoogleMaps" name="cityGoogleMaps"
                    placeholder="Ciudad Geolocalización..." required readonly>

                @if ($errors->has('city'))
                    <span class="text-danger"> {{ $errors->first('city') }} </span>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control {{$errors->has('state') ? 'is-invalid' : ''}}" id="stateGoogleMaps" name="stateGoogleMaps"
                    placeholder="Estado Geolocalización..." required readonly>

                @if ($errors->has('state'))
                    <span class="text-danger"> {{ $errors->first('state') }} </span>
                @endif
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom05">País</label>
                <input type="text" class="form-control {{$errors->has('contact') ? 'is-invalid' : ''}}" id="countryGoogleMaps" name="countryGoogleMaps"
                    placeholder="País Geolocalización..." required readonly>
                
                @if ($errors->has('contact'))
                    <span class="text-danger"> {{ $errors->first('contact') }} </span>
                @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom05">Coordenadas Geográficas (Lat,Long)</label>
                <input type="text" class="form-control {{$errors->has('geoCoord') ? 'is-invalid' : ''}}" id="geoCoordGoogleMaps" name="geoCoordGoogleMaps"
                    placeholder="Coordenadas Geolocalización" required readonly>

                @if ($errors->has('geoCoord'))
                    <span class="text-danger"> {{ $errors->first('geoCoord') }} </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationCustom02">Complete Address</label>
                <input type="text" class="form-control {{$errors->has('complete_address') ? 'is-invalid' : ''}}" id="completeAddress" name="completeAddress"
                    placeholder="Dirección Completa..." readonly required>
                
                @if ($errors->has('complete_address'))
                    <span class="text-danger"> {{ $errors->first('complete_address') }} </span>
                @endif
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
  </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDcL8shIV5zZH3XYA1H6CjoH9MFUnzBD7s&callback=initMap">
    </script>
@endpush
