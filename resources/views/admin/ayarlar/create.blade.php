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
                            <span class="caption-subject font-dark sbold uppercase">Ayaralar Kayıt</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['route'=>'ayarlar.store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Baslık </label>
                                <div class="col-md-9">
                                    <input required autofocus value="{{old('baslik')}}" type="text" name="baslik" class="form-control input-circle" placeholder="Site Başlık">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">E-Mail </label>
                                <div class="col-md-9">
                                    <input required value="{{old('email')}}" type="text" name="email" class="form-control input-circle" placeholder="E-Mail Adresi">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Telefon </label>
                                <div class="col-md-9">
                                    <input  value="{{old('tel')}}" type="text" name="tel" class="form-control input-circle" placeholder="Telefon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fax </label>
                                <div class="col-md-9">
                                    <input  value="{{old('fax')}}" type="text" name="fax" class="form-control input-circle" placeholder="Fax">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Facebook </label>
                                <div class="col-md-9">
                                    <input  value="{{old('facebook')}}" type="text" name="facebook" class="form-control input-circle" placeholder="Facebook">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Instagram </label>
                                <div class="col-md-9">
                                    <input  value="{{old('instagram')}}" type="text" name="instagram" class="form-control input-circle" placeholder="Instagram">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Twitter </label>
                                <div class="col-md-9">
                                    <input  value="{{old('twitter')}}" type="text" name="twitter" class="form-control input-circle" placeholder="Twitter">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logo </label>
                                <div class="col-md-9">
                                    <input required  type="file" class="form-control input-circle" name="logo" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Adres </label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" value="{{old('adres')}}" rows="3" name="adres" placeholder="Adres"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn blue btn-outline btn-circle"><span class="fa fa-save"></span> Kaydet</button>
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

@endsection()

@section('js')
@endsection()







