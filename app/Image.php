<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['link_id', 'image_url', 'encode', 'descripcion', 'order'];

    /**
     * Relación Histopatología
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function histo()
    {
        return $this->belongsTo(Histopatologia::class, 'link_id', 'link_id');
    }

}
