<?php

namespace Views\theme\backend2;

use Application;
use Model\User;
use Module\benhnhan\Permission as BenhnhanPermission;
use Module\donthuoc\Permission as DonthuocPermission;
use Module\khachhang\Permission as KhachhangPermission;
use Module\quanlysanpham\Model\btnHtml;
use Module\quanlythuoc\Permission;
use Module\toathuoc\Permission as ToathuocPermission;

class Functions
{

    function __construct()
    {
    }

    public static function head()
    {

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $hotlint_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/";
?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="canonical" href="<?php echo $actual_link; ?>">
        <link rel="alternate" hreflang="vi" href="<?php echo $actual_link; ?>">
        <meta http-equiv="x-dns-prefetch-control" content="on" />
        <meta name="Resource-type" content="Document" />
        <meta name="theme-color" content="#000" />
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <link rel="dns-prefetch" href="//www.facebook.com" />
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <title>Share Investment</title>
        <link rel=icon href=https://www.bakco.com.vn/wp-content/uploads/2017/10/cropped-bakco_favicon-1-32x32.png sizes=32x32>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <meta property="og:image" content="/public/Logo_full.png">
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:url" content="<?php echo $actual_link; ?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <link rel="shortcut icon" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/public/Logo_full.png">
        <link href="/public/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/public/admin_blue/css/application.min.css" rel="stylesheet">
        <link href="/public/admin_blue/css/Customer.css" rel="stylesheet">
        <script src="/public/admin_blue/lib/jquery/dist/jquery.min.js"></script>
        <script src="/public/Ang1/angular.min.js" type="text/javascript"></script>
        <script src="/public/Ang1/angular-sanitize.min.js" type="text/javascript"></script>
        <!-- <script src="/public/Ang1/angular-route.min.js" type="text/javascript"></script> -->

        <script src="/public/Ang1/App.js?v=<?php echo filemtime("public/Ang1/App.js"); ?>" type="text/javascript"></script>
    <?php
    }

    public static function js()
    {
    ?>

        <script src="/public/admin_blue/lib/jquery-pjax/jquery.pjax.js"></script>
        <script src="/public/admin_blue/lib/bootstrap-sass-official/assets/javascripts/bootstrap.js"></script>
        <script src="/public/admin_blue/lib/widgster/widgster.js"></script>
        <script src="/public/admin_blue/lib/underscore/underscore.js"></script>
        <script src="/public/admin_blue/js/app.js"></script>
        <script src="/public/admin_blue/js/settings.js"></script>
        <script src="/public/admin_blue/lib/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="/public/admin_blue/lib/jquery.sparkline/index.js"></script>
        <script src="/public/admin_blue/lib/backbone/backbone.js"></script>
        <script src="/public/admin_blue/lib/backbone.localStorage/backbone.localStorage-min.js"></script>
        <script src="/public/admin_blue/lib/d3/d3.min.js"></script>
        <script src="/public/admin_blue/lib/nvd3/nv.d3.min.js"></script>
        <script src="/public/admin_blue/js/index.js"></script>
        <!-- <script src="/public/admin_blue/js/chat.js"></script> -->
        <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
        <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="/public/plugins/select2/select2.full.js" type="text/javascript"></script>
        <script src="/public/admin_blue/lib/parsleyjs/dist/parsley.min.js"></script>
        <script src="/public/App.js?v=<?php echo filemtime("public/App.js"); ?>"></script>
        <script>
            $(function() {
                // function a() {
                //     $("#validation-form").parsley(),
                //         $(".widget").widgster()
                // }
                // a(), PjaxApp.onPageLoad(a)
                window.DEBUG = 0;
                window.localStorage.setItem("lb-errors", null);
            });
        </script>
    <?php
    }

    public static function aside()
    {
    ?>

        <div class="control-sidebar-bg "></div>
    <?php
    }

