<?php

namespace Module\dautuchung\Model;

use PFBC\Element;
use Model\FormRender;
use Model\OptionsService;
use Module\baiviet\Model\Options\Options;
use PFBC\Element\Hidden;
use PFBC\Element\Textbox;

class DuAnForm
{

    static $properties = [
        "class" => "form-control",
        "oninput" => "this.setCustomValidity('')"
    ];
    static $ElementsName = "DuAnForm";
    static $FormData = [];
    public function __construct($formData = null)
    {
        self::$FormData  = $formData;
    }
    static public function GetFormData($name = "DuAnForm")
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

    public static function SetName($name)
    {
        return self::$ElementsName . "[" . $name . "]";
    }

    public static function Name($val = null)
    {

        $properties = self::$properties;
        $properties[FormRender::onInvalid] = FormRender::setinvalid("Bạn chưa nhập tên dự án");

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties[FormRender::Required] = "true";
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Tên dự án", $name, $properties));
    }
    public static function MoTa($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties[FormRender::onInvalid] = FormRender::setinvalid("Bạn chưa nhập mô tả");
        $properties["id"] = "id" . __FUNCTION__;
        $properties["class"] = "editor";
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textarea("Mô tả dự án", $name, $properties));
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
        $properties[FormRender::Required] = "true";
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
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Phường xã", $name, [],  $properties));
    }
    public static function GiaTriDuAn($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Tổng Giá Trị Dự Án", $name, $properties));
    }
    public static function DienTich($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Diện Tích(m2)", $name, $properties));
    }
    public static function DienTichHa($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Diện Tích(ha)", $name, $properties));
    }
    public static function LoaiHinhDuAn($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        $options = OptionsService::GetGroupsToSelect("loaihinhduan");
        return new FormRender(new Element\Select("Loại Hình", $name, $options, $properties));
    }
    public static function ChieuNgang($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Chiều Ngang (m)", $name, $properties));
    }
    public static function SoPhongNgu($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Số Phòng Ngủ", $name, $properties));
    }
    public static function SoPhongVeSinh($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Số Phòng Ngủ", $name, $properties));
    }
    public static function ChieuDoc($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Chiều Dọc (m)", $name, $properties));
    }
    public static function ThoiGianBatDau($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["type"] = "date";
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Thời Gian Bắt Đầu", $name, $properties));
    }
    public static function ThoiGianDauTu($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("THỜI GIAN ĐẦU TƯ (Tháng)", $name, $properties));
    }
    public static function LaiXuatCoBan($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("LÃI SUẤT CƠ BẢN (%/năm)", $name, $properties));
    }
    public static function XuatThamGia($val = null)
    {
        $properties = self::$properties;

        $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
        $properties["type"] = "number";
        $properties["min"] = "0";
        $properties[FormRender::onInvalid] = FormRender::setinvalid("Số gói không hợp lệ lớn hơn 0");
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Số gói đầu tư", $name, $properties));
    }
}
