<?php

namespace App\Http\Controllers;

use App\Roller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol=Roller::all();
        return view('admin.roller.index',compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol=Roller::all();
        return view('admin.roller.create',compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol=new Roller();
        if (is_numeric(request('adi')))
        {
                alert()
                    ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                    ->autoClose(2000);
                return back();
        }
        else
        {
            $rol->adi=request('adi');
        }
        if (request('aciklama')=='')
        {
            $rol->aciklama='';
        }
        else
        {
            $rol->aciklama=request('aciklama');
        }
        $rol->save();
        if ($rol)
        {
            alert()
                ->success('Başarılı !', 'Kaydetme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('roller.index');
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
        $rol=Roller::find($id);
        return view('admin.roller.edit',compact('rol'));
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
        $rol=Roller::find($id);
        if (is_numeric(request('adi')))
        {
            alert()
                ->error('Hatalı Giriş !', 'Sayısal Değer Giremezsiniz !')
                ->autoClose(2000);
            return back();
        }
        else
        {
            $rol->adi=request('adi');
        }
        if (request('aciklama')=='')
        {
            $rol->aciklama='';
        }
        else
        {
            $rol->aciklama=request('aciklama');
        }

        $rol->save();

        if ($rol)
        {
            alert()
                ->success('Başarılı !', 'Düzenleme İşlemi Başarılı !')
                ->autoClose(1000);
            return redirect()->route('roller.index');
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
        Roller::destroy($id);
        alert()
            ->success('Başarılı !', 'Silme İşlemi Başarılı !')
            ->autoClose(2000);
        return redirect()->route('roller.index');
    }
}