    public static function sidebar()
    {
    ?>
        <div class="logo">
            <h4><a href="/">Share <strong>Investment</strong></a></h4>
        </div>
        <nav id="sidebar" class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li>
                    <a href="/dautuchung/index/index/">
                        <i class="fa fa-angle-double-right"></i>
                        Các khoản đầu tư </a>
                </li>
                <li class="panel">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse1">
                        <i class="fa fa-angle-double-right"></i>
                        Dự Án
                    </a>
                    <ul id="forms-collapse1" class="panel-collapse collapse ">
                        <li><a href="/dautuchung/duan/myproject/"><i class="fa fa-angle-right"></i>Dự án của tôi</a></li>
                        <li><a href="/dautuchung/duan/index/"><i class="fa fa-angle-right"></i>Dự án </a></li>
                        <li><a href="/dautuchung/duan/post"><i class="fa fa-angle-right"></i>Tạo dự án đất nền </a></li>
                        <li><a href="/dautuchung/duan/post1"><i class="fa fa-angle-right"></i>Tạo dự án chung cư </a></li>
                        <li><a href="/dautuchung/duan/post2"><i class="fa fa-angle-right"></i>Tạo dự án nông trại </a></li>
                    </ul>
                </li>
                <li><a href="/dautuchung/giaodich/index/"><i class="fa fa-angle-double-right"></i> Ví và Giao dịch</a></li>

                <li class="panel">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse2">
                        <i class="fa fa-angle-double-right"></i>
                        Cài đặt
                    </a>
                    <ul id="forms-collapse2" class="panel-collapse collapse ">
                        <?php
                        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, md5(\Controller\quanlyusers::class . "_view")]) == true) {
                        ?>
                            <li class="<?php echo \Application::$_Controller == "quanlyusers" ? 'active' : '' ?>">
                                <a href="/quanlyusers/">
                                    <i class="fa fa-angle-right"></i> <span>Quản Lý Tài Khoản</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li><a href="/options/index/loaihinhduan/">
                                <i class="fa fa-angle-right"></i>Loại hình dự án
                            </a>
                        </li>
                        <li><a href="/options/index/LoaiCayTrong/">
                                <i class="fa fa-angle-right"></i>Loại cây trồng
                            </a>
                        </li>
                        <li><a href="/options/index/LoaiVatNuoi/">
                                <i class="fa fa-angle-right"></i>Loại vật nuôi
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="visible-xs">
                    <a href="/backend/logout"><i class="fa fa-sign-out"></i> <span class="name">Đăng Xuất</span></a>
                </li>
            </ul>
            <h5 class="hidden sidebar-nav-title">Labels <a class="action-link" href="#"><i class="glyphicon glyphicon-plus"></i></a></h5>
            <ul class="hidden sidebar-labels">
                <li>
                    <a href="#">
                        <i class="fa fa-circle text-warning"></i>
                        <span class="label-name">My Recent</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-circle text-gray"></i>
                        <span class="label-name">Starred</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-circle text-danger"></i>
                        <span class="label-name">Background</span>
                    </a>
                </li>
            </ul>
            <h5 class="hidden sidebar-nav-title">Dự án</h5>
            <div class="hidden sidebar-alerts">
                <div class="alert fade in">
                    <a href="#" target="_self" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Sales Report</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-gray-light" style="width: 16%"></div>
                    </div>
                    <small>Calculating x-axis bias... 65%</small>
                </div>
                <div class="alert fade in">
                    <a href="#" target="_self" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                    <span class="text-white fw-semi-bold">Personal Responsibility</span> <br>
                    <div class="progress progress-xs mt-xs mb-0">
                        <div class="progress-bar progress-bar-danger" style="width: 23%"></div>
                    </div>
                    <small>Provide required notes</small>
                </div>
            </div>
        </nav>
    <?php
    }
    public static function header()
    {
        $_module = Application::$_Module;
        $controller = Application::$_Controller;
        $action = Application::$_Action;
        $user = \Model\User::CurentUser();
    ?>
        <header class="page-header">
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="Messages" id="messages" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-comments"></i>
                        </a>
                        <ul id="messages-menu" class="dropdown-menu messages" role="menu">
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="/public/admin_blue/img/1.jpg" alt="">
                                    <div class="details">
                                        <div class="sender">Jane Hew</div>
                                        <div class="text">
                                            Hey, John! How is it going? ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="/public/admin_blue/img/2.jpg" alt="">
                                    <div class="details">
                                        <div class="sender">Alies Rumiancaŭ</div>
                                        <div class="text">
                                            I'll definitely buy this template
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="message">
                                    <img src="/public/admin_blue/img/3.jpg" alt="">
                                    <div class="details">
                                        <div class="sender">Michał Rumiancaŭ</div>
                                        <div class="text">
                                            Is it really Lore ipsum? Lore ...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all messages <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" title="8 support tickets" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-group"></i>
                            <span class="count">8</span>
                        </a>
                        <ul id="support-menu" class="dropdown-menu support" role="menu">
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-bell-o"></i></span>
                                    </div>
                                    <div class="details">
                                        Check out this awesome ticket
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-warning"><i class="fa fa-question-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        "What is the best way to get ...
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-success"><i class="fa fa-tag"></i></span>
                                    </div>
                                    <div class="details">
                                        This is just a simple notification
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-info"><i class="fa fa-info-circle"></i></span>
                                    </div>
                                    <div class="details">
                                        12 new orders has arrived today
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="support-ticket">
                                    <div class="picture">
                                        <span class="label label-important"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <div class="details">
                                        One more thing that just happened
                                    </div>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="text-align-center see-all">
                                    See all tickets <i class="fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="hidden-xs dropdown">
                        <a href="#" target="_self" title="Account" id="account" class="dropdown-toggle" data-toggle="dropdown">
                            <img style="height: 40px;border-radius: 100%;" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" alt="<?php echo $user->Name; ?>">
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <li role="presentation" class="account-picture">
                                <img src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" alt="<?php echo $user->Name; ?>">
                                <?php echo $user->Name; ?>
                            </li>
                            <li role="presentation">
                                <a href="/profile/" class="link">
                                    <i class="fa fa-user"></i>
                                    Tài khoản
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="/backend/logout/" class="link">
                                    <i class="fa fa-sign-out"></i>
                                    Đăng Xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="visible-xs">
                        <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>

                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
                <!-- <div class="notifications pull-right">
                    <div class="alert pull-right">
                        <a href="#" class="close ml-xs" data-dismiss="alert">&times;</a>
                        <i class="fa fa-info-circle mr-xs"></i> Check out Light Blue <a id="notification-link" href="#">settings</a> on the right!
                    </div>
                </div> -->
            </div>
        </header>

    <?php
    }
    public static function header1()
    {
        $user = \Model\User::CurentUser();
    ?>

        <header class=" main-header ">
            <!-- Logo -->
            <a href="/backend/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SI</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg" style="font-weight:500 ; font-size: 16px;">Share Investment</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav ">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #193a9dd1; color: #fff;">
                                <img onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $user->Name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $user->Name; ?> - <?php echo $user->Username; ?>
                                        <small><?php echo $user->BODView(); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer" style="background-color: #a3a1a19e;">
                                    <div class="pull-left">
                                        <a href="/profile" class="btn btn-primary btn-flat">Tài Khoản</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/backend/logout" class="btn btn-primary btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li class="hidden">
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <?php
    }

    public static function leftaside()
    {
        $user = User::CurentUser();
    ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class=" main-sidebar " style="border-left: 1px solid #d2d6de;">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img style="height: auto;min-height: 35px;" onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $user->Name ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <?php
                    if (\Model\Permission::CheckPremision([User::QuanLy, User::Admin], []) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Controller == "dashboard" ? 'active' : '' ?> treeview">
                            <a href="/backend/">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="<?php echo \Application::$_Controller == "dashboard" ? 'active' : '' ?> treeview">
                        <a href="/profile/">
                            <i class="fa fa-info-circle"></i> <span>Thông Tin</span>
                        </a>
                    </li>
                    <!-- <li class="<?php echo \Application::$_Controller == "dashboard" ? 'active' : '' ?> treeview">
                        <a href="/thongke/">
                            <i class="fa fa-bar-chart"></i> <span>Thống Kê</span>
                        </a>
                    </li> -->

                    <!-- Quản lý thuốc -->
                    <?php
                    if (\Model\Permission::CheckPremision([Permission::QLT_Thuoc_DS, Permission::QLT_DanhMuc_DS, Permission::QLT_Phieu_DS, User::Admin], []) == true) {
                    ?>
                        <li class="treeview <?php echo \Application::$_Module == "quanlythuoc" ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-medkit"></i>
                                <span>Quản lý thuốc &nbsp;<i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::Admin, User::QuanLy, Permission::QLT_Thuoc_Post, Permission::QLT_Thuoc_Put, Permission::QLT_Thuoc_Delete, Permission::QLT_Thuoc_DS, Permission::QLT_Thuoc_Detail,
                                    Permission::QLT_Thuoc_Export, Permission::QLT_Thuoc_Import
                                ], []) == true) {
                                ?>
                                    <li><a href="/quanlythuoc/sanpham/"><i class="fa fa-circle-o"></i>
                                            Thuốc
                                        </a></li>
                                <?php  } ?>
                                <?php
                                if (\Model\Permission::CheckPremision([User::Admin, User::QuanLy, Permission::QLT_DanhMuc_Post, Permission::QLT_DanhMuc_Put, Permission::QLT_DanhMuc_Delete, Permission::QLT_DanhMuc_DS], []) == true) {
                                ?>
                                    <li>
                                        <a href="/quanlythuoc/danhmuc/"><i class="fa fa-circle-o"></i>
                                            Danh Mục Thuốc
                                        </a>
                                    </li>
                                <?php  } ?>

                                <?php
                                if (\Model\Permission::CheckPremision([User::Admin, User::QuanLy,  Permission::QLT_Phieu_Post, Permission::QLT_Phieu_Put, Permission::QLT_Phieu_Delete, Permission::QLT_Phieu_DS, Permission::QLT_Phieu_Detail], []) == true) {
                                ?>
                                    <li><a href="/quanlythuoc/phieuxuatnhap/"><i class="fa fa-circle-o"></i>
                                            Xuất/Nhập Thuốc
                                        </a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <!-- Quản lý đơn thuốc -->
                    <?php
                    }
                    if (\Model\Permission::CheckPremision([User::Admin, User::QuanLy,  DonthuocPermission::QLT_DonThuoc_Post, DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Copy, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Export], []) == true) {
                    ?>
                        <li class="treeview <?php echo \Application::$_Module == "donthuoc" ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i>
                                <span class="text-capitalize">Quản lý đơn thuốc &nbsp;<i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize"><a href="/donthuoc/"><i class="fa fa-circle-o"></i>
                                            Danh sách đơn thuốc
                                        </a></li>
                                <?php  } ?>
                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize">
                                        <a href="/donthuoc/index/doncodinh"><i class="fa fa-circle-o"></i>
                                            Đơn lưu cố định
                                        </a>
                                    </li>
                                <?php  } ?>
                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize">
                                        <a href="/donthuoc/index/donthuoctrongngay/"><i class="fa fa-circle-o"></i>
                                            Đơn trong ngày
                                        </a>
                                    </li>
                                <?php  } ?>

                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize"><a href="/donthuoc/index/donchuaxuly/"><i class="fa fa-circle-o"></i>
                                            Đơn chưa lấy thuốc
                                        </a></li>
                                <?php  } ?>

                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize"><a href="/donthuoc/index/dondangxuly/"><i class="fa fa-circle-o"></i>
                                            Đơn đang lấy thuốc
                                        </a></li>
                                <?php  } ?>
                                <?php
                                if (\Model\Permission::CheckPremision([
                                    User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                                    DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                                ], []) == true) {
                                ?>
                                    <li class="text-capitalize"><a href="/donthuoc/index/dondaxuly/"><i class="fa fa-circle-o"></i>
                                            Đơn đã lấy thuốc
                                        </a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                    <?php
                    }
                    // ----------------------------
                    if (\Model\Permission::CheckPremision([User::QuanLy, User::Admin, BenhnhanPermission::QLT_BenhNhan_DS, BenhnhanPermission::QLT_BenhNhan_Post, BenhnhanPermission::QLT_BenhNhan_Delete, BenhnhanPermission::QLT_BenhNhan_Put, BenhnhanPermission::QLT_BenhNhan_Detail], []) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Module == "khachhang" ? 'active' : '' ?>">
                            <a href="/benhnhan/">
                                <i class="fa fa-user-plus"></i>
                                <span>Quản lý bệnh nhân</span>
                            </a>

                        </li>
                    <?php
                    }
                    // Thêm đơn thuốc
                    if (\Model\Permission::CheckPremision([
                        User::QuanLy, User::Admin, DonthuocPermission::QLT_DonThuoc_DS, DonthuocPermission::QLT_DonThuoc_Post,
                        DonthuocPermission::QLT_DonThuoc_Put, DonthuocPermission::QLT_DonThuoc_Detail, DonthuocPermission::QLT_DonThuoc_Delete, DonthuocPermission::QLT_DonThuoc_Export, DonthuocPermission::QLT_DonThuoc_Copy
                    ], []) == true) {
                    ?>
                        <li class="">
                            <a href="/donthuoc/index/post/?isnew=1">
                                <i class="fa fa-plus-square"></i>
                                <span>Thêm đơn thuốc</span>
                            </a>
                        </li>
                    <?php
                    }

                    // \Module\nhanvien\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_view"]) == true) {
                    ?>
                        <li class="hidden <?php echo \Application::$_Module == "quanlysanpham" ? 'active' : '' ?> treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Quản Lý Sản Phẩm</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                btnHtml::btnThemSanPham();
                                btnHtml::btnViewSanPham();
                                btnHtml::btnViewDanhMuc();
                                btnHtml::btnViewOptions();
                                ?>
                            </ul>
                        </li>
                    <?php
                    }

                    // \Module\congty\Functions::menulayout(\Application::$_Module);
                    // \Module\baocao\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, md5(\Controller\quanlyquyen::class . "_view")]) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Controller == "quanlyquyen" ? 'active' : '' ?> treeview">
                            <a href="/quanlyquyen/">
                                <i class="fa fa-magic"></i> <span>Quản Lý Quyền</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    // \Module\giaodien\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, md5(\Controller\quanlyusers::class . "_view")]) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Controller == "quanlyusers" ? 'active' : '' ?> treeview">
                            <a href="/quanlyusers/">
                                <i class="fa fa-users"></i> <span>Quản Lý Tài Khoản</span>
                            </a>
                        </li>
                    <?php
                    }

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy]) == true) {
                    ?>
                        <li class="treeview <?php echo (\Application::$_Controller == "options" || \Application::$_Controller == "locations") ? 'active' : "" ?> ">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Cài Đặt</span>
                                <!-- <span class="label label-primary pull-right">4</span> -->
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/locations/index"><i class="fa fa-circle-o"></i> Tỉnh/Thành phố</a></li>
                                <li><a href="/options/donvitinh/"><i class="fa fa-circle-o"></i> Đơn vị tính</a></li>
                                <!-- <li><a href="/options/congty/"><i class="fa fa-circle-o"></i> Công Ty</a></li>
                                <li><a href="/options/index/phongban/"><i class="fa fa-circle-o"></i> Phòng Ban</a></li>
                                <li><a href="/options/hopdong/"><i class="fa fa-circle-o"></i> Hợp Đồng</a></li>
                                <li><a href="/options/tinhtrang/"><i class="fa fa-circle-o"></i>Tinh trạng Hợp Đồng</a></li>
                                <li><a href="/options/hinhthuchd/"><i class="fa fa-circle-o"></i> Hình Thức Hợp Đồng</a></li> -->
                                <li><a href="/options/gioitinh/"><i class="fa fa-circle-o"></i> Giới tính</a></li>
                                <li><a href="/options/cachdungthuoc/"><i class="fa fa-circle-o"></i> Cách dùng thuốc</a></li>
                                <li><a href="/options/donviquydoi/"><i class="fa fa-circle-o"></i> Đơn vị quy đổi</a></li>
                                <li><a href="/options/optiondonthuoc/"><i class="fa fa-circle-o"></i> Cài đặt loại đơn </a></li>
                                <li><a href="/options/trangthai/"><i class="fa fa-circle-o"></i> Trạng thái đơn thuốc </a></li>
                                <!-- <li><a href="/options/chucvu/"><i class="fa fa-circle-o"></i> Chức Vụ</a></li>
                                <li><a href="/options/index/NameFunction/"><i class="fa fa-circle-o"></i> Module</a></li> -->
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="">
                        <a href="/backend/logout">
                            <i class="fa fa-sign-out"></i>
                            <span>Thoát</span>
                        </a>
                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    <?php
    }

    public static function footer()
    {
    ?>
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 0.0.01
                </div>
                <strong>Copyright &copy; 2022</strong>
            </div>
        </footer>
<?php
    }
}
