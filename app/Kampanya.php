<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kampanya extends Model
{
    protected $table='kampanyalar';
    protected $guarded=[];

    public function ReklamTipi()
    {
        return $this->belongsTo('App\ReklamTipi','reklamTipiId');
    }
}
