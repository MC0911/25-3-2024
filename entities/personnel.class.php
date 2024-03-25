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

    public static function list_personnel($page, $per_page){
        $db = new Db();
        $start = ($page - 1) * $per_page;
        $sql = "SELECT * FROM nhanvien LIMIT $start, $per_page";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function count_personnel(){
        $db = new Db();
        $sql = "SELECT COUNT(*) AS total FROM nhanvien";
        $result = $db->select_to_array($sql);
        return $result[0]['total'];
    }
}

?>
