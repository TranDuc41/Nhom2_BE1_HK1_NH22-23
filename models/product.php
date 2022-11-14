<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    // Lấy Ra Loại sản phẩm và hiển thị 
    public function getAllProtypes($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products where `type_id`= ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Truy vấn lấy ra tài khoản và mật khẩu trong bảng users
    public function getUsers($mail, $password)
    {
        $sql = self::$connection->prepare("select *from users where mail = ? and password = ?");
        $sql->bind_param("ss", $mail, $password);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Truy vấn lấy ra mail user trong bảng users
    public function getAllUsers($mail)
    {
        $sql = self::$connection->prepare("select *from users where mail = ?");
        $sql->bind_param("s", $mail);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Truy vấn lấy ra mail trong bảng users
    public function getMail($mail)
    {
        $sql = self::$connection->prepare("select *from users where mail = ?");
        $sql->bind_param("s", $mail);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy ra 3 sản phẩm điện thoại mới nhất
    public function get3ProductsPhone()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3");
        $varibles = 1;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    //Lấy ra 3 sản phẩm điện thoại sau 3 sản phẩm mới nhất
    public function getProductsPhone()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3, 3");
        $varibles = 1;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy ra 3 sản phẩm Laptop mới nhất
    public function get3ProductsLaptop()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3");
        $varibles = 2;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy ra 3 sản phẩm Laptop sau 3 sản phẩm mới nhất
    public function getProductsLaptop()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3, 3");
        $varibles = 2;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy ra 3 sản phẩm đồng hồ mới nhất
    public function get3ProductsWatch()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3");
        $varibles = 4;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy ra 3 sản phẩm đồng hồ sau 3 sản phẩm mới nhất
    public function getProductsWatch()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? order by id desc LIMIT 3, 3");
        $varibles = 4;
        $sql->bind_param("i", $varibles);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    //Lấy ra 20 sản phẩm mới nhất 
    public function get20NewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,20");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy ra tất cả sản phẩm nổi bật 
    public function getAllFeature0()
    {
        $sql = self::$connection->prepare("SELECT * FROM products where feature = 1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy danh sách san phẩm
    public function getProducts($start, $limit)
    {
        $sql = self::$connection->prepare("SELECT * FROM products order by id desc LIMIT $start, $limit");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy danh sách hãng
    public function getAllManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lấy tất cả trong bảng cart
    public function getCartById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM cart WHERE user_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    //Lấy tất cả trong bảng cart
    public function getIdAndType($name)
    {
        $sql = self::$connection->prepare("SELECT `id`, `type_id` FROM `products` WHERE `name` = ?");
        $sql->bind_param("s", $name);
        $sql->execute(); //return object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    //Tìm Kiếm sản phẩm 
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `description` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search3($keyword, $page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `name` Like ? LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param('sss', $keyword, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phân Trang
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        for ($j = 1; $j <= $totalLinks; $j++) {
            if ($j == $page) {
                $link = $link . "<li style= 'background:#FF0000'><a href='$url&page=$j'> $j </a></li>";
            } else {
                $link = $link . "<li><a href='$url&page=$j'> $j </a></li>";
            }
        }
        return $link;
    }
}
