<?php

namespace App\Http\Controllers;

use App\Sektorler;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sektorler=Sektorler::all();
        return view('admin.sektorler.index',compact('sektorler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektor=Sektorler::all();
        return view('admin.sektorler.create',compact('sektor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sektor=new Sektorler();
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sektörler için Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $sektor->adi=request('adi');
        }

        if (request('aciklama')=='')
        {
            $sektor->aciklama='';
        }
        else
        {
            $sektor->aciklama=request('aciklama');
        }

        $sektor->save();

        if ($sektor)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return back();
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
        $sektor=Sektorler::find($id);
        return view('admin.sektorler.edit',compact('sektor'));
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
        $sektor=Sektorler::find($id);
        $sektor->adi=request('adi');
        if (request('aciklama')=='')
        {
             $sektor->aciklama='';
        }
        else
        {
            $sektor->aciklama=request('aciklama');
        }

        $sektor->save();
        if ($sektor)
        {
            alert()
                ->success('Başarılı !', 'Güncelleme İşlemi Başarılı !')
                ->autoClose(1000);
            return back();
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
        Sektorler::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(1000);
        return redirect()->route('sektorler.index');
    }
}
