<?php // IDEA:
require_once("./config/db.class.php");

class Personnel{
    public $MaNV;
    public $TenNV;
    public $Phai;
    public $NoiSinh;
    public $MaPhong;
    public $Luong;

    public function __construct($MaNV, $TenNV, $Phai, $NoiSinh, $MaPhong, $Luong) {
        $this->MaNV = $MaNV;
        $this->TenNV = $TenNV;   
        $this->Phai = $Phai;
        $this->NoiSinh = $NoiSinh;
        $this->MaPhong = $MaPhong;
        $this->Luong = $Luong;
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO nhanvien(MaNV, TenNV, Phai, NoiSinh, MaPhong, Luong) VALUES
        ('$this->MaNV', '$this->TenNV', '$this->Phai', '$this->NoiSinh', '$this->MaPhong', '$this->Luong' )";
        $result = $db->query_excute($sql);
        return $result;
    }

    public static function list_personnel(){
        $db = new Db();
        $sql = "SELECT * FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result;
    }
}

?>