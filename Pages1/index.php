<?php
$page = $_GET["page"] ?? "index";
$noLayout = ["login", "register"];
$_Content = "pages/{$page}.php";
if (!in_array($page, $noLayout)) {
    include "layout/layout.php";
} else {
    include "pages/{$page}.php";
}
