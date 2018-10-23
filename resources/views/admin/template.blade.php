<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/admin/assets/pages/img/logo.png" />
    <title>Elegans Medya Reklam Yönetim Paneli</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

    <link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <link href="/admin/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/admin/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/admin/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="/admin/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="/admin/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
@yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{route('admin.index')}}">
                    <img src="/admin/assets/layouts/layout/img/logo.png"  alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" width="50" height="50"  src="/{{Auth::user()->avatar}}" />
                            <span class="username username-hide-on-mobile">{{Auth::user()->name}}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li hidden>
                                <a href="{{route('kullanici.profil',Auth::user()->id)}}">
                                    <i class="fa fa-user"></i> Profilim </a>
                            </li>
                            <li hidden>
                                <a href="{{route('kullanici.takvim',Auth::user()->id)}}">
                                    <i class="fa fa-calendar"></i> Takvimim </a>
                            </li>
                            <li hidden>
                                <a  href="app_inbox.html">
                                    <i class="fa fa-envelope-o"></i> Mesajlarım
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.cikis')}}">
                                    <i class="fa fa-key"></i> Çıkış </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    <li class="sidebar-search-wrapper">
                        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                        <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                        <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                        <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                            <a href="javascript:;" class="remove">
                                <i class="icon-close"></i>
                            </a>
                        </form>
                        <!-- END RESPONSIVE QUICK SEARCH FORM -->
                    </li>
                    <li class="nav-item start active open">
                        <a href="{{route('admin.index')}}" class="nav-link ">
                            <i class="glyphicon glyphicon-home"></i>
                            <span class="title"> Yönetim Paneli</span>
                        </a>
                    </li>
                    @if(Auth::user()->Rol()==8)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-tv"></i>
                            <span class="title">Reklam</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('reklamTipi.index')}}" class="nav-link ">
                                    <i class="fa fa-list-ol"></i>
                                    <span class="title"> Firmalarımız</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('kampanya.index')}}" class="nav-link ">
                                    <i class="fa fa-align-left"></i>
                                    <span class="title"> Reklam Kampanyaları</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('paketler.index')}}" class="nav-link ">
                                    <i class="fa fa-align-left"></i>
                                    <span class="title"> Reklam Paketleri</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('reklamKusagi.index')}}" class="nav-link ">
                                    <i class="fa fa-table"></i>
                                    <span class="title"> Reklam Kuşakları</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                        <li class="nav-item start active open ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-user-secret"></i>
                                <span class="title">Yönetim</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="{{route('roller.index')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title"> Roller</span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{route('sektorler.index')}}" class="nav-link ">
                                        <i class="fa fa-ship"></i>
                                        <span class="title"> Sektörler</span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{route('kullanici.index')}}" class="nav-link ">
                                        <i class="fa fa-users"></i>
                                        <span class="title"> Kullanıcılar</span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{route('ayarlar.index')}}" class="nav-link ">
                                        <i class="fa fa-cogs"></i>
                                        <span class="title"> Site Ayarları</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->Rol()==9)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-users"></i>
                            <span class="title">Saha Personeli</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('sirket.index')}}" class="nav-link ">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="title"> Şirketler</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('reklam.index')}}" class="nav-link ">
                                    <i class="fa fa-tasks"></i>
                                    <span class="title"> Reklamlar</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item start active open ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Kampanyalar</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="{{route('tv.spotReklamlar')}}" class="nav-link ">
                                        <i class="fa fa-tv"></i>
                                        <span class="title"> Kanal 23</span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{route('radyo.spotReklamlar')}}" class="nav-link ">
                                        <i class="fa fa-rss"></i>
                                        <span class="title"> Radyolar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->Rol()==1)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-tv"></i>
                            <span class="title">Kanal 23</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.index')}}" class="nav-link ">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="title"> Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.yayinda')}}" class="nav-link ">
                                    <i class="fa fa-feed"></i>
                                    <span class="title"> Yayındaki Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.create')}}" class="nav-link ">
                                    <i class="fa fa-archive"></i>
                                    <span class="title"> Veriler</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->Rol()==3)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-globe"></i>
                            <span class="title">WEB</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.index')}}" class="nav-link ">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="title"> Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.yayinda')}}" class="nav-link ">
                                    <i class="fa fa-feed"></i>
                                    <span class="title"> Yayındaki Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.create')}}" class="nav-link ">
                                    <i class="fa fa-archive"></i>
                                    <span class="title"> Veriler</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->Rol()==2)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-feed"></i>
                            <span class="title">RADYO</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.index')}}" class="nav-link ">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="title"> Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.yayinda')}}" class="nav-link ">
                                    <i class="fa fa-feed"></i>
                                    <span class="title"> Yayındaki Reklamlar</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('galeri.create')}}" class="nav-link ">
                                    <i class="fa fa-archive"></i>
                                    <span class="title"> Veriler</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->Rol()==7)
                    <li class="nav-item start active open ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-black-tie"></i>
                            <span class="title">Şirket</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start active open">
                                <a href="{{route('sirketBilgileri.create')}}" class="nav-link ">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span class="title"> Şirket Bilgileri</span>
                                </a>
                            </li>
                            <li class="nav-item start active open">
                                <a href="{{route('sirketBilgileri.index')}}" class="nav-link ">
                                    <i class="fa fa-feed"></i>
                                    <span class="title"> Reklam Bilgileri</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
        @yield('content')
        <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"><?php echo date("Y"); ?> &copy; Elegans Medya By
            <a target="_blank" href="#">Celik</a> &nbsp;|&nbsp;
            <a href="http://www.kanal23.com/" title="Kanal 23 Elegans Reklam " target="_blank">Kanal 23</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->

