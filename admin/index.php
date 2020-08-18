<?php
session_start();
/**
 * Connect to DB
 */
require_once("config/db_config.php");
/**
 * Flash Message
 */
$message = "";
/**
 * Connection Check
 */
if(isset($_POST['submit'])){
    /**
     * SQL Query
     */
    $sql = "SELECT * FROM admin WHERE email = :email and password = :password";
    /**
     * Prepare Statement
     */
    $stmt = $dbh->prepare($sql);
    /**
     * bindParam
     */
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $password);
    /**
     * Password Decoding
     */
    $password = md5($_POST['password']);
    /**
     * Execute Param
     */
    $stmt->execute();
    /**
     * Fatch single row form Database
     */
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    /**
     * Check Valid user
     */
    if($row != null){
        foreach($row as $value){
            /**
             * Store user data in session
             */
            $_SESSION["id"] = $value['id'];
            $_SESSION["email"] = $value['email'];
            $_SESSION["image"] = $value['image'];
            $_SESSION["name"] = $value['name'];
        }
    }else{
        $message = "Invalid Username Or Password";
        header("Location:index.php");
    }
}
/**
 * Session Check
 */
if(isset($_SESSION["id"])){
    header("Location:deshboard.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login -  Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Educafe</h1>
      </div>
      <div class="login-box">
        <form action="" method="post" class="login-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <!-- <div class="message text-danger"><?php if($message!="") { echo $message; } ?></div> -->
          <div class="form-group">
            <label class="control-label">USER EMAIL</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Email" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Password" autocomplete="off">
          </div>
          <div class="form-group btn-container">
            
            <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
       
      </div>
       <a href="register.php">Register</a>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
  </body>
</html>