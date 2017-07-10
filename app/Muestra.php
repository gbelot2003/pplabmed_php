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
        'serial', 'firma_id', 'body'
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
}
