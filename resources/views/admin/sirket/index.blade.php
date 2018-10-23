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
                            <span class="caption-subject bold uppercase"> Şirket Yönetimi</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('sirket.create')}}" class="btn blue btn-outline btn-circle">Şirket Ekle <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="10%"> Logo </th>
                                <th width="20%"> Sektör </th>
                                <th width="10%"> Adı </th>
                                <th> E-mail </th>
                                <th> Telefon </th>
                                <th> Adres </th>
                                <th width="2%">Düzenle</th>
                                <th width="2%"> Silme </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sirketler as $s)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$s->id}}</span></td>
                                    <td>
                                        <img border="0" width="90" height="50" src="/{{$s->logo}}">
                                    </td>
                                    <td>{{$s->SektorBul->adi}}</td>
                                    <td>{{$s->adi}}</td>
                                    <td width="15%">{{$s->email}}</td>
                                    <td width="7%">{{$s->tel}}</td>
                                    <td>{{$s->adres}}</td>
                                    <td>
                                        <a href="{{route('sirket.edit',$s->id)}}" class="btn green-jungle btn-circle btn-outline btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Düzenle</a>
                                    </td>
                                    {!! Form::model($s,['route'=>['sirket.destroy',$s->id],'method'=>'DELETE']) !!}
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

