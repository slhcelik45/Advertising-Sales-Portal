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
                            <span class="caption-subject font-dark sbold uppercase">Reklam Kuşağı</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::model($reklamKusagi,['route'=>['reklamKusagi.update',$reklamKusagi->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Firma</label>
                                <div class="col-md-9">
                                    <select required autofocus name="reklamTip" id="reklamTip" class="form-control input-circle">
                                        <option value="{{$reklamKusagi->reklamTipiId}}" selected>
                                            {{$reklamKusagi->ReklamTipi->adi}}
                                        </option>
                                        @foreach($reklamTipi as $reklam )
                                            <option value="{{$reklam->id}}">{{$reklam->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Firma Kategori</label>
                                    <div class="col-md-9">
                                        <select required name="kategoriId" id="kategoriId" class="form-control input-circle">
                                            <option value="{{$reklamKusagi->kategoriId}}" selected>
                                                {{$reklamKusagi->Paketler->adi}}
                                            </option>
                                            @foreach($paketler as $paket )
                                                <option value="{{$paket->id}}">{{$paket->adi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Başlık</label>
                                <div class="col-md-9">
                                    <input type="text" name="sure" class="form-control input-circle" value="{{$reklamKusagi->baslik}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Süre</label>
                                <div class="col-md-9">
                                    <input required type="text" name="sure" class="form-control input-circle" value="{{$reklamKusagi->sure}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Spot Sayısı</label>
                                <div class="col-md-9">
                                    <input required type="text" name="gunlukSpot" class="form-control input-circle" value="{{$reklamKusagi->gunlukSpot}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fiyat</label>
                                <div class="col-md-9">
                                    <input required type="text" name="fiyat" class="form-control input-circle" value="{{$reklamKusagi->fiyat}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="3" name="aciklama" >{{$reklamKusagi->aciklama}}</textarea>
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

@endsection()

@section('js')
@endsection()







