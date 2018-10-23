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
                        {!! Form::open(['route'=>'reklamKusagi.store','method'=>'POST','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Firma</label>
                                <div class="col-md-9">
                                    <select required autofocus name="reklamTipiId" id="reklamKampanyaId" class="form-control input-circle">
                                        <option value="" selected>Reklam Firma Seçiniz</option>
                                        @foreach($reklamtipleri as $reklam )
                                            <option value="{{$reklam->id}}">{{$reklam->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Kampanyalar</label>
                                <div class="col-md-9">
                                    <select required autofocus name="kampanyaId" id="kampanyaId" class="form-control input-circle">
                                        <option value="" selected>Reklam Kampanya Seçiniz</option>
                                        @foreach($kampanyalar as $kampanya )
                                            <option value="{{$kampanya->id}}">{{$kampanya->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Kategori</label>
                                <div class="col-md-9">
                                    <select required name="kategoriId" id="kategoriId" class="form-control input-circle">
                                        <option value="" selected>Reklam Kategori Seçiniz</option>
                                        @foreach($paketler as $reklam )
                                            <option value="{{$reklam->id}}">{{$reklam->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Başlık</label>
                                <div class="col-md-9">
                                    <input type="text" name="baslik" value="{{old('baslik')}}" class="form-control input-circle" placeholder="Reklam Başlık">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Süre</label>
                                <div class="col-md-9">
                                    <input required type="text" name="sure" value="{{old('sure')}}" class="form-control input-circle" placeholder="1 Ay">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Spot Sayısı</label>
                                <div class="col-md-9">
                                    <input required type="text" name="gunlukSpot" value="{{old('gunlukSpot')}}" class="form-control input-circle" placeholder="Spot Sayısı">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Fiyat</label>
                                <div class="col-md-9">
                                    <input required type="text" name="fiyat" value="{{old('fiyat')}}" class="form-control input-circle" placeholder="Fiyat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="3" value="{{old('aciklam')}}" name="aciklama" placeholder="Açıklama"></textarea>
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







