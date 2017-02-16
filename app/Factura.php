<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['num_factura', 'num_cedula', 'nombre_completo_cliente', 'fecha_nacimiento',
                            'correo', 'direccion_entrega_sede', 'medico', 'status', 'edad'];

    public function citologias()
    {
        $this->hasMany(Citologia::class, 'factura_id', 'fac_numero');
    }

}

