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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Các khoản đầu tư</h3>
                    <div class="box-tools">
                        <form action="">
                            <div class="input-group" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Dự án</th>
                                <th>Tổng Vốn</th>
                                <th>Số Tiền đã đầu tư</th>

                                <th>Lãi suất cơ bản</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <th style="width: 150px;">Ngày Bắt Đầu</th>
                                <th style="width: 250px;">Phân Phối Thu Nhập Tiếp Theo</th>
                                <th style="width: 150px;">Tổng Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                            ?>
                                <tr>
                                    <td>Đất nền Lô <?php echo $i + 1099; ?> 1000m<sup>2</sup> </td>
                                    <th>25,000,000,000 <sup>đ</sup></th>
                                    <th>5,000,000,000 <sup>đ</sup>
                                        | <?php echo (5 / 25) * 100 ?>%
                                    </th>
                                    <th><?php echo number_format((5000000000 * 0.01), 0, ",", "."); ?><sup>đ</sup> </th>
                                    <td><span class="label label-success">Đang chạy</span></td>
                                    <th><?php echo number_format((5000000000 + (5000000000 * 0.01)), 0, ",", "."); ?><sup>đ</sup> </th>
                                    <td>01-01-2022</td>
                                    <td>01-11-2022</td>
                                    <td>10 Tháng</td>
                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->