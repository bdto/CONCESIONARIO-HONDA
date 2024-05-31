<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carro
 *
 * @property $idcarros
 * @property $Marca
 * @property $Precio
 * @property $Modelo
 * @property $Año
 * @property $Vendedor
 * @property $Placa
 * @property $idproveedores
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedore $proveedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id', 'Marca', 'Precio', 'Modelo', 'Año', 'Vendedor', 'Placa', 'id_proveedor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedore()
    {
        return $this->belongsTo(\App\Models\Proveedore::class, 'id', 'Marca');
    }
    
}
