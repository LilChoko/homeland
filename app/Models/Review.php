<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'name', 'email', 'description', 'rating']; // Permite asignación masiva

    protected $casts = [
        'rating' => 'integer',  // Asegura que rating siempre sea un entero
        'created_at' => 'datetime', // Convierte created_at en un objeto DateTime
        'updated_at' => 'datetime', // Convierte updated_at en un objeto DateTime
    ];

    // Relación: Una review pertenece a una propiedad
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Formatear fecha automáticamente para evitar el error de "Call to a member function format() on string"
    public function getFormattedDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('F j, Y') : 'Unknown date';
    }
}
