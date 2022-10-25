<?php

namespace Module\dautuchung\Controller;

use Model\Common;
use Module\dautuchung\Model\DuAn as ModelDuAn;
use Module\dautuchung\Model\DuAnForm;

class duan extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        new \Controller\backend();
        self::$_ViewTheme  = true;
    }

    public function index()
    {

        \Model\Permission::Check([\Model\User::Admin, "DauTuChung_Project_View"]);
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
    public function myproject()
    {

        \Model\Permission::Check([\Model\User::Admin, "DauTuChung_Project_MyProject"]);
        $modelDuAn = new \Module\dautuchung\Model\DuAn();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["CongTy"] = isset($_GET["CongTy"]) ? \Model\Common::TextInput($_GET["CongTy"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelDuAn->GetItems($params, $indexPage, $pageNumber, $total);
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
        if (isset($_POST[DuAnForm::$ElementsName])) {
            $data = $_POST[DuAnForm::$ElementsName];
            $data["DienTichHa"] = floatval($data["DienTichHa"] ?? "");
            $data["ChieuDoc"] = floatval($data["ChieuDoc"] ?? "");
            $data["SoPhongVeSinh"] = intval($data["SoPhongVeSinh"] ?? "");
            $data["SoPhongNgu"] = intval($data["SoPhongNgu"] ?? "");
            $data["ChieuNgang"] = floatval($data["ChieuNgang"] ?? "");
            $data["DienTich"] = floatval($data["DienTich"] ?? "");
            $data["GiaTriDuAn"] = floatval($data["GiaTriDuAn"] ?? "");


            $ModelDuAn = new ModelDuAn();
            $result = $ModelDuAn->Post($data);
            if ($result) {
                Common::ToUrl("/dautuchung/duan/put/" . $result->insert_id);
            }
        }
        $this->View([]);
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        if (isset($_POST[DuAnForm::$ElementsName])) {
            $data = $_POST[DuAnForm::$ElementsName];
            $data["DienTichHa"] = floatval($data["DienTichHa"] ?? "");
            $data["ChieuDoc"] = floatval($data["ChieuDoc"] ?? "");
            $data["SoPhongVeSinh"] = intval($data["SoPhongVeSinh"] ?? "");
            $data["SoPhongNgu"] = intval($data["SoPhongNgu"] ?? "");
            $data["ChieuNgang"] = floatval($data["ChieuNgang"] ?? "");
            $data["DienTich"] = floatval($data["DienTich"] ?? "");
            $data["GiaTriDuAn"] = floatval($data["GiaTriDuAn"] ?? "");
            $ModelDuAn = new ModelDuAn();
            $ModelDuAn->Put($data);
            Common::ToUrl("/dautuchung/duan/put/" . $data["Id"]);
        }
        $this->View(["Id" => $this->getParams(0)]);
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
