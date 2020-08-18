<?php
session_start();
require_once("config/db_config.php");

if(isset($_POST['submit'])){
  /**
   * Query for insert slider
   */
 $sql = 'INSERT INTO `teachers`(`name`, `email`, `phone`, `designation`, `dob`, `gender`, `religion`, `e_qualification`,
  `address`, `f_link`, `t_link`, `g_link`, `i_link`, `l_link`, `short_description`, `long_description`, `joining_date`,  
  `status`, `image`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

  $stmt = $dbh->prepare($sql);
  /**
   * Bindparam
   */
  $stmt->bindParam(1, $_POST['name']);
  $stmt->bindParam(2, $_POST['email']);
  $stmt->bindParam(3, $_POST['phone']);
  $stmt->bindParam(4, $_POST['designation']);
  $stmt->bindParam(5, $_POST['dob']);
  $stmt->bindParam(6, $_POST['gender']);
  $stmt->bindParam(7, $_POST['religion']);
  $stmt->bindParam(8, $_POST['e_qualification']);
  $stmt->bindParam(9, $_POST['address']);
  $stmt->bindParam(10, $_POST['f_link']);
  $stmt->bindParam(11, $_POST['t_link']);
  $stmt->bindParam(12, $_POST['g_link']);
  $stmt->bindParam(13, $_POST['i_link']);
  $stmt->bindParam(14, $_POST['l_link']);
  $stmt->bindParam(15, $_POST['short_description']);
  $stmt->bindParam(16, $_POST['long_description']);
  $stmt->bindParam(17, $_POST['joining_date']);
  $stmt->bindParam(18, $_POST['status']);
  $stmt->bindParam(19, $image);
  $stmt->bindParam(20, $_POST['password']);
  
    $t_dir = 'uploads/teachers/';
    $t_file = $t_dir . basename($_FILES['image']["name"]);
    $imgFileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));
    if(move_uploaded_file($_FILES['image']['tmp_name'], $t_file)){
        $image = $t_file;
          
            if($stmt->execute()){
              $message = "Success!";
              header("Location:teacher-show.php");
          }
          else{
              $message = "!Ops Something wrong, please try again!!";
              header("Location:teacher-create.php");
          }
    }
    else{
      $message = "Your file is not an image !";
      header("Location:teacher-create.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard | Add Teacher</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include_once('include/header.php') ?>
    <!-- Sidebar -->
    <?php include_once('include/sidebar.php') ?>
  
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Add Teachers</h1>
          <p>Add a new Teacher</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="teacher-show.php">Teachers</a></li>
          <li class="breadcrumb-item">Create</li>
        </ul>
      </div>
      <div class="row bg-light">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title text-center">Add a new Teachers</h3>
           
            <div class="tile-body">
            <form action="teacher-create.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label" for="name">Teachers name</label>
                  <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                  <label class="control-label" for="email">E-mail</label>
                  <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                  <label class="control-label" for="phone">Mobile Number</label>
                  <input class="form-control" type="tel" name="phone" id="phone">
                </div>
                <div class="form-group">
                  <label class="control-label" for="designation">Designation</label>
                  <input class="form-control" type="text" name="designation" id="designation">
                </div>
                <div class="form-group">
                  <label class="control-label" for="dob">Date of birth</label>
                  <input class="form-control" type="date" name="dob" id="dob">
                </div>

                <div class="form-group">
                  <label class="control-label" for="">Gender</label> &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" id="male" value="1">
                  <label for="male">Male</label>&nbsp;&nbsp;
                  <input type="radio" name="gender" id="female" value="0">
                  <label for="female">Female</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="religion">Religion</label>
                  <select name="religion" id="religion" class="form-control">
                    <option value="1">Islam</option>
                    <option value="2">Hindu</option>
                    <option value="3">Others</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label" for="e_qualification">Education Qualification</label>
                  <select name="e_qualification" id="e_qualification" class="form-control">
                    <option value="">select</option>
                    <option value="1">SSC</option>
                    <option value="2">HSC</option>
                    <option value="3">Diploma</option>
                    <option value="4">BSc</option>
                    <option value="5">BSS</option>
                    <option value="6">MA</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label" for="address">Address</label>
                  <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="joining_date">Joining Date</label>
                  <input class="form-control" type="date" name="joining_date" id="joining_date">
                </div>
                
                <div class="form-group">
                  <label class="control-label" for="image">Image</label>
                  <input class="form-control" type="file" name="image" id="image">
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
                <div class="form-group">
                  <label class="control-label" for="f_link">Facebook</label>
                  <input type="url" name="f_link" id="f_link" class="form-control" placeholder="http://facebook.com/example/">
                </div>
                <div class="form-group">
                  <label class="control-label" for="t_link">Twitter</label>
                  <input type="url" name="t_link" id="t_link" class="form-control" placeholder="http://twitter.com/example/">
                </div>
                <div class="form-group">
                  <label class="control-label" for="g_link">Google Plus</label>
                  <input type="url" name="g_link" id="g_link" class="form-control" placeholder="https://myaccount.google.com/example/">
                </div>
                <div class="form-group">
                  <label class="control-label" for="i_link">Instagram</label>
                  <input type="url" name="i_link" id="i_link" class="form-control" placeholder="https://www.instagram.com/example/">
                </div>
                <div class="form-group">
                  <label class="control-label" for="l_link">Linkedin</label>
                  <input type="url" name="l_link" id="l_link" class="form-control" placeholder="https://bd.linkedin.com/example/">
                </div>
                <div class="form-group">
                  <label class="control-label" for="short_description">Short Description</label>
                  <input class="form-control" type="text" name="short_description" id="short_description">
                </div>

                <div class="form-group">
                  <label class="control-label" for="long_description">Long Description</label>
                 <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="password">Password</label>
                  <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                  <label class="control-label" for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1">Active</option> 
                    <option value="0">Deactive</option> 
                  </select>
                </div>
                
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Teachers</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="teacher-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>
   <!-- Footer -->
    <?php include_once('include/footer.php') ?>
    
  </body>
</html>
<?php

?>