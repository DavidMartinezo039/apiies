<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryProduct extends Model
{
    use HasFactory;

    // La tabla de relaciones debe coincidir con el nombre que has dado en las migraciones
    protected $table = 'category_product';

    // Los campos que pueden ser masivamente asignados
    protected $fillable = ['category_id', 'product_id'];
}
