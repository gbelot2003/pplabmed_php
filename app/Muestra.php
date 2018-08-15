<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{

    /**
     * @var string
     */
    protected $table = 'muestras';

    /**
     * @var array
     */
    protected $fillable = [
        'serial', 'firma_id', 'body', 'nombre', 'factura_id'
    ];

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
    public function histo()
    {
        return $this->belongsTo(Histopatologia::class, 'serial', 'serial');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function muestraEng()
    {
        return $this->hasOne(MuestraEng::class, 'muestra_id', 'id');
    }
}
