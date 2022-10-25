<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Đăng ký</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/public/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/public/admin/plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="login-logo">
            <a href="#"><b>Share </b>Investment</a>
        </div>
        <div class="register-box-body">
            <h3 class="text-center">Đăng Ký</h3>
            <p class="login-box-msg">Đăng ký tài khoản để bắt đầu vào hệ thống</p>
            <form action="../../index.html" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Họ & Tên">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Tôi đồng ý với <a href="#">điều khoản</a> của trang web
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Ký</button>
                    </div>
                </div>
            </form>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng ký với tài khoản Facebook </a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng ký với tài khoản Google+</a>
            </div>
            <a href="/?page=login" class="text-center">Tôi đã có tài khoản</a>
        </div>
    </div>
    <script src="/public/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/public/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/admin/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>