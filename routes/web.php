<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix'=>'yonetim','middleware'=>'auth'],function() {
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('cikis','AdminController@cikis')->name('admin.cikis');
    Route::get('profil/{id}','AdminController@profil')->name('kullanici.profil');
    Route::get('takvim/{id}','AdminController@takvim')->name('kullanici.takvim');
    Route::get('json-kusak','ReklamlarController@reklamkusak');
    Route::get('json-kampanya','ReklamlarController@reklamKampanya');
    Route::get('json-KategoriAlan','ReklamlarController@KategoriAlan');
    Route::get('json-KampanyaKusak','ReklamlarController@KampanyaKusak');
    Route::get('json-AltKategori','ReklamlarController@AltKategori');
    Route::get('json-SaatFiyat','ReklamlarController@SaatFiyat');
    Route::get('json-SaatTarih','ReklamlarController@SaatTarih');
    Route::get('json-fiyat','ReklamlarController@reklamfiyat');
    Route::get('json-reklamTip','ReklamKusagiController@reklamKategori');
    Route::get('json-reklamKampanya','PaketlerController@reklamKampanyalar');

});

Route::group(['prefix'=>'yonetim','middleware'=>'admin'],function ()
{
    Route::resource('roller','RolController');
    Route::resource('sektorler','SektorController');
    Route::resource('reklamTipi','ReklamTipiController');
    Route::resource('paketler','PaketlerController');
    Route::resource('kampanyaTuru','KampanyaTuruController');
    Route::resource('kampanya','KampanyaController');
    Route::resource('reklamKusagi','ReklamKusagiController');
    Route::resource('reklam','ReklamlarController');
    Route::get('kullanici','AdminController@kullanici')->name('kullanici.index');
    Route::get('kullaniciekle','AdminController@kullaniciekle')->name('kullanici.ekle');
    Route::post('kullanicikayit','AdminController@kullanicikayit')->name('kullanici.kayit');
    Route::get('kullaniciduzenle/{id}','AdminController@kullaniciduzenle')->name('kullanici.duzenle');
    Route::post('kullaniciguncelle/{id}','AdminController@kullaniciguncelle')->name('kullanici.guncelle');
    Route::delete('kullanicisil/{id}','AdminController@kullanicisil')->name('kullanici.sil');
    Route::get('sirketler','AdminController@sirketler')->name('sirketler.index');
    Route::resource('ayarlar','AyarlarController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('yonetim');

Route::group(['prefix'=>'yonetim','middleware'=>'sahaPersoneli'],function(){
    Route::resource('sirket','SirketController');
    Route::resource('reklam','ReklamlarController');
    Route::get('tvSpotReklamlar','ReklamlarController@tvSpotReklamlar')->name('tv.spotReklamlar');
    Route::get('tvSponsorluk','ReklamlarController@tvSponsorluk')->name('tv.sponsorluk');
    Route::get('tvKampanya','ReklamlarController@tvKampanya')->name('tv.kampanya');
    Route::get('radyoSpotReklamlar','ReklamlarController@radyoSpotReklamlar')->name('radyo.spotReklamlar');
    Route::get('radyoJingle','ReklamlarController@radyoJingle')->name('radyo.radyoJingle');
});

Route::group(['prefix'=>'yonetim',['middleware'=>'webPersoneli','middleware'=>'tvPersoneli','middleware'=>'radyoPersoneli']],function(){
    Route::resource('galeri','GaleriController');
    Route::get('reklamYayinda','GaleriController@reklamYayinda')->name('galeri.yayinda');
});

Route::group(['prefix'=>'yonetim','middleware'=>'sirket'],function(){
    Route::resource('sirketBilgileri','SirketBilgileriController');
    Route::post('sirketlogo/{id}','SirketBilgileriController@sirketlogo')->name('sirketBilgileri.logo');
    Route::post('yoneticifoto/{id}','SirketBilgileriController@yoneticifoto')->name('sirketBilgileri.foto');
    Route::post('reklamResim','SirketBilgileriController@reklamResim')->name('sirketBilgileri.reklamResim');
    Route::post('reklamVideo','SirketBilgileriController@reklamVideo')->name('sirketBilgileri.reklamVideo');
    Route::post('reklamDokuman','SirketBilgileriController@reklamDokuman')->name('sirketBilgileri.reklamDokuman');
    Route::post('reklamAciklama/{id}','SirketBilgileriController@reklamAciklama')->name('sirketBilgileri.reklamAciklama');
});

