<?php

namespace App\Http\Controllers;

use App\KampanyaTuru;
use Illuminate\Http\Request;

class KampanyaTuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kTuru=KampanyaTuru::all();
        return view('admin.kampanyaTuru.index',compact('kTuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Kturu=KampanyaTuru::all();
        return view('admin.kampanyaTuru.create',compact('Kturu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),array(
            'adi'=>'required',
            'aciklama'=>'required'
        ));

        $kTuru=new KampanyaTuru();
        $kTuru->adi=request('adi');
        $kTuru->aciklama=request('aciklama');

        $kTuru->save();

        if ($kTuru)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('kampanyaTuru.index');
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
        $kTur=KampanyaTuru::find($id);
        return view('admin.kampanyaTuru.edit',compact('kTur'));
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
        $this->validate(request(),array(
            'adi'=>'required',
            'aciklama'=>'required'
        ));

        $kTur=KampanyaTuru::find($id);

        $kTur->adi=request('adi');
        $kTur->aciklama=request('aciklama');

        $kTur->save();

        if ($kTur)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('kampanyaTuru.index');
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
        KampanyaTuru::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(1000);
        return redirect()->route('kampanyaTuru.index');
    }
}
