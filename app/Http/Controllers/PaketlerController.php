<?php

namespace App\Http\Controllers;

use App\Kampanya;
use App\Paketler;
use App\ReklamTipi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PaketlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paketler=Paketler::all();
        return view('admin.paketler.index',compact('paketler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paketler=ReklamTipi::whereIn('id',[1,3,7,2])->get();
        $kampanyalar=Kampanya::all();
        return view('admin.paketler.create',compact('paketler','kampanyalar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paket=new Paketler();
        $paket->reklamTipiId=request('reklamTipiId');
        $paket->kampanyaId=request('kampanyaId');
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $paket->adi=request('adi');
        }
        if (request('aciklama')=='')
        {
            $paket->aciklama='';
        }
        else
        {
            $paket->aciklama=request('aciklama');
        }
        $paket->save();
        if ($paket)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1500);
            return redirect()->route('paketler.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Kaydetme İşlemi Başarısız !')
                ->autoClose(1500);
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
        $paket=Paketler::find($id);
        $reklamtipi=ReklamTipi::whereIn('id',[1,3,7,2])->get();
        $kampanyalar=Kampanya::all();
        return view('admin.paketler.edit',compact('paket','reklamtipi','kampanyalar'));
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
        $paket=Paketler::find($id);
        $paket->reklamTipiId=request('reklamTipiId');
        $paket->kampanyaId=request('kampanyaId');
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $paket->adi=request('adi');
        }
        if (request('aciklama')=='')
        {
            $paket->aciklama='';
        }
        else
        {
            $paket->aciklama=request('aciklama');
        }
        $paket->save();
        if ($paket)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('paketler.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Düzenleme İşlemi Başarısız !')
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
        Paketler::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(1000);
        return redirect()->route('roller.index');
    }

    public function reklamKampanyalar()
    {
        $firma=Input::get('firmaId');
        $kampanyalar=Kampanya::where('reklamTipiId','=',$firma)->get();
        //dd($kampanyalar);
        return response()->json($kampanyalar);
    }
}
