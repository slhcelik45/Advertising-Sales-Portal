<?php

namespace App\Http\Controllers;
use App\Ayarlar;
use App\Galeri;
use App\Mail\IletisimYayinda;
use App\Reklamlar;
use App\ReklamTipi;
use App\Roller;
use App\Sirket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol=ReklamTipi::where('id','=',Auth::user()->rolId)->first();

        $reklamtipi=ReklamTipi::where('adi','=',$rol->adi)->first();

        $reklamlar=Reklamlar::where('reklamTipiId','=',$reklamtipi->id)
                               ->where('yayinda','=',0)
                               ->get();

        //dd($reklamlar);
        return view('admin.galeri.index',compact('reklamlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol=Roller::where('id','=',Auth::user()->rolId)->first();

        $reklamtipi=ReklamTipi::where('adi','=',$rol->adi)->first();
        $reklam=Reklamlar::where('reklamTipiId','=',$reklamtipi->id)->first();
        $veriler=Galeri::where('reklamId','=',$reklam->id)->get();
        //dd($veriler);
        return view('admin.galeri.veriler',compact('veriler','rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veriler=Galeri::where('id','=',$id)->first();
        return response()->download($veriler->url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ayar=Ayarlar::first();
        $user=Auth::user()->rolId;
        $roladi=Roller::where('id','=',$user)->first();
        $reklam=Reklamlar::find($id);

        $mail=Sirket::where('id','=',$reklam->sirketId)->first();
        $reklam->yayinda=1;

        $adres='http://www.kanal23.com/';
        $Gmail=$mail->yoneticiemail;
        //dd($ayar);
        $bilgiler=array
        (
            'sirketIsmi'=>$ayar->baslik,
            'sirketEmail'=>$ayar->email,
            'sirketTel'=>$ayar->tel,
            'url'=>$adres,
            'reklamAdi'=>$reklam->adi,
            'yayinYeri'=>$roladi->adi,
            'baslangic'=>$reklam->baslangicTarih,
            'bitis'=>$reklam->bitisTarih,
        );
        Mail::to($Gmail)->send(new IletisimYayinda($bilgiler));

        $reklam->save();
        alert()
            ->success('Başarılı !', 'Reklam Yayına Alındı !')
            ->autoClose(2000);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reklamYayinda()
    {
        $rol=Roller::where('id','=',Auth::user()->rolId)->first();
        $reklamtipi=ReklamTipi::where('adi','=',$rol->adi)->first();
        $reklamlar=Reklamlar::where('reklamTipiId','=',$reklamtipi->id)
                            ->where('yayinda','=',1)->get();
        //dd($reklamlar);
        return view('admin.galeri.yayinda',compact('reklamlar'));
    }
}
