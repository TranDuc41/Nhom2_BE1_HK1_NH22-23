<?php      
    require "../../config.php";
    require "../../models/db.php";
    require "../../models/product.php";

    $full_name = $_POST['full_name'];  
    $mail = $_POST['mail'];  
    $password = $_POST['pass'];
      
    $product = new Product;
    $products = $product->getAllUsers($mail);
    foreach($products as $value):
        
        if($value['mail'] == $mail){  
            ?>
            <Style>h4 {
                color: red;
            }
            body {
                display: flex;
                background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
            }
            form.signup {
                margin: auto;
                border-radius: 10px;
                border: 1px solid #fff;
                width: 26%;
                text-align: center;
                box-shadow: 0px 15px 20px rgb(0 0 0 / 10%);
                background: #fff;
            }
            .field.btn {
                margin-bottom: 20px;
            }
            input[type="submit"] {
                background: #FBAB7E;
                border: none;
                padding: 10px 10px;
                width: 86px;
                border-radius: 5px;
            }
            </Style>
            <form action="../../login.php" class="signup">
            <div class="field">
               <h4>Mail đã tồn tại !</h4>
            </div>
            <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit"  value=" Thử Lại">
             </div>
         </form>';
        <?php 
        }
    endforeach;
    
    ?> 