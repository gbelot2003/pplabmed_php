<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histopatologia extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'serial', 'factura_id', 'link_id', 'topog', 'mor1', 'mor2', 'firma_id', 'firma2_id',
        'muestra', 'diagnostico', 'fecha_informe', 'fecha_biopcia', 'fecha_biopcia', 'informe'
    ];

    /**
     * Protected dates format to Carbon
     * @var array
     */
    protected $dates = ['fecha_muestra', 'fecha_informe', 'fecha_biopcia'];


    /**
     * Relacion Facturas Citología
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facturas()
    {
        return $this->belongsTo(Factura::class, 'factura_id', 'num_factura');
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
        return $this->belongsTo(Firma::class, 'firma2_id', 'id');
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        $serial = CitoSerial::where('id', 2)->first();
        return $serial;
    }


    public function images()
    {
        return $this->hasMany(Image::class, 'link_id', 'link_id');
    }
}
