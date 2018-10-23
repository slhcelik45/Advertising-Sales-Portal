<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table='galeri';
    protected $guarded=[];

    public function Reklamlar()
    {
        return $this->belongsTo('App\Reklamlar','reklamId');
    }
}
