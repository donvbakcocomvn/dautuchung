<?php
$duan = json_decode(file_get_contents("data/duan.json"));

?>

<section class="content-header">
    <h1>
       Dự án
        <small>Danh sách dự án</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/"><i class="fa fa-list"></i> Danh sách dự án</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <?php
        foreach ($duan as $key => $value) {

        ?>
            <div class="col-md-4">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-light-blue" style="height: auto;padding: 0px;">
                        <div class="row">
                            <div class="col-xs-3">
                                <img  class="img img-responsive" src="<?php echo $value->HinhAnh ?>" alt="User Avatar">
                            </div>
                            <div class="col-xs-9">
                                <p class="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo $value->DiaChi ?>
                                </p>
                                <h3 style="margin: 0px;" class="">
                                    <?php echo $value->Ten ?>
                                </h3>
                                <p class=""><?php echo $value->GiaTriDuAn ?></p>
                                <p class="">
                                    Loại Dự Án <span class=" badge bg-blue"><?php echo $value->LoaiDuAn ?></span></a>
                                    Trạng thái <span class=" badge bg-blue"><?php echo $value->TrangThai ?></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $value->XuatThamGia ?></h5>
                                    <span class="description-text">Xuất tham gia</span>
                                </div>
                            </div>
                            <div class="col-xs-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $value->GiaTri1Xuat ?></h5>
                                    <span class="description-text">Giá trị <br> mỗi xuất</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $value->LaiXuatCoBan ?></h5>
                                    <span class="description-text">Lãi suất <br> cơ bản</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="description-block">
                                    <h5 class="description-header"><?php echo $value->ThoiGianDauTu ?></h5>
                                    <span class="description-text">Thời Gian <br> Đầu Tư</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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