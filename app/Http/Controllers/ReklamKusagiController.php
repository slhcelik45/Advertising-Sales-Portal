<?php

namespace App\Http\Controllers;

use App\Kampanya;
use App\Paketler;
use App\ReklamKusagi;
use App\ReklamTipi;
use App\ReklmaKusagi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReklamKusagiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reklamKusagi=ReklamKusagi::all();
        return view('admin.reklamKusagi.index',compact('reklamKusagi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reklamtipleri=ReklamTipi::whereIn('id',[1,3,7,2])->get();
        $kampanyalar=Kampanya::all();
        $paketler=Paketler::all();
        return view('admin.reklamKusagi.create',compact('reklamtipleri','paketler','kampanyalar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kusak=new ReklamKusagi();
        $kusak->reklamTipiId=request('reklamTipiId');
        $kusak->kampanyaId=request('kampanyaId');
        $kusak->kategoriId=request('kategoriId');
        if (is_numeric(request('sure')))
        {
            $kusak->sure=request('sure');
        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Süre Değerini Sayısal Değer Girmelisiniz !')
                ->autoClose(2000);
            return back();
        }
        if (is_numeric(request('fiyat')))
        {
            $kusak->fiyat=request('fiyat');
        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Fiyatı Sayısal Değer Girmelisiniz !')
                ->autoClose(2000);
            return back();
        }
        if (request('aciklama')=='')
        {
            $kusak->aciklama='';
        }
        else
        {
            $kusak->aciklama=request('aciklama');
        }
        if (request('gunlukSpot')=='')
        {
            $kusak->gunlukSpot=0;
        }
        else
        {
            if (is_numeric(request('gunlukSpot')))
            {
                $kusak->gunlukSpot=request('gunlukSpot');
            }
            else
            {
                alert()
                    ->error('Hatalı Giriş !', ' Spot Değerini Sayısal Değer Girmelisiniz !')
                    ->autoClose(2000);
                return back();
            }
        }
        if (request('baslik')=='')
        {
            $kusak->baslik=request('sure').' Ay'.'-'.request('gunlukSpot').' Spot'.'-'.request('fiyat').' TL';
        }
        else
        {
            $kusak->baslik=request('baslik');
        }
        $kusak->save();

        //dd($kusak);
        if ($kusak)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('reklamKusagi.index');
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
        $reklamKusagi=ReklamKusagi::find($id);
        $reklamTipi=ReklamTipi::all();
        $paketler=Paketler::all();

        return view('admin.reklamKusagi.edit',compact('reklamKusagi','reklamTipi','paketler'));
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
        $kusak=ReklamKusagi::find($id);
        $kusak->reklamTipiId=request('reklamTip');
        $kusak->kategoriId=request('kategoriId');
        if (is_numeric(request('sure')))
        {
            $kusak->sure=request('sure');
        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Süre Değerini Sayısal Değer Girmelisiniz !')
                ->autoClose(2000);
            return back();
        }
        if (is_numeric(request('fiyat')))
        {
            $kusak->sure=request('fiyat');
        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Fiyatı Sayısal Değer Girmelisiniz !')
                ->autoClose(2000);
            return back();
        }
        if (request('gunlukSpot')=='')
        {
            $kusak->gunlukSpot=0;
        }
        else
        {
            if (is_numeric(request('gunlukSpot')))
            {
                $kusak->gunlukSpot=request('gunlukSpot');
            }
            else
            {
                alert()
                    ->error('Hatalı Giriş !', ' Spot Değerini Sayısal Değer Girmelisiniz !')
                    ->autoClose(2000);
                return back();
            }

        }
        if (request('baslik')=='')
        {
            $kusak->baslik=request('sure').' Ay'.'-'.request('gunlukSpot').' Spot'.'-'.request('fiyat').' TL';
        }
        else
        {
            $kusak->baslik=request('baslik');
        }
        $kusak->save();

        if ($kusak)
        {
            alert()
                ->success('Başarılı !', 'Güncelleme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('reklamKusagi.index');
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
        ReklamKusagi::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(1000);
        return redirect()->route('reklamKusagi.index');
    }



    public function reklamKategori()
    {
        $kategoriler=Input::get('tipId');
        $paketler=Paketler::where('kampanyaId','=',$kategoriler)->get();
        //dd($paketler);

        return response()->json($paketler);
    }
}
