<?php 
    session_start();
    include("./assets/inc/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel="icon" href="https://telegra.ph/file/5dbf6471c783f869cfdbe.jpg" type="image/icon type">
    <link rel="stylesheet" href="./assets/css/bootstrap4/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./assets/fontawesome/css/all.css"> -->
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg fixed-top" id="nav">

<div class="container">
            
<img src="images/white doctor sign.png" width="90" align="left"> <a href="https://hospitalnewlife.herokuapp.com/" class="navbar-brand"> &nbsp;NewLife Hospital</a>

<div class="collapse navbar-collapse" id="myNavbar">

<ul class="navbar-nav ml-auto">

    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="covid.php">COVID-19</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="services.php">Services</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
    </li>
</ul>
</div>
</div>
</nav>

<br><br><br>
    <div class = "container">
        <div class="row justify-content-md-center text-center">
            <form action="index.php" method = "POST" class = "login-form">
                <div>
                    <h1>Doctor Login</h1>
                </div>
                <?php
                    if(isset($_POST['email']) && isset($_POST['password'])){
                        if(!empty($_POST['email']) && !empty($_POST['password'])){
                            $email = $_POST['email'];
                            $pass = $_POST['password'];

                            $sql_admin = "SELECT * FROM admin WHERE email = '".$email."'";
                            $query_admin = mysqli_query($conn, $sql_admin);
                            if(mysqli_num_rows($query_admin)){
                                $fetch_password = mysqli_fetch_assoc($query_admin);
                                if($fetch_password['password'] == $pass){
                                    $_SESSION['admin_id'] = $fetch_password['id'];
                                    header("location: home.php");
                                }else{
                                    echo "<p class = 'text-danger'>Wrong Password.</p>";
                                }
                            }else{
                                
                                echo "<p class = 'text-danger'>Unrecognized login details.</p>";
                                
                            }
                        }
                    }
                ?>
                <div>
                    <input type="email" name="email" id="email" class = "form-control" placeholder = "Enter Email">
                </div>
                <div>
                    <input type="password" name="password" id="password" class = "form-control" placeholder= "Enter Password">
                </div>
                <div>
                    <button class = "btn btn-outline-dark btn-dark">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src= "./assets/bootstrap/js/bootstrap.js"></script>
    <script src= "./assets/js/jquery-3.4.1.js"></script>
    <script src= "./assets/js/script.js"></script>
    <script src= "./assets/js/common.min.js"></script>
    <script src= "./assets/js/custom.min.js"></script>
    <script src= "./assets/js/settings.js"></script>
    <script src= "./assets/js/gleek.js"></script>
    <script src= "./assets/js/styleSwitcher.js"></script>
</body>
</html>
