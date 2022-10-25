<?php

namespace Module\dautuchung\Model;

use Model\Common;

class DuAn extends \Model\DB implements \Model\IModelService
{

    public $Id;
    public $Name;
    public $XuatThamGia;
    public $LaiXuatCoBan;
    public $ThoiGianDauTu;
    public $ThoiGianBatDau;
    public $ChieuDoc;
    public $SoPhongVeSinh;
    public $SoPhongNgu;
    public $ChieuNgang;
    public $LoaiHinhDuAn;
    public $LoaiVatNuoi;
    public $LoaiCayTrong;
    public $DienTichHa;
    public $DienTich;
    public $GiaTriDuAn;
    public $TinhThanh;
    public $QuanHuyen;
    public $PhuongXa;
    public $DiaChi;
    public $MoTa;
    public $Phone;
    public $TrangThai;
    public $CreateRecord;
    public $UpdateRecord;

    public function __construct($bn = null)
    {
        self::$TableName = prefixTable . "duan";
        parent::__construct();
        if ($bn) {
            if (!is_array($bn)) {
                $id = $bn;
                $bn = $this->GetById($id);
            }
        }
        $this->Id = $bn["Id"] ?? null;
        $this->Name = $bn["Name"] ?? null;
        $this->XuatThamGia = $bn["XuatThamGia"] ?? null;
        $this->LaiXuatCoBan = $bn["LaiXuatCoBan"] ?? null;
        $this->ThoiGianDauTu = $bn["ThoiGianDauTu"] ?? null;
        $this->ThoiGianBatDau = $bn["ThoiGianBatDau"] ?? null;
        $this->ChieuDoc = $bn["ChieuDoc"] ?? null;
        $this->LoaiVatNuoi = $bn["LoaiVatNuoi"] ?? null;
        $this->LoaiCayTrong = $bn["LoaiCayTrong"] ?? null;
        $this->SoPhongVeSinh = $bn["SoPhongVeSinh"] ?? null;
        $this->SoPhongNgu = $bn["SoPhongNgu"] ?? null;
        $this->ChieuNgang = $bn["ChieuNgang"] ?? null;
        $this->LoaiHinhDuAn = $bn["LoaiHinhDuAn"] ?? null;
        $this->DienTichHa = $bn["DienTichHa"] ?? null;
        $this->DienTich = $bn["DienTich"] ?? null;
        $this->GiaTriDuAn = $bn["GiaTriDuAn"] ?? null;
        $this->TinhThanh = $bn["TinhThanh"] ?? null;
        $this->QuanHuyen = $bn["QuanHuyen"] ?? null;
        $this->PhuongXa = $bn["PhuongXa"] ?? null;
        $this->DiaChi = $bn["DiaChi"] ?? null;
        $this->MoTa = $bn["MoTa"] ?? null;
        $this->Phone = $bn["Phone"] ?? null;
        $this->TrangThai = $bn["TrangThai"] ?? null;
        $this->CreateRecord = $bn["CreateRecord"] ?? null;
        $this->UpdateRecord = $bn["UpdateRecord"] ?? null;
    }

    function Post($model)
    {
        return $this->Insert($model);
    }
    function Put($model)
    {
        $where = "`Id` = '{$model["Id"]}'";
        return $this->Update($model, $where);
    }
    function Delete($Id)
    {
        $this->DeleteById($Id);
    }
    function GetById($Id)
    {
        return $this->SelectById($Id);
    }
    function GetItems($where, $indexPage, $pageNumber, &$total)
    {
        $where = "1=1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }
    public function GiaTriDuAn()
    {
        return Common::ViewPrice($this->GiaTriDuAn);
    }
    public function LinkEdit($class = "btn btn-primary")
    {

        if (\Model\Permission::CheckPremision(
            [\Model\User::Admin,  "DauTuChung_Project_MyProject_Edit"]
        ) == false) {
            return;
        }
        return '<a class="' . $class . '" href="/dautuchung/duan/put/' . $this->Id . '/">Sửa</a>';
    }
}
