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
                            <span class="caption-subject font-dark sbold uppercase">Firma Düzenleme :{{$reklam->adi}}</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::model($reklam,['route'=>['reklamTipi.update',$reklam->id],'method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reklam Firma İsmi </label>
                                <div class="col-md-9">
                                    <input required autofocus type="text" name="adi" class="form-control input-circle" value="{{$reklam->adi}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Firma Logo</label>
                                <div class="col-md-9">
                                    <input required  type="file" name="logo" value="{{old('logo')}}" class="form-control input-circle" placeholder="Firma Logosu">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama </label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="3" name="aciklama" >{{$reklam->aciklama}}</textarea>
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







