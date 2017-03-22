<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['num_factura', 'nombre_examen'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facturas()
    {
        return $this->belongsTo(Factura::class, 'num_factura', 'num_factura');
    }

}
