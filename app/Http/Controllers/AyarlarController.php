<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use Illuminate\Http\Request;

class AyarlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayarlar=Ayarlar::all();
        return view('admin.ayarlar.index',compact('ayarlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ayarlar.create');
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
        $ayar=new Ayarlar();
        $ayar->baslik=request('baslik');
        $ayar->email=request('email');
        $ayar->tel=request('tel');
        $ayar->fax=request('fax');
        $ayar->adres=request('adres');
        $ayar->facebook=request('facebook');
        $ayar->twitter=request('twitter');
        $ayar->instagram=request('instagram');

        if (request()->hasFile('logo'))
        {
            $resim=request()->file('logo');
            $dosya_adi=time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/ayarlar';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $ayar->logo=$hedef_yolu;
            }
        }
        $ayar->save();

        if ($ayar)
        {
            alert()
                ->success('Başarılı !', 'Ekleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('ayarlar.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Ekleme İşlemi Başarısız !')
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
        $ayar=Ayarlar::find($id);
        return view('admin.ayarlar.edit',compact('ayar'));
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
        $ayar=Ayarlar::find($id);
        $ayar->baslik=request('baslik');
        $ayar->email=request('email');
        $ayar->tel=request('tel');
        $ayar->fax=request('fax');
        $ayar->adres=request('adres');
        $ayar->facebook=request('facebook');
        $ayar->twitter=request('twitter');
        $ayar->instagram=request('instagram');

        if (request()->hasFile('logo'))
        {
            $resim=request()->file('logo');
            $dosya_adi=time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/ayarlar';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $ayar->logo=$hedef_yolu;
            }
        }
        $ayar->save();
        if ($ayar)
        {
            alert()
                ->success('Başarılı !', 'Ekleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('ayarlar.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Ekleme İşlemi Başarısız !')
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
        $sil=Ayarlar::find($id)->delete();
        if ($sil)
        {
            alert()
                ->success('Başarılı !', 'Silme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('ayarlar.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Silme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }
}
