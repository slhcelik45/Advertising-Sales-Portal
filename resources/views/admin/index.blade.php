@extends('admin.template')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-tv"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1209">0</span>
                        </div>
                        <div class="desc"> TV</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-signal"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="1453">0</span>
                        </div>
                        <div class="desc"> WEB</div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-signal"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="2976">0</span>
                        </div>
                        <div class="desc"> RADYO</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-try"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="3456"></span> <i class="fa fa-try"></i></div>
                        <div class="desc"> Toplam</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Haftalık</span>
                            <span class="caption-helper">haftalık istatislikler...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_statistics_loading">
                            <img src="/admin/assets/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_statistics_content" class="display-none">
                            <div id="site_statistics" class="chart"> </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <div class="col-lg-6 col-xs-12 col-sm-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-dark bold uppercase">Gelirler</span>
                            <span class="caption-helper">aylık istatislikler...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_activities_loading">
                            <img src="/admin/assets/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_activities_content" class="display-none">
                            <div id="site_activities" style="height: 228px;"> </div>
                        </div>
                        <div style="margin: 20px 0 10px 30px">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-success"> Gelir</span>
                                    <h3>1234<i class="fa fa-try"></i></h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-info"> Vergi</span>
                                    <h3>134,900 <i class="fa fa-try"></i></h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-danger"> TV</span>
                                    <h3>2906 <i class="fa fa-try"></i></h3>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                    <span class="label label-warning"> Radyo</span>
                                    <h3>235090 <i class="fa fa-try"></i></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
@endsection()

@section('css')
@endsection()

@section('js')
@endsection()

