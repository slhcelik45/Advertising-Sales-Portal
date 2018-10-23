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
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="5%"> Logo </th>
                                <th width="20%"> Sektör </th>
                                <th width="10"> Adı </th>
                                <th width="15%"> E-mail </th>
                                <th width="10%"> Telefon </th>
                                <th width="20%"> Adres </th>
                                <th width="2%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sirket as $s)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$s->id}}</span></td>
                                    <td>
                                        <img border="0" width="40" height="40" src="/{{$s->logo}}">
                                    </td>
                                    <td>{{$s->SektorBul->adi}}</td>
                                    <td>{{$s->adi}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>{{$s->tel}}</td>
                                    <td>{{$s->adres}}</td>
                                    <td>
                                        <a href="{{route('sirketBilgileri.show',$s->id)}}" class="btn green-jungle btn-outline btn-circle btn-xs">
                                            <span class="fa fa-edit"></span> Güncelle</a>
                                    </td>
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

