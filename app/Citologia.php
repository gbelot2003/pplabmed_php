<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citologia extends Model
{
    /**
     * Mass Assing protection filter
     * @var array
     *
     */
    protected $fillable = ['factura_id', 'deteccion_cancer', 'indice_maduracion', 'otros_a', 'diagnostico_clinico',
        'fur', 'fup', 'gravidad_id', 'para', 'abortos', 'citologia_id', 'firma_id', 'fecha_informe',
        'otros_b', 'firma2_id', 'fecha_muestra', 'mm', 'user_id', 'serial'];


    /**
     * Relacion Facturas Citología
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facturas()
    {
        return $this->belongsTo(Factura::class, 'factura_id', 'num_factura');
    }

    /**
     * Relación Usuarios Citlogía
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firma()
    {
        return $this->belongsTo(Firma::class, 'firma_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firma2()
    {
        return $this->belongsTo(Firma::class, 'firmas_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        $serial = CitoSerial::where('id', 1)->first();
        return $serial;
    }

}






















