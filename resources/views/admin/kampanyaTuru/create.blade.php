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
                            <span class="caption-subject font-dark sbold uppercase">Kampanya Türü  Kayıt</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['route'=>'kampanyaTuru.store','method'=>'POST','class'=>'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kampanya Tür Adi :</label>
                                <div class="col-md-9">
                                    <input type="text" name="adi" class="form-control input-circle" placeholder="Kampanya Paket Adı">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Açıklama :</label>
                                <div class="col-md-9">
                                    <textarea class="form-control input-circle" rows="3" name="aciklama" placeholder="Açıklama"></textarea>
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







