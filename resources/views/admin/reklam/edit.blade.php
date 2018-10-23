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
                            <span class="caption-subject font-dark sbold uppercase">Reklam Düzenleme :{{$reklam->adi}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::model($reklam,['route'=>['reklam.update',$reklam->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket</label>
                                <div class="col-md-9">
                                    <select name="sirketId" class="form-control input-circle">
                                        <option value="{{$reklam->sirketId}}" selected>{{$reklam->Sirketler->adi}}</option>
                                        @foreach($sirketler as $sirket )
                                            <option value="{{$sirket->id}}">{{$sirket->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Tipi</label>
                                <div class="col-md-9">
                                    <select name="reklamTipiId" id="reklamTipiId" class="form-control input-circle">
                                        <option value="{{$reklam->reklamTipiId}}" selected>{{$reklam->ReklamTipleri->adi}}</option>
                                        @foreach($reklamTipleri as $t )
                                            <option value="{{$t->id}}">{{$t->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Kuşağı</label>
                                <div class="col-md-9">
                                    <select name="reklamKusagiId" id="reklamKusagiId" class="form-control input-circle">
                                        <option value="{{$reklam->reklamKusagiId}}" selected>{{$reklam->ReklamKusagi->sure}}-{{$reklam->ReklamKusagi->gunlukSpot}}-{{$reklam->ReklamKusagi->fiyat}}</option>
                                        @foreach($reklamKusagi as $t )
                                            <option value="{{$t->id}}">{{$t->ReklamTipi->adi}}:{{$t->sure}}-{{$t->gunlukSpot}}-{{$t->fiyat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Adi</label>
                                <div class="col-md-9">
                                    <input type="text" name="adi" class="form-control input-circle" value="{{$reklam->adi}}">
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                    <label class="col-md-3 control-label">Fiyat</label>
                                    <div class="col-md-9">
                                        <input disabled="disabled" type="text" id="fiyat" name="fiyat" class="form-control input-circle" value="{{$reklam->fiyat}}">
                                    </div>
                            </div>
                                <label class="col-md-3 control-label">Slogan</label>
                                <div class="col-md-9">
                                    <input type="text" name="slogan" class="form-control input-circle" value="{{$reklam->slogan}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Başlama Tarih :</label>
                                <div class="col-md-4">
                                    <input class="form-control input-circle form-control-inline input-medium date-picker" size="16" type="date" value="{{$reklam->baslangicTarih}}" name="baslangicTarih" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Bitiş Tarihi</label>
                                <div class="col-md-4">
                                    <input class="form-control input-circle form-control-inline input-medium date-picker" size="16" type="date" value="{{$reklam->bitisTarih}}" name="bitisTarih" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="4" name="aciklama" >{{$reklam->aciklama}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn blue-dark btn-outline btn-circle"><span class="fa fa-refresh"></span> Güncelle</button>
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







