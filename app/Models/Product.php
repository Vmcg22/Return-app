<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Nombre de la tabla en la base de datos
    protected $table = "products";

    //Atributos del modelo que tendremos permitido hacer el CRUD
    protected $fillable = [
        "name",
        "description",
        "unit_price",
        "quantity",
        "total_cost"
    ];
}
