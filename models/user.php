<?php
class User extends Db
{
    //Lấy tất cả users
    public function getAllUsers()
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` order by `id` desc");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getInfoByUsername($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `user_name`=?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getUser($name)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `mail`=?");
        $sql->bind_param("s", $name);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy ra tất cả khách hàng(mới -> cũ)
    public function getAllUser($role)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `role`=? ORDER BY id DESC");
        $sql->bind_param("s", $role);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy ra 6 khách hàng mới nhất
    public function get6UserNew($role)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `role`=? ORDER BY id DESC LIMIT 0,6");
        $sql->bind_param("s", $role);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    } 
}
