<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{


    /**
     * @var array
     */
    protected $dates = ['fecha_nacimiento'];

    /**
     * @var array
     */
    protected $fillable = ['num_factura', 'num_cedula', 'nombre_completo_cliente', 'fecha_nacimiento',
                            'correo', 'correo2', 'direccion_entrega_sede', 'medico', 'status', 'edad', 'sexo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citologias()
    {
       return $this->hasMany(Citologia::class, 'factura_id', 'num_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histopatologias()
    {
        return $this->hasMany(Histopatologia::class, 'factura_id', 'num_factura');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examenes()
    {
        return $this->hasMany(Examenes::class, 'num_factura', 'num_factura');
    }

    /**
     * @return mixed
     */
    public function examen()
    {
        return $this->hasOne(Examenes::class, 'num_factura', 'num_factura')->latest();
    }

}

