<?php

namespace Module\dautuchung\Controller;

class index extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        new \Controller\backend();
        self::$_ViewTheme = true;
    }

    public function index()
    {

        \Model\Permission::Check([\Model\User::Admin, "CongTyView"]);
        $modelUsers = new \Model\UserService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["CongTy"] = isset($_GET["CongTy"]) ? \Model\Common::TextInput($_GET["CongTy"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }
    /**
     *
     * @return mixed
     */
    function post()
    {
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
    }
}
