<?php
class User extends Db
{
    public function getRoleId($username)
    {
        $sql = self::$connection->prepare("SELECT `role_id` FROM `users` WHERE `username` =?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getInfoByUsername($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users`,`roles` WHERE `user_name`=? AND `users`.`id`=`roles`.`role_id`");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
