<?php

namespace App\Http\Controllers;

use App\Kampanya;
use App\Paketler;
use App\Radyolar;
use App\ReklamKusagi;
use App\Reklamlar;
use App\ReklamTipi;
use App\Sektorler;
use App\Sirket;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class ReklamlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reklamlar=Reklamlar::all();
        return view('admin.reklam.index',compact('reklamlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sirketler=Sirket::all();
        $reklamTipleri=ReklamTipi::all();
        $kampanyalar=Kampanya::all();
        $paketler=Paketler::all();
        $reklamKusagi=ReklamKusagi::all();
        $radyolar=ReklamTipi::whereIn('id',[4,5,6,8])->get();
        //dd($radyolar);
        return view('admin.reklam.create',compact('sirketler','reklamTipleri','reklamKusagi','kampanyalar','paketler','radyolar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request);
        if (request('kampanyaId')==3 && request('reklamTipiId')==1)
        {
            $toplam=request('radyoSpot0')+request('radyoSpot1')+request('radyoSpot2')+request('radyoSpot3');
            if ($toplam>request('SpotSayisi') || $toplam<request('SpotSayisi'))
            {
                alert()
                    ->error('Hatalı !', ' Radyoların Spot Değerleri Fazla yada Eksik Spot Değerlerini Düzenleyiniz !')
                    ->autoClose(3000);
                return back();
            }
            for ($i=0;$i<5;$i++)
            {
                $reklam=new Reklamlar();
                if ($i==0)
                {
                    $reklam->reklamTipiId=request('reklamTipiId');
                    $reklam->spot=request('Tvspot');
                    $reklam->fiyat=request('fiyat');
                }
                elseif($i==1)
                {
                    $reklam->reklamTipiId=request('radyo0');
                    $reklam->spot=request('radyoSpot0');
                    $reklam->fiyat=0;


                }
                elseif ($i==2)
                {
                    $reklam->reklamTipiId=request('radyo1');
                    $reklam->spot=request('radyoSpot1');
                    $reklam->fiyat=0;
                }
                elseif ($i==3)
                {
                    $reklam->reklamTipiId=request('radyo2');
                    $reklam->spot=request('radyoSpot2');
                    $reklam->fiyat=0;
                }
                else
                {
                    $reklam->reklamTipiId=request('radyo3');
                    $reklam->spot=request('radyoSpot3');
                    $reklam->fiyat=0;
                }

                if (request('AltKategori')==8)
                {
                    $reklam->ay=3;
                }
                elseif (request('AltKategori')==9)
                {
                    $reklam->ay=6;
                }
                else
                {
                    $reklam->ay=12;
                }
                $reklam->sirketId=request('sirketId');
                $reklam->kategoriId=request('AltKategori');
                $reklam->kampanyaId=request('kampanyaId');
                $reklam->kullaniciId=Auth::user()->id;
                $reklam->adi=request('adi');
                $reklam->slogan=request('slogan');
                $reklam->baslangicTarih=request('baslangicTarih');
                $reklam->bitisTarih=request('bitisTarih');
                $reklam->yayinda=0;
                $reklam->aciklama=request('aciklama');

                $reklam->save();
            }
        }
        elseif (request('kampanyaId')==5 )
        {
            //dd($request);
            $reklam=new Reklamlar();
            $saatler=new Radyolar();
            $kusak=ReklamKusagi::where('kampanyaId','=',request('kampanyaId'))->first();
            //dd($kusak);

            $reklam->reklamTipiId=request('reklamTipiId');
            $reklam->sirketId=request('sirketId');
            $reklam->kategoriId=request('AltKategori');
            $reklam->kampanyaId=request('kampanyaId');
            $reklam->kullaniciId=Auth::user()->id;
            $reklam->adi=request('adi');
            $reklam->slogan=request('slogan');
            $reklam->ay=$kusak->sure;
            $reklam->spot=$kusak->gunlukSpot;
            $reklam->fiyat=request('fiyat');
            $reklam->baslangicTarih=request('baslangicTarih');
            $reklam->bitisTarih=request('bitisTarih');
            $reklam->yayinda=0;
            $reklam->aciklama=request('aciklama');

            $reklam->save();
            $bilgi=Reklamlar::where('kampanyaId','=',request('kampanyaId'))->first();

            $saatler->reklamlarId=$bilgi->id;
            $saatler->radyoId=request('reklamTipiId');
            $saatler->baslangicSaat=request('baslangicSaat');
            $saatler->bitisSaat=request('bitisSaat');
            $saatler->baslangicTarih=$bilgi->baslangicTarih;
            $saatler->bitisTarih=$bilgi->bitisTarih;

            //dd($saatler);
            $saatler->save();
        }

        else
        {
            $reklam=new Reklamlar();
            $kusak=ReklamKusagi::where('kategoriId','=',request('AltKategori'))->first();
            //dd($kusak);
            $reklam->reklamTipiId=request('reklamTipiId');
            $reklam->sirketId=request('sirketId');
            $reklam->kategoriId=request('AltKategori');
            $reklam->kampanyaId=request('kampanyaId');
            $reklam->kullaniciId=Auth::user()->id;
            $reklam->adi=request('adi');
            $reklam->slogan=request('slogan');
            $reklam->ay=$kusak->sure;
            $reklam->spot=$kusak->gunlukSpot;
            $reklam->fiyat=request('fiyat');
            $reklam->reklamKusagiId=request('reklamKusagiId');
            $reklam->baslangicTarih=request('baslangicTarih');
            $reklam->bitisTarih=request('bitisTarih');
            $reklam->yayinda=0;
            $reklam->aciklama=request('aciklama');

            $reklam->save();
        }

        if ($reklam)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('reklam.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Kaydetme İşlemi Başarısız !')
                ->autoClose(1000);
            return back();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reklam=Reklamlar::find($id);
        $sirketler=Sirket::all();
        $reklamTipleri=ReklamTipi::all();
        $reklamKusagi=ReklamKusagi::all();
        //dd($reklam);

        return view('admin.reklam.edit',compact('reklam','reklamKusagi','reklamTipleri','sirketler'));
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
        $reklam=Reklamlar::find($id);

        $reklam->sirketId=request('sirketId');
        $reklam->reklamTipiId=request('reklamTipiId');
        $reklam->reklamKusagiId=request('reklamKusagiId');
        $reklam->kullaniciId=Auth::user()->id;
        $reklam->adi=request('adi');
        $reklam->slogan=request('slogan');
        $reklam->baslangicTarih=request('baslangicTarih');
        $reklam->bitisTarih=request('bitisTarih');
        $reklam->yayinda=0;
        $reklam->fiyat=request('fiyat');

        if (request('aciklama')=='')
        {
            $reklam->aciklama='';
        }
        else
        {
            $reklam->aciklama=request('aciklama');
        }

        $reklam->save();
        //dd($reklam);

        if ($reklam)
        {
            alert()
                ->success('Başarılı !', 'Güncelleme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('reklam.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Güncelleme İşlemi Başarısız !')
                ->autoClose(1000);
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reklamlar::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(2000);
        return redirect()->route('reklam.index');
    }

    public function reklamkusak()
    {
        $reklamTipi = Input::get('tipId');
        //dd($reklamTipi);
        if ($reklamTipi!=2 && $reklamTipi!=1)
        {
            $reklamTipi=2;
            $Kampanyalar=Kampanya::where('reklamTipiId','=',$reklamTipi)->get();
        }
        else
        {
            $Kampanyalar=Kampanya::where('reklamTipiId','=',$reklamTipi)->get();
        }

        //dd($Kampanyalar);
        return response()->json($Kampanyalar);
    }
    public function reklamKampanya()
    {
        $reklamTipi = Input::get('tipId');
        $kampanyalar=Kampanya::where('turId','=',$reklamTipi)->get();

        return response()->json($kampanyalar);
    }
    public function KategoriAlan()
    {
        $kampanyaId=Input::get('Id');
        $KategoriAlan=Paketler::where('kampanyaId','=',$kampanyaId)->get();
        //dd($kampanyaId);
        return response()->json($KategoriAlan);
    }
    public function KampanyaKusak()
    {
        $Kusak=Input::get('Id');
        $kusaklar=ReklamKusagi::where('kategoriId','=',$Kusak)->get();
        //dd($kusaklar);
        return response()->json($kusaklar);
    }
    public function AltKategori()
    {
        $Kusak=Input::get('Id');
        $kusaklar=ReklamKusagi::where('kategoriId','=',$Kusak)->get();
        //dd($kusaklar);
        return response()->json($kusaklar);
    }
    public function SaatFiyat()
    {
        $gelenId=Input::get('Id');

        if ($gelenId!=-1)
        {
            $gelenId=5;
            $kusaklar=ReklamKusagi::where('kampanyaId','=',$gelenId)->get();
        }
        return response()->json($kusaklar);
    }
    public function SaatTarih()
    {
        $GId=Input::get('Id');

        $btsTarih=substr($GId,0,10);
        $GIdd=Input::get('Id');
        $bslTarih=substr($GIdd,10);
        $tarih=Radyolar::where('baslangicTarih','=',$bslTarih)
                        ->where('bitisTarih','=',$btsTarih)
                        ->get();
        return response()->json($tarih);
    }
    public function reklamfiyat()
    {
        $kusakId=Input::get('KusakID');
        $reklamlar=ReklamKusagi::where('id','=',$kusakId)->get();
        //dd($reklamlar);
        return response()->json($reklamlar);
    }
    public function tvSpotReklamlar()
    {
        $tvSpotlar=ReklamKusagi::where('reklamTipiId','=',1)
                                 ->where('kampanyaId','=',1)
                                 ->get();
        //dd($tvSpotlar);
        return view('admin.reklam.tvspot',compact('tvSpotlar'));
    }
    public function tvSponsorluk()
    {
        $tvSponsorluk=ReklamKusagi::where('reklamTipiId','=',1)
                                    ->where('kampanyaId','=',2)
                                    ->get();
        //dd($tvSponsorluk);
        return view('admin.reklam.tvsponsor',compact('tvSponsorluk'));
    }
    public function tvKampanya()
    {
        $tvKampanya=ReklamKusagi::where('reklamTipiId','=',1)
                                  ->where('kampanyaId','=',3)
                                  ->where('kategoriId','=',8)
                                  ->get();
        $tvKampanyalar=ReklamKusagi::where('reklamTipiId','=',1)
                                  ->where('kampanyaId','=',3)
                                  ->where('kategoriId','=',9)
                                  ->get();
        $tvkampanya=ReklamKusagi::where('reklamTipiId','=',1)
                                  ->where('kampanyaId','=',3)
                                  ->where('kategoriId','=',10)
                                  ->get();
        //dd($tvKampanya);
        return view('admin.reklam.tvkampanya',compact('tvKampanya','tvKampanyalar','tvkampanya'));
    }
    public function radyoSpotReklamlar()
    {
        $radyoSpotlar=ReklamKusagi::where('reklamTipiId','=',2)
                                    ->where('kampanyaId','=',4)
                                    ->get();

        return view('admin.reklam.radyospot',compact('radyoSpotlar'));
    }
    public function radyoJingle()
    {
        $radyoJingle=ReklamKusagi::where('reklamTipiId','=',2)
                                   ->where('kampanyaId','=',6)
                                   ->get();

        $radyoKampanya=ReklamKusagi::where('reklamTipiId','=',2)
                                     ->where('kampanyaId','=',11)
                                     ->get();

        return view('admin.reklam.radyoJingle',compact('radyoJingle','radyoKampanya'));
    }
}
