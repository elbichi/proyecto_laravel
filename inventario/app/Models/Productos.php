<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria_id',
        'subcategoria_id',
    ];

    // 🔁 Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // 🔁 Relación con SubCategoria
    public function subcategoria()
    {
        return $this->belongsTo(SubCategoria::class);
    }
}
