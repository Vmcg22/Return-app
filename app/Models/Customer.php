<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

        //Nombre de la tabla en la base de datos
        protected $table = "customers";

        //Atributos del modelo que tendremos permitido hacer el CRUD
        protected $fillable = [

            "contact",
            "email",
            "code_country",
            "phone_number",
            "phone_number_secondary",
            "active",

            "address",
            "number",
            "colony",
            "city",
            "state",
            "zip",
            "geoCoord",

            "type",
            "credit_limit"

        ];
}
