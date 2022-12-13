var checkbox = document.getElementById('addressCorrect');

function on() {
    console.log("Confirmé la dirección de Google Maps");

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

checkbox.addEventListener("change", comprueba, false);

function comprueba() {
    if (checkbox.checked) {
        on();
    } else {
        off();
    }
}
