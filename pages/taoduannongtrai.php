<?php
$duan = json_decode(file_get_contents("data/duan.json"));

?>

<section class="content-header">
    <h1>
        Dự án
        <small>Tạo dự án nông trại</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/"><i class="fa fa-list"></i> Tạo dự án nông trại</a></li>
    </ol>
</section>
<section class="content">
    <div class="container ">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Tạo dự án nông trại</h3>
            </div>
            <div class="box-body">
                <!-- Color Picker -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tên Dự Án </label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mô tả </label>
                        <textarea type="editor" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Chọn file </label>
                        <input type="file">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Giá Trị Dự Án (triệu) </label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend>Thông tin dự án</legend>
                        <div class=" ">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Diện Tích(ha) </label>
                                        <input type="num" class="form-control my-colorpicker1 colorpicker-element">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Loại hình chăn nuôi </label>
                                        <input type="num" class="form-control my-colorpicker1 colorpicker-element">
                                    </div>
                                </div> 
                            </div>

                        </div>
                    </fieldset>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>THỜI GIAN ĐẦU TƯ (Tháng) </label>
                        <input type="number" class="form-control my-colorpicker1 colorpicker-element">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>LÃI SUẤT CƠ BẢN (%/năm)</label>
                        <input type="number" class="form-control my-colorpicker1 colorpicker-element">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>XUẤT THAM GIA </label>
                        <input type="number" class="form-control my-colorpicker1 colorpicker-element">
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-success">Tạo Mới Dự Án</button>
            </div>
        </div>
    </div>
</section>