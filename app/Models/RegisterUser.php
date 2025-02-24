<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model {
    use HasFactory;

    protected $table = 'register_users'; // Definir el nombre de la tabla
    protected $fillable = ['username', 'email', 'password']; // Definir los campos asignables
    protected $hidden = ['password']; // Ocultar el campo de la contraseña
}
