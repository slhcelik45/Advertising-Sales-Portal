<?php

namespace App\Http\Controllers;

use App\ReklamTipi;
use Illuminate\Http\Request;

class ReklamTipiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reklamTipi=ReklamTipi::all();
        return view('admin.reklamTipi.index',compact('reklamTipi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Rtipi=ReklamTipi::all();
        return view('admin.reklamTipi.create',compact('Rtipi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Rtipi=new ReklamTipi();

        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $Rtipi->adi=request('adi');
        }
        if (request()->hasFile('logo'))
        {
            $resim=request()->file('logo');
            $dosya_adi='Firma'.'.'.time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $Rtipi->logo=$hedef_yolu;
            }
        }
        if (request('aciklama')=='')
        {
            $Rtipi->aciklama='';
        }
        else
        {
            $Rtipi->aciklama=request('aciklama');
        }

        $Rtipi->save();
        if ($Rtipi)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(500);
            return redirect()->route('reklamTipi.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Kaydetme İşlemi Başarısız !')
                ->autoClose(500);
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
        $reklam=ReklamTipi::find($id);
        return view('admin.reklamTipi.edit',compact('reklam'));
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
        //dd($request);
        $reklam=ReklamTipi::find($id);
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $reklam->adi=request('adi');
        }
        if (request()->hasFile('logo'))
        {
            $resim=request()->file('logo');
            $dosya_adi='Firma'.'.'.time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $reklam->logo=$hedef_yolu;
            }
        }
        if (request('aciklama')=='')
        {
            $reklam->aciklama='';
        }
        else
        {
            $reklam->aciklama=request('aciklama');
        }

        $reklam->save();

        if ($reklam)
        {
            alert()
                ->success('Başarılı !', 'Güncelleme İşlemi Başarılı !')
                ->autoClose(500);
            return redirect()->route('reklamTipi.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Güncelleme İşlemi Başarısız !')
                ->autoClose(500);
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
        ReklamTipi::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(500);
        return redirect()->route('reklamTipi.index');
    }
}
