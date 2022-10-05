<section class="content-header">
    <h1>
        Dashboard
        <small>Các khoản đầu tư</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/"><i class="fa fa-list"></i> Các khoản đầu tư</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <?php
        for ($i = 0; $i < 6; $i++) {
        ?>
            <div class="col-md-4">
                <div class="box box-widget widget-user-2">
                    <div class="widget-user-header bg-blue">
                        <div class="widget-user-image">
                            <img class="img-circle" src="/public/no-img.jpg" alt="User Avatar">
                        </div>
                        <h3 class="widget-user-username">Đất nền Lô 1099 1000m2</h3>
                        <h5 class="widget-user-desc">Dự án đát nền tây ninh</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">Loại Dự Án <span class="pull-right badge bg-blue">Đất nền</span></a></li>
                            <li><a href="#">Xuất tham gia <span class="pull-right badge bg-aqua">5</span></a></li>
                            <li><a href="#">Đã tham gia <span class="pull-right badge bg-green">4</span></a></li>
                            <li><a href="#">Tổng vốn <span class="pull-right badge bg-red">25,000,000,000</span></a></li>
                        </ul>
                    </div>
                </div><!-- /.widget-user -->
            </div><!-- /.col -->
        <?php
        }
        ?>
    </div>
    <ul class="pagination">
        <li><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</section><!-- /.content -->