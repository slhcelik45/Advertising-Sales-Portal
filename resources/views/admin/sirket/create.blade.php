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
                            <span class="caption-subject font-dark sbold uppercase">Şirket Kayıt</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['route'=>'sirket.store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sektör</label>
                                <div class="col-md-9">
                                    <select required autofocus name="sektorId" class="form-control input-circle">
                                        <option value="" selected>Sektör Seçiniz</option>
                                        @foreach($sektorler as $sektor )
                                            <option value="{{$sektor->id}}">{{$sektor->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket Adi</label>
                                <div class="col-md-9">
                                    <input required type="text" name="adi" value="{{old('adi')}}" class="form-control input-circle" placeholder="Şirket Adı">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket E-mail</label>
                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control input-circle{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Şirket Telefon</label>
                                <div class="col-md-9">
                                    <input required class="form-control input-circle" name="tel" value="{{old('tel')}}" type="text" placeholder="Şirket Telefon" />
                                    <span class="help-block"> (999) 999-9999 </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket Adres</label>
                                <div class="col-md-9">
                                    <textarea required class="form-control input-circle" rows="3" name="adres" value="{{old('adres')}}" placeholder="Adres"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Yonetici Kayıt</span>
                                <hr width="100%" color="#E6E6FA ">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici Adi</label>
                                    <div class="col-md-9">
                                        <input required type="text" name="yoneticiadi" value="{{old('yoneticiadi')}}" class="form-control input-circle" placeholder="Yönetici Adı">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici Soyadı</label>
                                    <div class="col-md-9">
                                        <input required type="text" name="yoneticisoyadi" value="{{old('yoneticisoyadi')}}" class="form-control input-circle" placeholder="Yönetici Soyadi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Yönetici Telefon</label>
                                    <div class="col-md-9">
                                        <input required class="form-control input-circle" name="yoneticiceptel" value="{{old('yoneticiceptel')}}" type="text" placeholder="Yönetici Telefon" />
                                        <span class="help-block"> (999) 999-9999 </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici E-mail</label>
                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control input-circle{{ $errors->has('email') ? ' is-invalid' : '' }}" name="yoneticiemail" value="{{old('yoneticiemail')}}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Şifre</label>
                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control input-circle{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Şifre Tekrarla</label>
                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control input-circle" name="password_confirmation" required>
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
@endsection()

@section('js')

@endsection()







