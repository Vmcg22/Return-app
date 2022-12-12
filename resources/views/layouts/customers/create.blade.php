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

        <ul class="geo-data">
            <li>Full Address: <span id="location"></span></li>
            <li>Postal Code: <span id="postal_code"></span></li>
            <li>Country: <span id="country"></span></li>
            <li>Latitude: <span id="lat"></span></li>
            <li>Longitude: <span id="lon"></span></li>
        </ul>

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

        function on() {
            console.log("Confirmé la dirección de Google Maps");
            console.log(direccionMaps.colonia);

            document.getElementById("addressGoogleMaps").value = direccionMaps.calle;
            document.getElementById("numberGoogleMaps").value = direccionMaps.numero_casa;
            document.getElementById("colonyGoogleMaps").value = direccionMaps.colonia;
            document.getElementById("zipGoogleMaps").value = direccionMaps.zip;
            document.getElementById("cityGoogleMaps").value = direccionMaps.ciudad;
            document.getElementById("stateGoogleMaps").value = direccionMaps.estado;
            document.getElementById("countryGoogleMaps").value = direccionMaps.pais;
            document.getElementById("geoCoordGoogleMaps").value = direccionMaps.latitud + ", " + direccionMaps.longitud;
        }

        function off() {
            console.log("Limpio los campos que relleno con el API de Google Maps");

            document.getElementById("addressGoogleMaps").value = "";
            document.getElementById("numberGoogleMaps").value = "";
            document.getElementById("colonyGoogleMaps").value = "";
            document.getElementById("zipGoogleMaps").value = "";
            document.getElementById("cityGoogleMaps").value = "";
            document.getElementById("stateGoogleMaps").value = "";
            document.getElementById("countryGoogleMaps").value = "";
            document.getElementById("geoCoordGoogleMaps").value = "";
        }

        var checkbox = document.getElementById('addressCorrect');

        checkbox.addEventListener("change", comprueba, false);

        function comprueba() {
            if (checkbox.checked) {
                on();
            } else {
                off();
            }
        }

        /*
            FUNCIONES GOOGLE MAPS
        */

        function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 27.47629, lng: -99.51639},
    zoom: 13
  });
  var input = document.getElementById('searchInput');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
      map: map,
      anchorPoint: new google.maps.Point(0, -29)
  });

  autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
          window.alert("Autocomplete's returned place contains no geometry");
          return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
      } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
      }
      marker.setIcon(({
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(35, 35)
      }));
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
  
      var address = '';
      if (place.address_components) {
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
      }
  
      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      infowindow.open(map, marker);
    
      // Location details
      for (var i = 0; i < place.address_components.length; i++) {
          if(place.address_components[i].types[0] == 'postal_code'){
              document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
          }
          if(place.address_components[i].types[0] == 'country'){
              document.getElementById('country').innerHTML = place.address_components[i].long_name;
          }
      }
      document.getElementById('location').innerHTML = place.formatted_address;
      document.getElementById('lat').innerHTML = place.geometry.location.lat();
      document.getElementById('lon').innerHTML = place.geometry.location.lng();
  });
}
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDcL8shIV5zZH3XYA1H6CjoH9MFUnzBD7s&callback=initMap">
    </script>


@endpush
