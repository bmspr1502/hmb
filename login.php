<?php
session_start();
if(isset($_SESSION['userid'])){
    echo "<script>window.location.href='menu.php';</script>";
}else{
    if(isset($_POST['login'])){
        $phone = $_POST['phone'];
        $pwd = $_POST['password'];

        include 'admin/DB.php';
        $query = 'SELECT * FROM user WHERE phone=$phone';
        if($con->query($query)){
            $row = $result->fetch_assoc();
            if($pwd == $row['password']){
                
            }
        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN: Hotel Muruga Bhavan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>

<body style="background: #FF9671">

<header>
    <div class="jumbotron text-white jumbotron-image shadow" >
        <nav class="navbar navbar-expand-md navbar-dark">

            <a class="navbar-brand btn btn-dark btn-lg" href="index.php" ><h1>HMB</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto pd-2">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark btn-lg" href="menu.php">Menu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-dark btn-lg" href="cart.php">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-dark btn-lg" href="#contact-us">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>

        <h1 class="display-3 text-center" id="hmb">
            Login - Hotel Muruga Bhavan
        </h1>
        <p class="push-spaces"></p>
    </div>
</header>

<div class="container">
    <h2 class="text-center">Menu Items</h2>
    <div class="container">
        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>Customer Phone no.:</td>
                    <td><input type="text" id="phone" name="phone"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="submit" name="login" value="Login"></td>
                    <td><input type="submit" class="submit" name="signup" value="New Customer"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<footer class="mt-4">
    <div class="jumbotron text-center bg-dark text-light" style="margin-bottom:0" id="contact-us">
        <div class="row">
            <div class="col-lg-6">
                <h3>Hotel Muruga Bhavan</h3>
                <p>35, Adyar Main Road,<br>Madhya Kailash, <br> Chennai.<br><br>
                    <span class="material-icons" style="font-size: 16px;">call</span> <a href="callto:+919432112345" >+91 94321 12345</a><br>
                    <span class="material-icons" style="font-size: 16px;">email</span><a href="mailto: hmb@email.com" >hmb@email.com</a><br>
                </p>
            </div>
            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3887.478094832939!2d80.24905!3d13.005198000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x16f41d10f57949e9!2sKasthurba%20Nagar!5e0!3m2!1sen!2sus!4v1613743064308!5m2!1sen!2sus" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</footer>

<script>
    window.onload = function () {
        getTable();
    }
    function getTable() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status){
                document.getElementById('data').innerHTML = this.responseText;
            }
        };
        xmlhttp.open('GET', 'admin/tabledata.php', true);
        xmlhttp.send();
    }
    function addtocart(val, name, price){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status){
                document.getElementById('cart').innerHTML = this.responseText;
            }
        };
        xmlhttp.open('GET', 'admin/addtocart.php?userid='+1+'&foodid='+val+'&price='+price+'&name='+name, true);
        xmlhttp.send();
    }
</script>

</body>
</html>
