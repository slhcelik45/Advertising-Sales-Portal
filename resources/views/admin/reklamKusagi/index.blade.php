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
                            <span class="caption-subject bold uppercase"> Reklma Kuşağı Yönetimi</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('reklamKusagi.create')}}" class="btn blue btn-outline btn-circle">Reklam Kuşağı Ekle <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="3%"> Firma</th>
                                <th width="15%">Kategori</th>
                                <th width="16%">Başlık</th>
                                <th width="1%">Süre</th>
                                <th width="2%">Spot</th>
                                <th width="1%">Fiyat</th>
                                <th>Açıklama</th>
                                <th width="2%">Düzenle</th>
                                <th width="2%">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reklamKusagi as $kusak)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$kusak->id}}</span></td>
                                    <td>
                                        {{$kusak->ReklamTipi->adi}}
                                    </td>
                                    <td>{{$kusak->Paketler->adi}}</td>
                                    <td>{{$kusak->baslik}}</td>
                                    <td>{{$kusak->sure}}</td>
                                    <td>{{$kusak->gunlukSpot}}</td>
                                    <td>{{$kusak->fiyat}}</td>
                                    <td>{{$kusak->aciklama}}</td>
                                    <td>
                                        <a href="{{route('reklamKusagi.edit',$kusak->id)}}" class="btn green-jungle btn-outline btn-circle btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Düzenle</a>
                                    </td>
                                    {!! Form::model($kusak,['route'=>['reklamKusagi.destroy',$kusak->id],'method'=>'DELETE']) !!}
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

