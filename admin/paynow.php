<?php
include "DB.php";

if(isset($_GET['userid'])){
    $userid = $_GET['userid'];

    $query = "UPDATE cart SET paid=1 WHERE userid=$userid";

    if($con->query($query)){
        echo "PAID ALL THE ELEMENTS SUCCESSFULLY, YOUR FOOD WILL BE DELIVERED TO YOUR DEFAULT ADDRESS. THANK YOU FOR SHOPPING";
    }else{
        echo $con->error;
    }
}else{
    echo "NOT VIEWABLE";
}