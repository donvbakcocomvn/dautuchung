<?php

namespace Model\Users;

use PFBC\Element;
use Model\FormRender;
use PFBC\Element\Hidden;
use PFBC\Element\Textbox;

class FormUserInfor implements IFormUserInfor
{

    static $properties = ["class" => "form-control"];
    static $ElementsName = "UsersInfor";
    static $FormData = [];
    public function __construct($formData = null)
    {
        self::$FormData  = $formData;
    }
    static public function GetFormData($name = "FormDataBenhNhan")
    {
        return self::$FormData[$name] ?? [];
    }
    public static function Phone($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function CongTy($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        $options = \Model\OptionsService::GetGroupsToSelect("congty");
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }

        return new FormRender(new Element\Select("Công Ty", $name, $options, $properties));
    }

    public static function SetName($name)
    {
        return self::$ElementsName . "[" . $name . "]";
    }

    public static function HopDong($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        $options = \Model\OptionsService::GetGroupsToSelect("hopdong");
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        return new FormRender(new Element\Select("Loại Hợp Đồng", $name, $options, $properties));
    }

    /**
     * Giới tính
     * @param {type} parameter
     */
    public static function GioiTinh($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        $options = \Model\OptionsService::GetGroupsToSelect("gioitinh");
        $properties[FormRender::Disabled] = true;
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        return new FormRender(new Element\Select("Giới Tính", $name, $options, $properties));
    }

    /**
     * Chứng minh nhân dan
     * @param {type} parameter
     */
    public static function CCCD($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);

        return new FormRender(new Element\Textbox("CCCD", $name, $properties));
    }
    public static function DiaChi($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Số Nhà, Đường", $name, $properties));
    }
    public static  function TinhThanh($val = null, $id = "TinhThanh", $taget = "#QuanHuyen")
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["id"] = $id;
        $properties["class"] = FormRender::TinhThanhClass . " form-control saveinfor";
        $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["data-target"] = $taget;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Tỉnh Thành", $name, [],  $properties));
    }
    public static function QuanHuyen($val = null, $id = "QuanHuyen", $taget = "#PhuongXa")
    {
        $properties = self::$properties;
        $properties["value"] =  $val;
        $properties["id"] = $id;
        $properties["class"] = FormRender::QuanHuyenClass . " form-control saveinfor";
        $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["data-target"] = $taget;
        $properties["data-tinhthanh"] = FormRender::GetValue(null, "TinhThanh", self::GetFormData());
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Quận Huyện", $name, [],  $properties));
    }
    public static function PhuongXa($val = null, $id = "PhuongXa")
    {
        $properties = self::$properties;
        $properties["value"] =  $val;
        $properties["id"] = $id;
        $properties["class"] = FormRender::PhuongXaClass . " form-control";
        $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["data-tinhthanh"] = FormRender::GetValue(null, "TinhThanh", self::GetFormData());
        $properties["data-quanhuyen"] = FormRender::GetValue(null, "QuanHuyen", self::GetFormData());
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Phường xã", $name, [],  $properties));
    }
    public static function NgayVaoLam($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "date";
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Ngày Vào Làm", $name, $properties));
    }

    public static function NgayNghiViec($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "date";
        $name = self::SetName(__FUNCTION__);

        return new FormRender(new Element\Textbox("Ngày Nghỉ Việc", $name, $properties));
    }

    public static function SoHopDong($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        return new FormRender(new Element\Textbox("Số Hợp Đồng", $name, $properties));
    }

    public static function NgayKyHopDong($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "date";
        $name = self::SetName(__FUNCTION__);
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }

        return new FormRender(new Element\Textbox("Ngày Ký Hợp Đồng", $name, $properties));
    }

    public static function ThoiHangHopDong($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        $options = \Model\OptionsService::GetGroupsToSelect("hinhthuchd");
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }

        return new FormRender(new Element\Select("Hình Thức Hợp Đồng", $name, $options, $properties));
    }

    public static function TinhTrangHD($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        $options = \Model\OptionsService::GetGroupsToSelect("tinhtrang");
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        return new FormRender(new Element\Select("Tình Trạng Hợp Đồng", $name, $options, $properties));
    }

    public static function CMND($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);

        return new FormRender(new Element\Textbox("CMND", $name, $properties));
    }

    public static function HoChieu($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Hộ Chiếu", $name, $properties));
    }

    public static function HinhNhanVien($val = null)
    {
        $properties = self::$properties;
        $properties["id"] = "idHinhNhanVien";
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Hidden($name, $val, $properties));
    }
    public static function HinhMatTruocCMND($val = null)
    {
        $properties = self::$properties;
        $properties["id"] = "idHinhMatTruocCMND";
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Hidden($name, $val, $properties));
    }
    public static function HinhMatSauCMND($val = null)
    {
        $properties = self::$properties;
        $properties["id"] = "IdHinhMatSauCMND";
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Hidden($name, $val, $properties));
    }

    public static function MaNhanVien($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Disabled] = "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"])) {
            unset($properties[FormRender::Disabled]);
        }
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Mã Nhân Viên", $name, $properties));
    }
}
