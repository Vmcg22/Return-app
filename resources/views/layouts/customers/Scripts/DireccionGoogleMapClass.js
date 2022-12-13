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