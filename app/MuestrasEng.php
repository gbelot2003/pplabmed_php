<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuestrasEng extends Model
{
    /**
     * @var string
     */
    protected $table = 'muestras_engs';

    /**
     * @var array
     */
    protected $fillable = [
        'serial', 'firma_id', 'body', 'nombre', 'muestra_id'
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

    public function muestras()
    {
        return $this->belongsTo(Muestra::class, 'muestra_id', 'id');
    }

}
