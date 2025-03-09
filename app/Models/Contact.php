<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Aquí puedes definir tus relaciones, atributos y cualquier otra lógica del modelo
    protected $fillable = ['nombre', 'correo', 'mensaje']; // Si deseas permitir la asignación masiva
}
