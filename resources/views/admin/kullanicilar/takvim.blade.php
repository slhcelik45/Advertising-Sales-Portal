@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green sbold uppercase">Takvim</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                                <h3 class="event-form-title margin-bottom-20">Etiketler</h3>
                                <div id="external-events">
                                    <form class="inline-form">
                                        <input type="text" value="" class="form-control" placeholder="Etiket Başlık..." id="event_title" />
                                        <br/>
                                        <a href="javascript:;" id="event_add" class="btn green"> Etiket Ekle</a>
                                    </form>
                                    <hr/>
                                    <div id="event_box" class="margin-bottom-10"></div>
                                    <hr class="visible-xs" /> </div>
                                <!-- END DRAGGABLE EVENTS PORTLET-->
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <div id="calendar" class="has-toolbar"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('css')
    <link href="/admin/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
@endsection()

@section('js')
    <script src="/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/admin/assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
@endsection()

