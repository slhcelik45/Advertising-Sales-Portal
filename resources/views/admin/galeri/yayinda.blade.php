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
                            <span class="caption-subject bold uppercase"> Yayındaki Reklamlar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="15%">Şirket İsmi</th>
                                <th width="15%">Reklam Adı</th>
                                <th width="2%">Süre(Ay)</th>
                                <th width="2%">Spot</th>
                                <th width="2%">Fiyat</th>
                                <th width="3%">Başlangıç </th>
                                <th width="3%">Bitiş </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reklamlar as $reklam)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$reklam->id}}</span></td>
                                    <td>
                                        {{$reklam->Sirketler->adi}}
                                    </td>
                                    <td>{{$reklam->adi}}</td>
                                    <td>
                                        {{$reklam->ReklamKusagi->sure}}
                                    </td>
                                    <td>
                                        {{$reklam->ReklamKusagi->gunlukSpot}}
                                    </td>
                                    <td>
                                        {{$reklam->ReklamKusagi->fiyat}}
                                    </td>
                                    <td>{{$reklam->baslangicTarih}}</td>
                                    <td>{{$reklam->bitisTarih}}</td>
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

