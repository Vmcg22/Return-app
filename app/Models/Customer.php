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
            "active",
            "city",
            "state",
            "zip",
            "address_first",
            "address_secondary",
            "contact",
            "phone_number",
            "phone_number_secondary",
            "type",
            "credit_limit",
            
        ];
}
