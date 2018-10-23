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
                            <span class="caption-subject bold uppercase"> Ayarlar Yönetimi</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('ayarlar.create')}}" class="btn blue btn-circle btn-outline btn-sm">Ayarlar Ekle <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th width="5%">Logo</th>
                                <th width="15%">Başlık</th>
                                <th width="10%">Email</th>
                                <th width="7%">Telefon</th>
                                <th width="7%">Fax</th>
                                <th width="5%">Facebook</th>
                                <th width="5%">Twitter</th>
                                <th width="5%">Instagram</th>
                                <th width="2%">Düzenle</th>
                                <th width="2%">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ayarlar as $ayar)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$ayar->id}}</span></td>
                                    <td>
                                        <img border="0" width="50" height="40" src="/{{$ayar->logo}}">
                                    </td>
                                    <td>{{$ayar->baslik}}</td>
                                    <td>{{$ayar->email}}</td>
                                    <td>{{$ayar->tel}}</td>
                                    <td>{{$ayar->fax}}</td>
                                    <td>{{$ayar->facebook}}</td>
                                    <td>{{$ayar->twitter}}</td>
                                    <td>{{$ayar->instagram}}</td>
                                    <td>
                                        <a href="{{route('ayarlar.edit',$ayar->id)}}" class="btn green-jungle btn-outline btn-circle btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Düzenle</a>
                                    </td>
                                    {!! Form::model($ayar,['route'=>['ayarlar.destroy',$ayar->id],'method'=>'DELETE']) !!}
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



