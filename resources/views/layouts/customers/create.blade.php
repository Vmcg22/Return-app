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
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Ingresa el Nombre"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa el Correo Electrónico"
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
            <div class="col-md-9 mb-3">
                <label>GeoLocation:</label>
                <input type="text" class="form-control" id="search_input" placeholder="Type address..." />
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
                <input type="text" class="form-control" id="addressGoogleMaps" name="addressGoogleMaps" placeholder="Ingresa la Ciudad"
                    required readonly>
                <div class="invalid-feedback">
                    Please provide a valid address.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Número</label>
                <input type="text" class="form-control" id="numberGoogleMaps" name="numberGoogleMaps" placeholder=""
                    required readonly>
                <div class="invalid-feedback">
                    Please provide a valid address.
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Colonia</label>
                <input type="text" class="form-control" id="colonyGoogleMaps" name="colonyGoogleMaps" placeholder="Ingresa la Colonia"
                    required readonly>
                <div class="invalid-feedback">
                    Please provide a valid colony.
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="zipGoogleMaps" name="zipGoogleMaps"
                    placeholder="Ingresa el Código Postal" required readonly>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-3 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="cityGoogleMaps" name="cityGoogleMaps" placeholder="Ingresa la Ciudad"
                    required readonly>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control" id="stateGoogleMaps" name="stateGoogleMaps" placeholder="Ingresa el Estado"
                    required readonly>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationCustom05">País</label>
                <input type="text" class="form-control" id="countryGoogleMaps" name="countryGoogleMaps"
                    placeholder="Ingresa el País" required readonly>
                <div class="invalid-feedback">
                    Please provide a valid zip.
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom05">Coordenadas Geográficas (Lat,Long)</label>
                <input type="text" class="form-control" id="geoCoordGoogleMaps" name="geoCoordGoogleMaps"
                    placeholder="27.5048 , -99.5479" required readonly>
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

    <script>
        class DireccionGoogleMap {
            constructor(numero_casa, calle, colonia, ciudad, estado, pais, zip, latitud, longitud, direccion_completa) {
                this.numero_casa = numero_casa;
                this.calle = calle;
                this.colonia = colonia;
                this.ciudad = ciudad;
                this.estado = estado;
                this.pais = pais;
                this.zip = zip;
                this.latitud = latitud;
                this.longitud = longitud;
                this.direccion_completa = direccion_completa;
            }
            // Getter
            get Calle() {
                return this.calle();
            }
            // Método

        }

        function iniciarMap(latitud, longitud) {
            var coord = {
                lat: latitud,
                lng: longitud
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: coord
            });
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });
        }

        function on(){
            console.log("Confirmé la dirección de Google Maps");
            console.log(direccionMaps.colonia);

            document.getElementById("addressGoogleMaps").value = direccionMaps.calle;
            document.getElementById("numberGoogleMaps").value = direccionMaps.numero_casa;
            document.getElementById("colonyGoogleMaps").value = direccionMaps.colonia;
            document.getElementById("zipGoogleMaps").value = direccionMaps.zip;
            document.getElementById("cityGoogleMaps").value = direccionMaps.ciudad;
            document.getElementById("stateGoogleMaps").value = direccionMaps.estado;
            document.getElementById("countryGoogleMaps").value = direccionMaps.pais;
            document.getElementById("geoCoordGoogleMaps").value = direccionMaps.latitud + "," +direccionMaps.longitud;
          }
          
          function off(){
            console.log("Limpio los campos que relleno con el API de Google Maps");
          }
          
          var checkbox = document.getElementById('addressCorrect');
          
          checkbox.addEventListener("change", comprueba, false);
          
          function comprueba(){
            if(checkbox.checked){
                on();
            }else{
               off();
            }
          }

        /*
            FUNCIONES GOOGLE MAPS
        */

        var searchInput = 'search_input';
        var direccionMaps;

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                /*componentRestrictions: {
                country: "USA"
                }*/
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();

                //var direccionMaps = new DireccionGoogleMap(7242, "contadores", "solidaridad", "nuevo laredo", "tamaulipas", "mexico", "88143", 27.502175, -99.55069, "C. Contadores 7242, Solidaridad 1, 88143 Nuevo Laredo, Tamps., México");
                var numero_casa = near_place["address_components"][0]["short_name"];
                var calle = near_place["address_components"][1]["short_name"];
                var colonia = near_place["address_components"][2]["short_name"];
                var ciudad = near_place["address_components"][3]["short_name"];
                var estado = near_place["address_components"][4]["short_name"];
                var pais = near_place["address_components"][5]["short_name"];
                var zip = near_place["address_components"][6]["short_name"];
                var longitud = near_place["geometry"]["viewport"]["Ia"]["hi"];
                var latitud = near_place["geometry"]["viewport"]["Wa"]["hi"];

                direccionMaps = new DireccionGoogleMap(numero_casa, calle, colonia, ciudad, estado,
                    pais, zip, latitud, longitud,
                    "C. Contadores 7242, Solidaridad 1, 88143 Nuevo Laredo, Tamps., México");
                iniciarMap(27.5048394802915, -99.5479864197085);
                //iniciarMap(direccionMaps.latitud, direccionMaps.longitud);
                console.log(near_place);
                console.log(direccionMaps);
                //console.log(JSON.stringify(near_place));
            });
        });
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDcL8shIV5zZH3XYA1H6CjoH9MFUnzBD7s&callback=iniciarMap">
    </script>

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
