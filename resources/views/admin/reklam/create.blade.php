@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-11 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">Reklam Kayıt</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['route'=>'reklam.store','method'=>'POST','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket</label>
                                <div class="col-md-9">
                                    <select required autofocus id="sirketId" name="sirketId" class="form-control input-circle">
                                        <option value="" selected>Şirket Seçiniz</option>
                                        @foreach($sirketler as $sirket )
                                            <option value="{{$sirket->id}}">{{$sirket->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Firmalar</label>
                                <div class="col-md-9">
                                    <select required id="reklamTipiId" name="reklamTipiId" class="form-control input-circle">
                                        <option value="" selected>Firma Seçiniz</option>
                                        @foreach($reklamTipleri as $t )
                                            <option value="{{$t->id}}">{{$t->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Kategori</label>
                                <div class="col-md-9">
                                    <select required id="KampanyaID" name="kampanyaId" class="form-control input-circle">
                                        <option value="" selected>Kampanya Seçiniz</option>
                                        @foreach($kampanyalar as $t )
                                            <option value="{{$t->id}}">{{$t->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kategori Alan</label>
                                <div class="col-md-9">
                                    <select required id="AltKategori" name="AltKategori" class="form-control input-circle">
                                        <option value="" selected>Kampanya Alan Seçiniz</option>
                                        @foreach($paketler as $t )
                                            <option value="{{$t->id}}">{{$t->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" hidden id="ReklamKusaklar">
                                <label class="col-md-3 control-label">Reklam Kuşakları</label>
                                <div class="col-md-9">
                                    <select id="reklamKusagiId" name="reklamKusagiId" class="form-control input-circle">
                                        <option value="" selected>Firma:Ay-GünlükSpot-Fiyat</option>
                                        @foreach($reklamKusagi as $t )
                                            <option value="{{$t->id}}">{{$t->ReklamTipi->adi}}:{{$t->sure}}-{{$t->gunlukSpot}}-{{$t->fiyat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Başlama Tarih</label>
                                <div class="col-md-4">
                                    <input required class="form-control input-circle form-control-inline input-medium " size="16" type="date" id="baslangicTarih" value="" name="baslangicTarih"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Bitiş Tarihi</label>
                                <div class="col-md-4">
                                    <input required class="form-control input-circle form-control-inline input-medium " size="16" type="date" value="" id="bitisTarih" name="bitisTarih" />
                                </div>
                            </div>
                            <div class="form-group" hidden id="kampanyalar">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-3">
                                    <img style="float: left;" src="/admin/assets/layouts/layout/img/kanal23.png" width="70px" height="70px">
                                    <input style="float:right; width: 150px;margin: 22px 26px 0 0" type="text" id="Tvspot" name="Tvspot" disabled="disabled" class="form-control input-circle">
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    @foreach($radyolar as $i=> $r)
                                        <div class="col-md-2">
                                            <input name="radyo{{$i}}" value="{{$r->id}}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group" hidden id="kampanyalar1">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    @foreach($radyolar as $i=> $r)
                                       <div class="col-md-2">
                                            <img  src="/{{$r->logo}}" height="50px">
                                            <input style=" width: 100px;"  type="number" id="RadyoSpot{{$i}}" name="radyoSpot{{$i}}" min="1000" max="10000" step="500" value="1000" class="form-control input-circle">
                                       </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group" hidden id="RadyoSaatler">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-3">
                                    <select  id="baslangicSaat" name="baslangicSaat" class="form-control input-circle">
                                        <option value="" selected>Başlangış Saati Seçiniz !</option>
                                        @for($i=0;$i<24;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select  id="bitisSaat" name="bitisSaat" class="form-control input-circle">
                                        <option value="" selected>Bitiş Saati Seçiniz !</option>
                                        @for($i=0;$i<24;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label class="col-md-3 control-label">Fiyat</label>
                                <div class="col-md-9">
                                    <input type="text" id="SpotSayisi" name="SpotSayisi" class="form-control input-circle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fiyat</label>
                                <div class="col-md-9" id="ilkFiyat" fiyat="">
                                    <input disabled="disabled" type="text" id="fiyat" name="fiyat" class="form-control input-circle" placeholder="Reklam Fiyat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Adi</label>
                                <div class="col-md-9">
                                    <input required type="text" name="adi" class="form-control input-circle" placeholder="Reklam Adı">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Slogan</label>
                                <div class="col-md-9">
                                    <input type="text" name="slogan" class="form-control input-circle" placeholder="Slogan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="4" name="aciklama" placeholder="Açıklama"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn blue btn-outline btn-circle"><span class="fa fa-save"></span> Kaydet</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('css')
    <link href="/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
@endsection()

@section('js')
    <script src="/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
@endsection()

@section('script')

    <script>
        $('#KampanyaID').on('change',function (e) {
            console.log(e);
            var Id=e.target.value;

            $.get('/yonetim/json-KategoriAlan?Id='+ Id,function (data) {
                console.log(data);
                $('#AltKategori').empty();
                $('#AltKategori').append('<option value="" selected="true">Kampanya Alan Seçiniz</option>');

                $.each(data,function (index,reklamKusagiObj) {
                   $('#AltKategori').append('<option value="'+ reklamKusagiObj.id +'">'+ reklamKusagiObj.adi +'</option>');
                })
            });
        });

        $('#AltKategori').on('change',function (e) {
            console.log(e);
            var Id=e.target.value;

            $.get('/yonetim/json-KampanyaKusak?Id='+ Id,function (data) {
                console.log(data);
                $('#reklamKusagiId').empty();
                $('#reklamKusagiId').append('<option value="" selected="true">Kampanya Alan Seçiniz</option>');

                $.each(data,function (index,reklamKusagiObj) {
                    $('#ReklamKusaklar').show();
                    $('#reklamKusagiId').append('<option value="'+ reklamKusagiObj.id +'">'+ reklamKusagiObj.sure +'-'+ reklamKusagiObj.gunlukSpot +'-'+ reklamKusagiObj.fiyat +'</option>');
                })
            });
        });
        
        $('#bitisSaat').on('change',function (e) {
           console.log(e);
           var Id=e.target.value;
           var baslangic=$('#baslangicSaat').val();

           $.get('/yonetim/json-SaatFiyat?Id='+ Id,function (data) {
               console.log(data);
               $.each(data,function (index,SaatFiyatObj) {
                   var fark=(Id-baslangic);

                   if (fark>0)
                   {
                       $('#fiyat').val((SaatFiyatObj.fiyat)*fark);
                       $('#fiyat').append('<input value="'+ ((SaatFiyatObj.fiyat)*fark)+'" name="fiyat" id="fiyat" placeholder="'+ ((SaatFiyatObj.fiyat)*fark)+'">');
                   }
               })
           });
        });

        $('#bitisTarih').on('change',function (e) {
           console.log(e);
           var btsTarih=e.target.value;
           var bslTarih=$('#baslangicTarih').val();
            for (var i=0;i<24;i++)
            {
                $('#baslangicSaat').append('<option value="'+ i +'">'+ i +'</option>');
                $('#bitisSaat').append('<option value="'+ i +'">'+ i +'</option>');
            }

           $.get('/yonetim/json-SaatTarih?Id='+btsTarih+bslTarih,function (data) {
              console.log(data);
               $('#baslangicSaat').empty();
               $('#baslangicSaat').append('<option value="" selected="true">Başlangıç Saati Seçiniz !</option>');

               $('#bitisSaat').empty();
               $('#bitisSaat').append('<option value="" selected="true">Bitiş Saati Seçiniz !</option>');
              $.each(data,function (index,SaatTarih) {
                  for(var i=0;i<24;i++)
                  {
                      if (SaatTarih.baslangicSaat!=i)
                      {
                          $('#baslangicSaat').append('<option value="'+ i +'">'+ i +'</option>');

                      }
                      if (SaatTarih.bitisSaat!=i)
                      {
                          $('#bitisSaat').append('<option value="'+ i +'">'+ i +'</option>');
                      }
                  }
              })
           });
        });

        $('#AltKategori').on('change',function (e) {
            console.log(e);
            var Id=e.target.value;
            $.get('/yonetim/json-AltKategori?Id='+ Id,function (data) {
                console.log(data);
                $.each(data,function (index,reklamKusagiObj) {
                    if (reklamKusagiObj.kategoriId==Id && reklamKusagiObj.kampanyaId==3)
                    {
                        $('#kampanyalar').show();
                        $('#kampanyalar1').show();
                        $('#ReklamKusaklar').hide();
                        $('#RadyoSaatler').hide();

                        $('#fiyat').val(reklamKusagiObj.fiyat);
                        $('#fiyat').append('<input value="'+ reklamKusagiObj.fiyat+'" name="fiyat" id="fiyat" placeholder="'+ reklamKusagiObj.fiyat+'">');

                        if (reklamKusagiObj.gunlukSpot<9000)
                        {
                            $('#Tvspot').val(reklamKusagiObj.gunlukSpot);
                            $('#Tvspot').append('<input value="'+ reklamKusagiObj.gunlukSpot+'" name="Tvspot" id="Tvspot">')
                        }
                        else
                        {
                            $('#SpotSayisi').append('<input value="'+ reklamKusagiObj.gunlukSpot+'" name="SpotSayisi" id="SpotSayisi">');
                          $('#kampanyalar1 input').val((reklamKusagiObj.gunlukSpot)/4);
                        }
                    }
                    else
                    {
                        $('#kampanyalar').hide();
                        $('#kampanyalar1').hide();
                        $('#ReklamKusaklar').show();
                    }
                    if (reklamKusagiObj.kategoriId == Id && reklamKusagiObj.kampanyaId==5)
                    {
                        $('#fiyat').val(reklamKusagiObj.fiyat);
                        $('#ReklamKusaklar').hide();
                        $('#RadyoSaatler').show();
                    }
                })
            });
        });
     </script>

@stop







