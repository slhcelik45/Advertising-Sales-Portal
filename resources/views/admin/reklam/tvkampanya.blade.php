@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"><font color="#00008b"> Kanal 23 Ekonomi Kampanya</font></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr class="active">
                                <th width="5%">Paket</th>
                                <th width="5%">Spot Sayısı</th>
                                <th width="1%">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tvKampanya as $x => $r)
                                    <tr class="success">
                                        @if($x==0)
                                            <td>TV</td>
                                         @else
                                            <td>RADYO</td>
                                        @endif
                                        <td>{{$r->gunlukSpot}} </td>
                                        @if($x==0)
                                            <td rowspan="{{count($tvKampanya)}}" style="vertical-align: middle" >{{$r->fiyat}} <i class="fa fa-try"></i></td>
                                         @endif
                                    </tr>
                                    @if($x==1) @break; @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"><font color="#ff4500">Kanal 23 Avantaj Kampanya</font></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr class="active">
                                <th width="5%">Paket</th>
                                <th width="5%">Spot Sayısı</th>
                                <th width="1%">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tvKampanyalar as $x => $r)
                                <tr class="warning">
                                    @if($x==0)
                                        <td>TV</td>
                                    @else
                                        <td>RADYO</td>
                                    @endif
                                    <td>{{$r->gunlukSpot}} </td>
                                    @if($x==0)
                                        <td rowspan="{{count($tvKampanyalar)}}" style="vertical-align: middle" >{{$r->fiyat}} <i class="fa fa-try"></i></td>
                                    @endif
                                </tr>
                                @if($x==1) @break; @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"><font color="#8b0000">Kanal 23 Elegance Kampanya</font></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr class="active">
                                <th width="5%">Paket</th>
                                <th width="5%">Spot Sayısı</th>
                                <th width="1%">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tvkampanya as $x => $r)
                                <tr class="danger">
                                    @if($x==0)
                                        <td>TV</td>
                                    @else
                                        <td>RADYO</td>
                                    @endif
                                    <td>{{$r->gunlukSpot}} </td>
                                    @if($x==0)
                                        <td rowspan="{{count($tvkampanya)}}" style="vertical-align: middle" >{{$r->fiyat}} <i class="fa fa-try"></i></td>
                                    @endif
                                </tr>
                                @if($x==1) @break; @endif
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

