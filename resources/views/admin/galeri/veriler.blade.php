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
                            <span class="caption-subject bold uppercase"> Reklamlam Dökümanları</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="3%">#</th>
                                <th width="25%">Şirket Adı</th>
                                <th>Veriler</th>
                                <th width="3%">Yükleme Tarihi</th>
                                <th width="2%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($veriler as $reklam)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$reklam->id}}</span></td>
                                    <td>
                                        {{$reklam->Reklamlar->Sirketler->adi}}
                                    </td>
                                    <td>{{$reklam->url}}</td>
                                    <td>{{$reklam->updated_at}}</td>
                                    <td>
                                        <a href="{{route('galeri.show',$reklam->id)}}" class="btn red btn-outline btn-circle btn-xs">
                                            <span class="fa fa-download"> İndir</span>
                                        </a>
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

