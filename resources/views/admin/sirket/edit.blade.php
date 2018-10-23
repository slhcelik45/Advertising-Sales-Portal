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
                            <span class="caption-subject font-dark sbold uppercase">Şirket Düzenle :{{$sirket->adi}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::model($sirket,['route'=>['sirket.update',$sirket->id],'method'=>'PUT','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sektör</label>
                                <div class="col-md-9">
                                    <select required autofocus name="sektorId" class="form-control input-circle">
                                        <option value="{{$sirket->sektorId}}" selected>{{$sirket->SektorBul->adi}}</option>
                                        @foreach($sektorler as $sektor )
                                            <option value="{{$sektor->id}}">{{$sektor->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket Adi</label>
                                <div class="col-md-9">
                                    <input type="text" name="adi" class="form-control input-circle" value="{{$sirket->adi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket E-mail</label>
                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control input-circle{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$sirket->email}}" required>

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
                                    <input required class="form-control input-circle" name="tel" type="text"  value="{{$sirket->tel}}" />
                                    <span class="help-block"> (999) 999-9999 </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket Adres</label>
                                <div class="col-md-9">
                                    <textarea required class="form-control input-circle" rows="3" name="adres" >{{$sirket->adres}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Şirket Logo</label>
                                <div class="col-md-9">
                                    <input type="file" name="logo" class="form-control input-circle">
                                </div>
                                <div>
                                    <img border="0" width="80" height="80" src="/{{$sirket->logo}}"
                                         style="float: left;margin: 20px 15px 15px 360px;"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">Yonetici</span>
                                <hr width="100%" color="#E6E6FA ">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici Adi</label>
                                    <div class="col-md-9">
                                        <input required type="text" name="yoneticiadi" class="form-control input-circle" value="{{$sirket->yoneticiadi}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici Soyadı</label>
                                    <div class="col-md-9">
                                        <input required type="text" name="yoneticisoyadi" class="form-control input-circle" value="{{$sirket->yoneticisoyadi}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Yönetici Telefon</label>
                                    <div class="col-md-9">
                                        <input required class="form-control input-circle" name="yoneticiceptel" type="text" value="{{$sirket->yoneticiceptel}}" />
                                        <span class="help-block"> (999) 999-9999 </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici E-mail</label>
                                    <div class="col-md-9">
                                        <input id="yoneticiemail" type="email" class="form-control input-circle{{ $errors->has('email') ? ' is-invalid' : '' }}" name="yoneticiemail" value="{{$sirket->yoneticiemail}}" required>

                                        @if ($errors->has('yoneticiemail'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('yoneticiemail') }}</strong>
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
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yönetici Foto</label>
                                    <div class="col-md-9">
                                        <input type="file" name="yoneticifoto" class="form-control input-circle">
                                    </div>
                                    <div>
                                        <img border="0" width="80" height="80" src="/{{$sirket->yoneticifoto}}"
                                             style="float: left;margin: 20px 30px 30px 360px;"
                                        >
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
    </div>
@endsection()

@section('css')
@endsection()
@section('js')

@endsection()







