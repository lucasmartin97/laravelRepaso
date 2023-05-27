<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Si utilizamos el ::create colocar el $fillable.
    protected $fillable = ['title', 'body'];


    // Laravel va a referenciar este modelo con la tabla de base de datos que este con el mismo nombre en plural.
    // Si la tabla tiene otro nombre, le indicamos a la tabla que se refiere asi:
    // protected $table = "TablaPost";

    // Metodos

    // Model::get() / Obtiene todos los datos de la tabla.
    // Model::find(i) / Buscar dato específico pasando cómo param el id.
    // $model->save(); Agrega un elemento a la bd.
    // $model->delete(); / Borra el elemento en la bd.

}
