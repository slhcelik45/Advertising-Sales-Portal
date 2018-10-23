<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklamlar extends Model
{
    protected $table='reklamlar';
    protected $guarded=[];

    public function Sirketler()
    {
        return $this->belongsTo('App\Sirket','sirketId');
    }
    public function Sektorler()
    {
        return $this->belongsTo('App\Sektorler','sektorId');
    }
    public function ReklamTipleri()
    {
        return $this->belongsTo('App\ReklamTipi','reklamTipiId');
    }
    public function ReklamKusagi()
    {
        return $this->belongsTo('App\ReklamKusagi','reklamKusagiId');
    }
    public function Kullanici()
    {
        return $this->belongsTo('App\User','kullaniciId');
    }

    public function Galeri()
    {
        return $this->hasMany('App\Galeri','reklamId',',id');
    }

    public function Kampanya()
    {
        return $this->belongsTo('App\Kampanya','kampanyaId');
    }
}
