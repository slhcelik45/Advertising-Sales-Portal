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
                            <span class="caption-subject bold uppercase"> Kullanıcı Yönetimi</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('kullanici.ekle')}}" class="btn blue btn-circle btn-outline btn-sm">Kullanıcı Ekle <i class="fa fa-plus"></i></a>
                                        <a href="{{route('sirketler.index')}}" style="margin-left: 10px" class="btn green-jungle btn-circle btn-outline btn-sm">Şirketler  <i class="fa fa-group"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="3%">Yetki</th>
                                <th width="7%">İsmi</th>
                                <th width="7%">E-mail</th>
                                <th width="3%">Avatar</th>
                                <th width="1%">Düzenle</th>
                                <th width="1%">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kullanicilar as $kullanici)
                                <tr class="odd gradeX">
                                    <td><span class="badge">{{$kullanici->id}}</span></td>
                                    <td>{{$kullanici->Roller->adi}}</td>
                                    <td>{{$kullanici->name}}</td>
                                    <td> {{$kullanici->email}}</td>
                                    <td>
                                        <img border="0" width="80" height="40" src="/{{$kullanici->avatar}}">
                                    </td>
                                    <td>
                                        <a href="{{route('kullanici.duzenle',$kullanici->id)}}" class="btn green-jungle btn-outline btn-circle btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span> Düzenle</a>
                                    </td>
                                    <form action="{{route('kullanici.sil',$kullanici->id)}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <td class="center">
                                            <button type="submit" class="btn red btn-outline btn-circle btn-xs">
                                            <span class="fa fa-trash"></span> Sil</button>
                                        </td>
                                    </form>
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



