<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['user_id', 'total','ticket', 'estado', 'fecha'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
       // return $this->belongsTo(User::class);
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación uno a muchos con Producto
    public function productos()
    {
    return $this->belongsToMany(Producto::class, 'producto_venta')->withPivot('cantidad');
    }
}