<?php

namespace App\Http\Controllers;
use App\Ayarlar;
use App\Mail\Iletisim;
use App\Sektorler;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Sirket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SirketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sirketler=Sirket::all();
        return view('admin.sirket.index',compact('sirketler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sektorler=Sektorler::all();
        return view('admin.sirket.create',compact('sektorler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sirket=new Sirket();
        $kullanici=new User();
        $ayar=Ayarlar::first();

        $sirket->sektorId=request('sektorId');
        $sirket->usersId=Auth::user()->id;
        $sirket->adi=request('adi');
        $sirket->adres=request('adres');
        if (strlen(request('tel'))==10)
        {
            $sirket->tel=request('tel');
        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Telefon Bilgisisini Eksik veye Fazla Değer Girdiniz !')
                ->autoClose(2000);
            return back();
        }
        $sirket->email=request('email');
        $sirket->logo='';
        if (is_numeric(request('yoneticiadi')) || is_numeric(request('yoneticisoyadi')))
        {
            alert()
                ->error('Hatalı Giriş !', ' Yönetici Ad ve Soyad Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $sirket->yoneticiadi=request('yoneticiadi');
            $sirket->yoneticisoyadi=request('yoneticisoyadi');
        }

        if (strlen(request('yoneticiceptel'))==10)
        {
            $sirket->yoneticiceptel=request('yoneticiceptel');

        }
        else
        {
            alert()
                ->error('Hatalı Giriş !', 'Telefon Bilgisisini Eksik veye Fazla Değer Girdiniz !')
                ->autoClose(2000);
            return back();
        }
        $sirket->yoneticiemail=request('yoneticiemail');
        $sirket->yoneticifoto='';

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

        $adres='http://www.kanal23.com/';

        $bilgiler=array
        (
            'şirketLogo'=>$ayar->logo,
            'sirketIsmi'=>$ayar->baslik,
            'sirketEmail'=>$ayar->email,
            'sirketTel'=>$ayar->tel,
            'url'=>$adres,
            'girisEmail'=>$kullanici->email,
            'sifre'=>$kullanici->password,
        );

        Mail::to($kullanici->email)->send(new Iletisim($bilgiler));

        if ($sirket)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('sirket.index');
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
        $sirket=Sirket::find($id);
        $sektorler=Sektorler::all();
        return view('admin.sirket.edit',compact('sirket','sektorler'));
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
        $ayar=Ayarlar::first();

        //dd($request);
        $sirket->sektorId=request('sektorId');
        $sirket->usersId=Auth::user()->id;
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

        $adres='http://www.kanal23.com/';
        $mail=request('yoneticiemail');

        $bilgiler=array
        (
            'şirketLogo'=>$ayar->logo,
            'sirketIsmi'=>$ayar->baslik,
            'sirketEmail'=>$ayar->email,
            'sirketTel'=>$ayar->tel,
            'url'=>$adres,
            'girisEmail'=>request('yoneticiemail'),
            'sifre'=>request('password')
        );

        Mail::to($mail)->send(new Iletisim($bilgiler));

        if ($sirket)
        {
            alert()
                ->success('Başarılı !', 'Güncellem İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('sirket.index');
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
        Sirket::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(1000);
        return redirect()->route('sirket.index');
    }

}
