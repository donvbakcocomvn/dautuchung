<?php

namespace Module\dautuchung\Controller;

class giaodich extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        new \Controller\backend();
        self::$_Theme = "backend";
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
        $this->View([]);
    }
    function post1()
    {
        $this->View([]);
    }
    function post2()
    {
        $this->View([]);
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        $this->View([]);
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
        $this->View([]);
    }
}
