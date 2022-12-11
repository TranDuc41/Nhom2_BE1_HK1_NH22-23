<?php
class Cart extends Db
{
    //Lấy ra tất cả sản phẩm trong bảng cart theo user_id và product_id
    public function getAllProductById($get, $id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `user_id` = ? AND `product_id` = ?");
        $sql->bind_param("ii", $get, $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
