<?php

session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
define("DEFAULT_ACTION", "index");
define("DEFAULT_CONTROLLER", "index");
spl_autoload_register(function ($className) {
    $className = str_replace("\\", "/", $className);
    $className = str_replace("_", "/", $className);
    $className = __DIR__ . "/{$className}.php";
    if (file_exists($className)) {
        include_once $className;
    }
});
define("prefixTable", "lap1_");
define("QuanLy", "quanly");
define("LoginPage", "/login");
global $INI;
if (FALSE) {
    $INI['host'] = "localhost";
    $INI['username'] = "jagudavthosting_si";
    $INI['password'] = "zaq@123Abc456";
    $INI['DBname'] = "jagudavthosting_si";
} else {
    $INI['host'] = "localhost";
    $INI['username'] = "root";
    $INI['password'] = "";
    $INI['DBname'] = "dautuchung";
}

//#mbne6Y3&foG
