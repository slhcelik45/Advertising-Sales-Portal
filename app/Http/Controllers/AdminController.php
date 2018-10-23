<?php

namespace App\Http\Controllers;

use App\Reklamlar;
use App\Roller;
use App\Sirket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$toplamFiyat=Reklamlar::where('reklamTipiId','=',1)->sum('fiyat');
        //$toplamTV=Reklamlar::where('reklamTipiId','=',1)->count();
        //$toplamRadyo=Reklamlar::where('reklamTipiId','=',2)->count();


        //dd($toplamFiyat);
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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

    public function sirketler()
    {
        $sirketler=Sirket::all();
        return view('admin.kullanicilar.sirketler',compact('sirketler'));
    }

    public function kullanici()
    {
        $kullanicilar=User::where('rolId','!=',7)->get();

        //dd($kullanicilar);
        return view('admin.kullanicilar.index',compact('kullanicilar'));
    }

    public function profil($id)
    {
        $kullanici=User::find($id);
        return view('admin.kullanicilar.profil',compact('kullanici'));
    }

    public function kullaniciekle()
    {
        $roller=Roller::all();
        return view('admin.kullanicilar.create',compact('roller'));
    }

    public function kullanicikayit(Request $request)
    {
        $kullanici=new User();
        $kullanici->name=request('name');
        $kullanici->email=request('email');
        $kullanici->rolId=request('rolId');
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

        if (request()->hasFile('avatar'))
        {
            $resim=request()->file('avatar');
            $dosya_adi='avatar'.'.'.time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler/kullanici';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $kullanici->avatar=$hedef_yolu;
            }
        }
        $kullanici->save();
        if ($kullanici)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Ekleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Ekleme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function kullaniciduzenle($id)
    {
        $kullanici=User::find($id);
        $roller=Roller::all();
        return view('admin.kullanicilar.edit',compact('kullanici','roller'));
    }
    public function kullaniciguncelle(Request $request,$id)
    {
        $kullanici=User::find($id);
        $kullanici->name=request('name');
        $kullanici->email=request('email');
        $kullanici->rolId=request('rolId');
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
        if (request()->hasFile('avatar'))
        {
            $resim=request()->file('avatar');
            $dosya_adi='avatar'.'.'.time().'.'.$resim->extension();

            if ($resim->isValid())
            {
                $hedef_klasor='uploads/resimler/kullanici';
                $hedef_yolu=$hedef_klasor.'/'.$dosya_adi;
                $resim->move($hedef_klasor,$dosya_adi);
                $kullanici->avatar=$hedef_yolu;
            }
        }
        $kullanici->save();
        //dd($request);
        if ($kullanici)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Güncelleme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Güncelleme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function kullanicisil($id)
    {
        $sil=User::find($id)->delete();
        if ($sil)
        {
            alert()
                ->success('Başarılı !', 'Kullanıcı Silme İşlemi Başarılı !')
                ->autoClose(2000);
            return redirect()->route('kullanici.index');
        }
        else
        {
            alert()
                ->error('Başarısız !', 'Kullanıcı Silme İşlemi Başarısız !')
                ->autoClose(2000);
            return back();
        }
    }

    public function cikis()
    {
        auth()->logout();
        return redirect('/');
    }

    public function sirketliste()
    {
        $sirket=Sirket::all();
        return view('admin.sirketIsleri.index',compact('sirket'));
    }

    public function takvim($id)
    {
        return view('admin.kullanicilar.takvim');
    }
}
