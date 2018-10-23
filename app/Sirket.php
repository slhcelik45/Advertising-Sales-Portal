<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sirket extends Model
{
    protected $table='sirket';
    protected $guarded=[];

    public function SektorBul()
    {
        return $this->belongsTo('App\Sektorler','sektorId');
    }
    public function KullaniciBul()
    {
        return $this->belongsTo('App\User','usersId');
    }
    public function Galeri()
    {
        return $this->hasMany('App\Galeri','id','sirketId');
    }


}
