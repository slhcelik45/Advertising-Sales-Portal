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
                            <span class="caption-subject font-dark sbold uppercase">Kullanıcı Ekle</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form method="POST" action="{{ route('kullanici.guncelle',$kullanici->id)}}" aria-label="{{ __('Register') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Yetkiker</label>
                                    <div class="col-md-9">
                                        <select required autofocus name="rolId" class="form-control input-circle">
                                            <option value="{{$kullanici->rolId}}" selected >{{$kullanici->Roller->adi}}</option>
                                            @foreach($roller as $rol )
                                                <option value="{{$rol->id}}">{{$rol->adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kullanıcı Adı</label>
                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control input-circle" name="name" value="{{$kullanici->name}}" required >

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">E-mail</label>
                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control input-circle" name="email" value="{{$kullanici->email}}" required>

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
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Avatar :</label>
                                    <div class="col-md-9">
                                        <input  type="file" class="form-control input-circle" name="avatar" >
                                    </div>
                                    <div>
                                        <img border="0" width="50" height="50" src="/{{$kullanici->avatar}}"
                                             style="float: left;margin: 20px 20px 50px 280px;"
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
                        </form>
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







