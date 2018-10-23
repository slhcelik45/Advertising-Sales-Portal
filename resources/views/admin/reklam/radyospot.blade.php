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
                            <span class="caption-subject bold uppercase"><font color="#a52a2a">Radyolar Reklam Kuşağı</font></span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('radyo.radyoJingle')}}" class="btn green-jungle btn-outline btn-circle">Özel Reklamlar & Jingle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr class="active">
                                <th width="1%">#</th>
                                <th width="5%">Süre</th>
                                <th width="5%">Günlük Spot</th>
                                <th width="1%">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($radyoSpotlar as $key=> $reklam)
                                    <tr class="success">
                                        <td class="active"><span class="badge">{{$key+1}}</span></td>
                                        <td>{{$reklam->sure}}</td>
                                        <td>{{$reklam->gunlukSpot}} </td>
                                        <td>{{$reklam->fiyat}} <i class="fa fa-try"></i></td>
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

