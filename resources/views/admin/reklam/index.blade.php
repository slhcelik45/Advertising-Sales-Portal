@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Reklam Yönetimi</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('reklam.create')}}" class="btn blue btn-outline btn-circle">Reklam Ekle <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th width="20%">Adı</th>
                                <th width="15%">Şirket</th>
                                <th width="3%">Reklam Tipi</th>
                                <th width="7%">Başlangıç</th>
                                <th width="9%">Bitiş</th>
                                <th>Aciklama</th>
                                <th width="2%">Düzenle</th>
                                <th width="2%">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reklamlar as $reklam)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$reklam->id}}</span></td>
                                    <td>{{$reklam->adi}}</td>
                                    <td>
                                        {{$reklam->Sirketler->adi}}
                                    </td>
                                    <td>
                                        {{$reklam->ReklamTipleri->adi}}
                                    </td>
                                    <td>{{$reklam->baslangicTarih}}</td>
                                    <td>{{$reklam->bitisTarih}}</td>
                                    <td>{!!$reklam->aciklama!!}</td>
                                    <td>
                                        <a href="{{route('reklam.edit',$reklam->id)}}" class="btn green-jungle btn-outline btn-circle btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Düzenle</a>
                                    </td>
                                    {!! Form::model($reklam,['route'=>['reklam.destroy',$reklam->id],'method'=>'DELETE']) !!}
                                    <td class="center">
                                        <button type="submit" class="btn red btn-outline btn-circle btn-xs">
                                            <span class="fa fa-trash"></span> Sil</button>
                                    </td>
                                    {!! Form::close() !!}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>

@endsection()

@section('css')
    <link href="/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection()

@section('js')
    <script src="/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="/admin/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
@endsection()

