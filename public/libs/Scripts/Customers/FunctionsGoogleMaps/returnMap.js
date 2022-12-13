/*
    FUNCIONES GOOGLE MAPS
*/

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 27.47629,
            lng: -99.51639
        },
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

    autocomplete.addListener('place_changed', function () {
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

        direccionMaps = new DireccionGoogleMap();
        console.log(place.address_components);
        direccionMaps.numero_casa = place.address_components[0]["long_name"]; //2007
        direccionMaps.calle = place.address_components[1]["long_name"]; //Avenida Reforma
        direccionMaps.colonia = place.address_components[2]["long_name"]; //Infonavit Fundadores
        direccionMaps.ciudad = place.address_components[3]["long_name"]; //Nuevo Laredo
        direccionMaps.estado = place.address_components[4]["long_name"]; //Tamaulipas
        direccionMaps.pais = place.address_components[5]["long_name"]; //México
        direccionMaps.zip = place.address_components[6]["long_name"]; //88275

        console.log(direccionMaps);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        direccionMaps.direccion_completa = place.formatted_address; //Av. Reforma 2007, Infonavit Fundadores, 88275 Nuevo Laredo, Tamps., México
        direccionMaps.latitud = place.geometry.location.lat(); //27.45331
        direccionMaps.longitud = place.geometry.location.lng(); //Aldama 2103, Juárez, 88209 Nuevo Laredo, Tamps., México

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

    });
}