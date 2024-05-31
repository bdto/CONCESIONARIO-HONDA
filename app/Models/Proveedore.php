<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $Marca
 * @property $Pais
 * @property $Distribuidor
 * @property $Logo
 * @property $fecha_ingreso
 * @property $created_at
 * @property $updated_at
 *
 * @property Carro[] $carros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Marca', 'Pais', 'Distribuidor', 'Logo', 'fecha_ingreso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carros()
    {
        return $this->hasMany(\App\Models\Carro::class, 'Marca', 'idproveedores');
    }
    
}
