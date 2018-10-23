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
                            <span class="caption-subject font-dark sbold uppercase">Reklam Kampanya Düzenle :{{$kampanya->adi}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::model($kampanya,['route'=>['kampanya.update',$kampanya->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Firma</label>
                                <div class="col-md-9">
                                    <select required autofocus name="reklamTipiId" class="form-control input-circle">
                                        <option value="{{$kampanya->reklamTipiId}}" selected>
                                            {{$kampanya->ReklamTipi->adi}}
                                        </option>
                                        @foreach($reklamtipi as $reklam )
                                            <option value="{{$reklam->id}}">{{$reklam->adi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Rol Adi :</label>
                                <div class="col-md-9">
                                    <input required type="text" name="adi" class="form-control input-circle" value="{{$kampanya->adi}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama :</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="3" name="aciklama">{{$kampanya->aciklama}}</textarea>
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







