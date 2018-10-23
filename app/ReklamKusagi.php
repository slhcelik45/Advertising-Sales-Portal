<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReklamKusagi extends Model
{
    protected $table='reklamkusagi';
    protected $guarded=[];

    public function ReklamTipi()
    {
        return $this->belongsTo('App\ReklamTipi','reklamTipiId');
    }
    public function Paketler()
    {
        return $this->belongsTo('App\Paketler','kategoriId');
    }

}
