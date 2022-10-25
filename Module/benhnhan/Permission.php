<?php

namespace Module\benhnhan;

use Model\Role;

class Permission
{
    //put your code here
    const QLT_BenhNhan_DS = "QLT_BenhNhan_View";
    const QLT_BenhNhan_Post = "QLT_BenhNhan_Post";
    const QLT_BenhNhan_Put = "QLT_BenhNhan_Put";
    const QLT_BenhNhan_Delete = "QLT_BenhNhan_Delete";
    const QLT_BenhNhan_Detail = "QLT_BenhNhan_Detail";

    public function __construct()
    {
    }

    public static function DanhSachQuyen()
    {
        return [
            self::QLT_BenhNhan_DS => [
                "Id" => self::QLT_BenhNhan_DS,
                "Name" => "Danh Sách Bệnh Nhân",
                "Des" => "Danh Sách Bệnh Nhân",
                "IsNotDelete" => 0,
            ],
            self::QLT_BenhNhan_Detail => [
                "Id" => self::QLT_BenhNhan_Detail,
                "Name" => "Danh Sách Chi Tiết Bệnh Nhân",
                "Des" => "Danh Sách Chi Tiết Bệnh Nhân",
                "IsNotDelete" => 0,
            ],
            self::QLT_BenhNhan_Post => [
                "Id" => self::QLT_BenhNhan_Post,
                "Name" => "Thêm Bệnh Nhân",
                "Des" => "Thêm Bệnh Nhân",
                "IsNotDelete" => 0,
            ],
            self::QLT_BenhNhan_Put => [
                "Id" => self::QLT_BenhNhan_Put,
                "Name" => "Sửa Bệnh Nhân",
                "Des" => "Sửa Bệnh Nhân",
                "IsNotDelete" => 0,
            ],
            self::QLT_BenhNhan_Delete => [
                "Id" => self::QLT_BenhNhan_Delete,
                "Name" => "Xoá Bệnh Nhân",
                "Des" => "Xoá Bệnh Nhân",
                "IsNotDelete" => 0,
            ],
        ];
    }

    public static function install()
    {
        $dsRole = self::DanhSachQuyen();

        $modelRole = new Role();
        foreach ($dsRole as $role) {
            // var_dump($role);
            if ($modelRole->GetById($role["Id"])==null) {
                $modelRole->Post($role);
            }
        }
    }
    public static function uninstall()
    {
        $dsRole = self::DanhSachQuyen();
        $modelRole = new Role();
        foreach ($dsRole as $role) {
            $modelRole->Delete($role["Id"]);
        }
    }

    

}
