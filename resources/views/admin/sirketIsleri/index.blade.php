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
                            <span class="caption-subject bold uppercase"> Reklamalar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="1%">#</th>
                                <th width="17%">Adı</th>
                                <th width="3%"> Firma</th>
                                <th width="3%">Fiyat</th>
                                <th width="3%">Yayında Mı?</th>
                                <th width="7%">Başlangıç </th>
                                <th width="9%">Bitiş </th>
                                <th width="30%">Aciklama</th>
                                <th width="7%">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reklamlar as $reklam)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$reklam->id}}</span></td>
                                    <td>{{$reklam->adi}}</td>
                                    <td>
                                        {{$reklam->ReklamTipleri->adi}}
                                    </td>
                                    <td>{{$reklam->fiyat}}</td>
                                    <td>
                                        @if($reklam->yayinda==0)
                                            <span class="badge badge-danger">Hazırlanıyor</span>
                                         @else
                                            <span class="badge badge-success">Yayında</span>

                                        @endif
                                    </td>
                                    <td>{{$reklam->baslangicTarih}}</td>
                                    <td>{{$reklam->bitisTarih}}</td>
                                    <td>{!! $reklam->aciklama !!}</td>
                                    <td>
                                        <a href="{{route('sirketBilgileri.edit',$reklam->id)}}" class="btn red-thunderbird btn-outline btn-circle btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Dökümanları Giriniz</a>
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

