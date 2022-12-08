
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
    get NumeroCasa() {
        return this.numero_casa();
    }
    // Método
  
  }
  
  function iniciarMap(latitud, longitud){
    var coord = {lat: latitud ,lng: longitud};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 17,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
  }
  
  var searchInput = 'search_input';
  
  $(document).ready(function () {
      var autocomplete;
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
          types: ['geocode'],
          /*componentRestrictions: {
          country: "USA"
          }*/
      });
  
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
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
  
          var direccionMaps = new DireccionGoogleMap(numero_casa, calle, colonia, ciudad, estado, pais, zip, latitud, longitud, "C. Contadores 7242, Solidaridad 1, 88143 Nuevo Laredo, Tamps., México");
          iniciarMap(27.5048394802915, -99.5479864197085);
          iniciarMap(direccionMaps.latitud, direccionMaps.longitud);
          console.log(near_place);
          console.log(direccionMaps);
          //console.log(JSON.stringify(near_place));
      });
  });
  