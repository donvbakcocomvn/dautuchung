<?php
namespace Module\quanlythuoc\Model\SanPham;
interface iFormSanPham {

    public function Id($val = null); 
    public function Idloaithuoc($val = null); 
    public function Name($val = null); 
    public function Namebietduoc($val = null); 
    public function Solo($val = null); 
    public function Gianhap($val = null); 
    public function Giaban($val = null); 
    public function DVT($val = null); 
    public function Ngaysx($val = null); 
    public function HSD($val = null); 
    public function Tacdung($val = null); 
    public function Cochetacdung($val = null); 
    public function Ghichu($val = null); 
    public function Soluong($val = null); 
    public function NhaSX($val = null); 
    public function NuocSX($val = null); 
    public function DVQuyDoi($val = null); 
    public function Lang($val = null);
    public function CachDung($val = null);
    public function Canhbao($val = null);
    public function SLXuat($val = null);
    public function SLNhap($val = null);
    public function SLHienTai($val = null);    
}
