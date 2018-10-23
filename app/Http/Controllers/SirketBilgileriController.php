<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Reklamlar;
use App\Sektorler;
use App\Sirket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SirketBilgileriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $YEmail=Auth::user()->email;
        $sirket=Sirket::where('yoneticiemail','=',$YEmail)->first();
        $reklamlar=Reklamlar::where('sirketId','=',$sirket->id)->get();

        //dd($reklamlar);
        return view('admin.sirketIsleri.index',compact('reklamlar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $YEmail=Auth::user()->email;
        $sirket=Sirket::where('yoneticiemail','=',$YEmail)->get();
        //dd($sirket);

        return view('admin.sirketIsleri.create',compact('sirket'));

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
        $sirket=Sirket::find($id);
        $sektorler=Sektorler::all();
        //dd($sirket);
        return view('admin.sirketIsleri.duzenle',compact('sirket','sektorler'));
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
        return view('admin.sirketIsleri.edit',compact('reklam'));
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
        $sirket=Sirket::find($id)->first();
        $kullanici=User::where('email','=',$sirket->yoneticiemail)->first();

        //dd($request);
        $sirket->sektorId=request('sektorId');
        $sirket->adi=request('adi');
        $sirket->adres=request('adres');
        $sirket->tel=request('tel');
        $sirket->email=request('email');


        if (request()->hasFile('logo'))
        {
            $resim=request()->file('logo');
            $sirket_dosya_adi='sirket'.'-'.time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler/sirket';
                $dosya_yolu=$hedef_klasor.'/'.$sirket_dosya_adi;
                $resim->move($hedef_klasor,$sirket_dosya_adi);
                $sirket->logo=$dosya_yolu;
            }
        }


        $sirket->yoneticiadi=request('yoneticiadi');
        $sirket->yoneticisoyadi=request('yoneticisoyadi');
        $sirket->yoneticiceptel=request('yoneticiceptel');
        $sirket->yoneticiemail=request('yoneticiemail');

        if (request()->hasFile('yoneticifoto'))
        {
            $avatar=request()->file('yoneticifoto');
            $yonetici_dosya_adi='yonetici'.'-'.time().'.'.$avatar->extension();

            if ($avatar->isValid())
            {
                $hedef_klasor='uploads/resimler/sirket';
                $dosya_yolu=$hedef_klasor.'/'.$yonetici_dosya_adi;
                $avatar->move($hedef_klasor,$yonetici_dosya_adi);
                $sirket->yoneticifoto=$dosya_yolu;
            }
        }

        $kullanici->name=request('yoneticiadi').' '.request('yoneticisoyadi');
        $kullanici->email=request('yoneticiemail');
        $kullanici->rolId=7;

        if (request('password')!=request('password_confirmation'))
        {
            alert()
                ->error('Hata !', 'Şifreler Uyuşmuyor !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $kullanici->password=Hash::make(request('password'));
        }

        $sirket->save();
        $kullanici->save();
        if ($sirket)
        {
            alert()
                ->success('Başarılı !', 'Güncellem İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('sirketBilgileri.create');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Güncellem İşlemi Başarısız !')
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
        //
    }
    public function sirketlogo(Request $request,$id)
    {
        //dd($request);
        $reklam=Reklamlar::where('id','=',$id)->first();
        $sirket=Sirket::find($reklam->sirketId);

            $resim=request()->file('logo');
            $sirket_dosya_adi='sirket'.'-'.time().'.'.$resim->extension();
            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler/sirket';
                $dosya_yolu=$hedef_klasor.'/'.$sirket_dosya_adi;
                $resim->move($hedef_klasor,$sirket_dosya_adi);
                $sirket->logo=$dosya_yolu;

                $sirket->save();
            }
        //dd($sirket);
        if ($sirket)
        {
            alert()
                ->success('Başarılı !','Logo Kaydetme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('sirketBilgileri.index');
        }
        else
        {
            alert()
                ->error('Hatalı !','Logo Kaydetme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function yoneticifoto(Request $request,$id)
    {
        //dd($request);
        $reklam=Reklamlar::where('id','=',$id)->first();
        $sirketler=Sirket::where('id','=',$reklam->sirketId)->first();
        $user=User::where('email','=',$sirketler->yoneticiemail)->first();
        $sirket=Sirket::find($reklam->sirketId);
        $kullanici=User::find($user->id);
        //dd($kullanici);
            $avatar=request()->file('yoneticifoto');
            $yonetici_dosya_adi='yonetici'.'-'.time().'.'.$avatar->extension();

            if ($avatar->isValid())
            {
                $hedef_klasor='uploads/resimler/sirket';
                $hedef_klasor1='uploads/resimler/kullanici';
                $dosya_yolu=$hedef_klasor.'/'.$yonetici_dosya_adi;
                $dosya_yolu1=$hedef_klasor1.'/'.$yonetici_dosya_adi;
                $avatar->move($hedef_klasor,$yonetici_dosya_adi);
                $sirket->yoneticifoto=$dosya_yolu;
                $kullanici->avatar=$dosya_yolu1;
            }
        $sirket->save();
        $kullanici->save();
        //dd($kullanici);
        if ($sirket)
        {
            alert()
                ->success('Başarılı !', 'Yönetici Fotograf Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('sirketBilgileri.index');
        }
        else
        {
            alert()
                ->error('Hatalı !', 'Yönetiici Fotograf Kaydetme İşlemi Başarısız !')
                ->autoClose(1000);
            return back();
        }
    }

    public function reklamResim(Request $request)
    {
        $galeri=new Galeri();
        $resimler=$request->file([]);
        foreach ($resimler as $resim)
        {
            $uzanti=$resim->getclientoriginalExtension();
            $uret=str_random(10);
            $dosya=$uret.'.'.$uzanti;
            $dizin='uploads/galeri';
            $dosyayolu=$dizin.'/'.$dosya;
            $resim->move($dizin,$dosya);

            $galeri->reklamid=request('reklamId');
            $galeri->url=$dosyayolu;
            $galeri->save();
        }
    }

    public function reklamVideo(Request $request)
    {
        $galeri=new Galeri();
        $videolar=$request->file([]);

        foreach ($videolar as $video)
        {
            $uzanti=$video->getclientoriginalExtension();
            $uret=str_random(10);
            $dosya=$uret.'.'.$uzanti;
            $dizin='uploads/galeri';
            $dosyayolu=$dizin.'/'.$dosya;
            $video->move($dizin,$dosya);

            $galeri->reklamid=request('reklamId');
            $galeri->url=$dosyayolu;
            $galeri->save();
        }

    }

    public function reklamDokuman(Request $request)
    {
        $galeri=new Galeri();
        $dokumanlar=$request->file([]);

        foreach ($dokumanlar as $dokuman)
        {
            $uzanti=$dokuman->getclientoriginalExtension();
            $uret=str_random(10);
            $dosya=$uret.'.'.$uzanti;
            $dizin='uploads/galeri';
            $dosyayolu=$dizin.'/'.$dosya;
            $dokuman->move($dizin,$dosya);

            $galeri->reklamid=request('reklamId');
            $galeri->url=$dosyayolu;
            $galeri->save();
        }
    }

    public function reklamAciklama(Request $request,$id)
    {
        //dd($request);
        $reklam=Reklamlar::find($id);
        $reklam->aciklama=request('aciklama');

        $reklam->save();
        alert()
            ->success('Başarılı !', ' Güncelleme İşleminiz Başarılı !')
            ->autoClose(2000);
        return back();

    }
}
