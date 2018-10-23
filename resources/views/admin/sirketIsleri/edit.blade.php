@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="profile">
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Şirket </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab"> Medya </a>
                    </li>
                    <li>
                        <a href="#tab_1_6" data-toggle="tab"> İçerik </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active " id="tab_1_1">
                        <div class="row profile-account">
                            <div class="col-md-3 active">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab_1-1">
                                            <i class="fa fa-black-tie"></i> Şirket Logo</a>
                                        <span class="after"> </span>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_2-2">
                                            <i class="fa fa-picture-o"></i> Yönetici Foto</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div id="tab_1-1" class="tab-pane active">
                                        <form method="POST" action="{{route('sirketBilgileri.logo',$reklam->id)}}" enctype="multipart/form-data" role="form">
                                            @csrf
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new"  data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail"  style="width: 200px; height: 150px;">
                                                        <img src="/{{$reklam->Sirketler->logo}}" name="logo" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" name="logo" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn green-jungle btn-outline btn-circle btn-file">
                                                                            <span class="fileinput-new"> Resim Seçin </span>
                                                                            <span class="fileinput-exists"> Değiştir </span>
                                                                            <input type="file" name="logo"> </span>
                                                        <a href="javascript:;" class="btn red btn-outline btn-circle fileinput-exists" data-dismiss="fileinput"> Sil </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn blue btn-circle btn-outline"><span class="fa fa-save"> Kaydet</span></button>
                                                <a href="javascript:;" class="btn yellow btn-outline btn-circle"> İptal </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="tab_2-2" class="tab-pane   ">
                                        <form method="POST" action="{{route('sirketBilgileri.foto',$reklam->id)}}" enctype="multipart/form-data" role="form">
                                            @csrf
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="/{{$reklam->Sirketler->yoneticifoto}}" name="yoneticifoto" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" name="yoneticifoto" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn green-jungle btn-outline btn-circle btn-file">
                                                                            <span class="fileinput-new"> Resim Seçin </span>
                                                                            <span class="fileinput-exists"> Değiştir </span>
                                                                            <input type="file" name="yoneticifoto"> </span>
                                                        <a href="javascript:;" class="btn red btn-outline btn-circle fileinput-exists" data-dismiss="fileinput"> Sil </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn blue btn-circle btn-outline"><span class="fa fa-save"> Kaydet</span></button>
                                                <a href="javascript:;" class="btn yellow btn-outline btn-circle"> İptal </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <!--tab_1_2-->
                    <div class="tab-pane " id="tab_1_3">
                        <div class="row profile-account">
                            <div class="col-md-3">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab_1-1">
                                            <i class="fa fa-picture-o"></i> Foto </a>
                                        <span class="after"> </span>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_2-2">
                                            <i class="fa fa-file-video-o"></i> Video </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab_3-3">
                                            <i class="glyphicon glyphicon-book"></i> Döküman </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div id="tab_1-1" class="tab-pane active ">
                                        {!! Form::open(['route'=>'sirketBilgileri.reklamResim','method'=>'POST','class'=>'dropzone dropzone-file-area','id'=>'my-dropzone',
                                        'style'=>'width:900px; height:400px; margin-top:10px;','files'=>'true','multiple'=>'true']) !!}
                                        <h3 class="sbold">Resim Yüklemek için Tıklayın veya Sürükleyip Bırakın.</h3>

                                        <input type="hidden" name="reklamId" value="{{$reklam->id}}" >

                                        {!! Form::close() !!}
                                    </div>
                                    <div id="tab_2-2" class="tab-pane">
                                        {!! Form::open(['route'=>'sirketBilgileri.reklamVideo','method'=>'POST','class'=>'dropzone dropzone-file-area','id'=>'my-dropzone',
                                         'style'=>'width:900px; height:400px; margin-top:10px;','files'=>'true','multiple'=>'true']) !!}
                                        <h3 class="sbold">Video Yüklemek için Tıklayın veya Sürükleyip Bırakın.</h3>

                                        <input type="hidden" name="reklamId" value="{{$reklam->id}}" >

                                        {!! Form::close() !!}
                                    </div>
                                    <div id="tab_3-3" class="tab-pane ">
                                        {!! Form::open(['route'=>'sirketBilgileri.reklamDokuman','method'=>'POST','class'=>'dropzone dropzone-file-area','id'=>'my-dropzone',
                                          'style'=>'width:900px; height:400px; margin-top:10px;','files'=>'true','multiple'=>'true']) !!}
                                        <h3 class="sbold">Döküman Yüklemek için Tıklayın veya Sürükleyip Bırakın.</h3>

                                        <input type="hidden" name="reklamId" value="{{$reklam->id}}" >

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <div class="tab-pane " id="tab_1_6">
                        <div class="row profile-account">
                            <div class="col-md-3">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active">
                                        <a data-toggle="tab" href="#tab_1-1">
                                            <i class="fa fa-file-archive-o"></i> Reklam İçerik</a>
                                        <span class="after"> </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div id="tab_1-1" class="tab-pane active ">
                                        <form method="POST" action="{{route('sirketBilgileri.reklamAciklama',$reklam->id)}}" role="form">
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control input-circle" rows="15" name="aciklama" value="{{old('aciklama')}}" >{{$reklam->aciklama}}</textarea>
                                                </div>
                                            </div>
                                            <br/>

                                            <div class="margin-top-10">
                                                <button type="submit" class="btn blue btn-circle btn-outline"><span class="fa fa-save"> Kaydet</span></button>
                                                <a href="javascript:;" class="btn yellow btn-outline btn-circle"> İptal </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-md-9-->
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('css')
    <link href="/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
@endsection()

@section('js')
    <script src="/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
    <script src="/admin/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script src="/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>
@endsection()