<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<script src="/admin/assets/global/plugins/respond.min.js"></script>
<script src="/admin/assets/global/plugins/excanvas.min.js"></script>
<script src="/admin/assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/admin/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>

<script src="/admin/assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/admin/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/admin/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="/admin/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="/admin/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="/admin/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>



@include('sweetalert::alert')
@yield('js')

@yield('script')
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $('#reklamTipiId').on('change',function (e) {
        console.log(e);
        var tipId=e.target.value;

        $.get('/yonetim/json-kusak?tipId='+ tipId,function (data) {
            console.log(data);
            $('#KampanyaID').empty();
            $('#KampanyaID').append('<option value="" selected="true">Kampanya Seçiniz</option>');

            $.each(data,function (index,reklamKusagiObj) {
                $('#KampanyaID').append('<option value="'+ reklamKusagiObj.id +'">'+ reklamKusagiObj.adi +'</option>');
            })
        });
    });

    $('#reklamKusagiId').on('change',function (e) {
        console.log(e);
        var KusakID=e.target.value;

        $.get('/yonetim/json-fiyat?KusakID='+ KusakID,function (data) {
            console.log(data);

            $.each(data,function (index,reklamKusagiObj) {
                $('#fiyat').val(reklamKusagiObj.fiyat);
                $('#fiyat').append('<input value="'+ reklamKusagiObj.fiyat+'" name="fiyat" id="fiyat" placeholder="'+ reklamKusagiObj.fiyat+'">');
            })
        });
    });

    $('#kampanyaId').on('change',function (e) {
        console.log(e);
        var tipId=e.target.value;

        $.get('/yonetim/json-reklamTip?tipId='+ tipId,function (data) {
            console.log(data);
            $('#kategoriId').empty();
            $('#kategoriId').append('<option value="" selected="true">Reklam Kategori Seçiniz</option>');

            $.each(data,function (index,reklamKusagiObj) {
                $('#kategoriId').append('<option value="'+ reklamKusagiObj.id +'">'+ reklamKusagiObj.adi +'</option>');
            })
        });
    });
    $('#reklamKampanyaId').on('change',function (e) {
        console.log(e);
        var firma=e.target.value;

        $.get('/yonetim/json-reklamKampanya?firmaId='+ firma,function (data) {
            console.log(data);
            $('#kampanyaId').empty();
            $('#kampanyaId').append('<option value="" selected="true">Reklam Kampanyaları Seçiniz</option>');

            $.each(data,function (index,reklamKusagiObj) {
                $('#kampanyaId').append('<option value="'+ reklamKusagiObj.id +'">'+ reklamKusagiObj.adi +'</option>');
            })
        });
    });
</script>
</body>
</html>