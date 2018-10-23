<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paketler extends Model
{
    protected $table='paket';
    protected $guarded=[];

    public function ReklamFirmalar()
    {
        return $this->belongsTo('App\ReklamTipi','reklamTipiId');
    }

    public function Kampanyalar()
    {
        return $this->belongsTo('App\Kampanya','kampanyaId');
    }

}
