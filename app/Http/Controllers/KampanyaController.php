<?php

namespace App\Http\Controllers;

use App\Kampanya;
use App\KampanyaTuru;
use App\Paketler;
use App\ReklamTipi;
use Illuminate\Http\Request;

class KampanyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kampanyalar=Kampanya::all();
        return view('admin.kampanya.index',compact('kampanyalar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $reklamTipi=ReklamTipi::whereIn('id',[1,3,7,2])->get();
        return view('admin.kampanya.create',compact('reklamTipi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kampanya=new Kampanya();

        $kampanya->reklamTipiId=request('reklamTipiId');
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $kampanya->adi=request('adi');
        }
        $kampanya->aciklama=request('aciklama');

        $kampanya->save();
        if ($kampanya)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kampanya.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Kaydetme İşlemi Başarısız !')
                ->autoClose(2000);
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
        $kampanya=Kampanya::find($id);
        $reklamtipi=ReklamTipi::whereIn('id',[1,3,7,2])->get();
        return view('admin.kampanya.edit',compact('kampanya','reklamtipi'));
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
        $kampanya=Kampanya::find($id);

        $kampanya->reklamTipiId=request('reklamTipiId');
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $kampanya->adi=request('adi');
        }
        $kampanya->aciklama=request('aciklama');

        $kampanya->save();
        if ($kampanya)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kampanya.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Düzenleme İşlemi Başarısız !')
                ->autoClose(2000);
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
        Kampanya::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(2000);
        return redirect()->route('kampanya.index');
    }
}
