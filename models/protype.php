<?php 
class Protype extends Db{
    public function getAllProtype()
    {
    $sql = self::$connection->prepare("SELECT * FROM protypes");
    $sql->execute();//return an object
    $item = array();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item; //return an array
    }

    //Lấy danh loại sản phẩm
    public function getProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}