<?php
include "DB.php";

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $foodid = $_GET['foodid'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $query = "INSERT INTO cart (userid, foodid, name, price, paid) VALUES ($userid, $foodid, '$name', $price, 0)";

    if($con->query($query)){
        echo "ITEMID $foodid = $name, ADDED TO CART SUCCESSFULLY";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}