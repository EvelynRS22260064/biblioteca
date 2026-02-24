<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros'; // Asegura que use la tabla correcta
    
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'categoria_id',
        'estado',
        'descripcion',
        'anio_publicacion'
    ];

    // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}