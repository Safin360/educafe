<?php
session_start();
/**
* Connect to DB
*/
require_once("config/db_config.php");
if(strlen($_SESSION['email']) == 0){
header("Location:index.php");
}else{
/**
* Test Db Config
*/
if($dbh){
/**
* Get id form url
*/
if(isset($_GET['id'])){
/**
* Select Query
*/
$sql = "SELECT * FROM `teachers` WHERE id = :id";
/**
* prepare statement
*/
$stmt = $dbh->prepare($sql);
/**
* Bind Param
*/
$stmt->bindParam(':id', $_GET['id']);
/**
* Execute Query
*/
$stmt->execute();
/**
* Fetch Single Row
*/
$row = $stmt->fetch(PDO::FETCH_ASSOC);
/**
* Array key to valiable Con
*/
extract($row);
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard | Edit Teacher</title>
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
      <div class="app-title pb-5">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Teacher</h1>
          <p>Update Teacher</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="teacher-show.php">Teacher</a></li>
          <li class="breadcrumb-item">Edit</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="tile">
            <h3 class="tile-title text-center">Update Teacher</h3>
            
            <div class="tile-body">
              <form action="teacher-update.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label class="control-label" for="name">Teacher name</label>
                  <input class="form-control" type="text" name="name" id="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="email">E-mail</label>
                  <input class="form-control" type="email" name="email" id="email" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="phone">Mobile Number</label>
                  <input class="form-control" type="tel" name="phone" id="phone" value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="designation">Designation</label>
                  <input class="form-control" type="text" name="designation" id="designation" value="<?php echo $designation ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="dob">Date of birth</label>
                  <input class="form-control" type="date" name="dob" id="dob" value="<?php echo $dob ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="">Gender</label> &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gender" id="male" value="1" <?php if($gender==1) {echo "checked";} ?>>
                  <label for="male">Male</label>&nbsp;&nbsp;
                  <input type="radio" name="gender" id="female" value="0" <?php if($gender==0) {echo "checked";} ?>>
                  <label for="female">Female</label>
                </div>
                <div class="form-group">
                  <label class="control-label" for="religion">Religion</label>
                  <select name="religion" id="religion" class="form-control" >
                    <option value="1" <?php if($religion==1) {echo "selected"; }?>>Islam</option>
                    <option value="2" <?php if($religion==2) {echo "selected"; }?>>Hindu</option>
                    <option value="3" <?php if($religion==3) {echo "selected"; }?>>Others</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="e_qualification">Education Qualification</label>
                  <select name="e_qualification" id="e_qualification" class="form-control" >
                    <option value="1" <?php if($e_qualification==1) {echo "selected"; }?>>SSC</option>
                    <option value="2" <?php if($e_qualification==2) {echo "selected"; }?>>HSC</option>
                    <option value="3" <?php if($e_qualification==3) {echo "selected"; }?>>Diploma</option>
                    <option value="4" <?php if($e_qualification==4) {echo "selected"; }?>>BSc</option>
                    <option value="5" <?php if($e_qualification==5) {echo "selected"; }?>>MSc</option>
                    <option value="6" <?php if($e_qualification==6) {echo "selected"; }?>>BSS</option>
                    <option value="7" <?php if($e_qualification==7) {echo "selected"; }?>>BBA</option>
                    <option value="8" <?php if($e_qualification==8) {echo "selected"; }?>>MBA</option>
                    <option value="9" <?php if($e_qualification==9) {echo "selected"; }?>>MA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label" for="address">Address</label>
                  <textarea name="address" id="address" cols="30" rows="5" class="form-control"><?php echo $address ?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="joining_date">Joining Date</label>
                  <input class="form-control" type="date" name="joining_date" id="joining_date" value="<?php echo $joining_date ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="image">Teacher's Image</label>
                  <input class="form-control" type="file" name="image" id="image">
                  <img src="<?php echo $image ?>" alt="!" height="60">
                  <input type="hidden" name="old_image" value="<?php echo $image ?>">
                </div>
              </div>
            </div>
          </div> 
          <div class="col-md-6 pt-5">
            <div class="tile">
              <div class="tile-body">
                <div class="form-group">
                  <label class="control-label" for="f_link">Facebook</label>
                  <input type="url" name="f_link" id="f_link" class="form-control" placeholder="http://facebook.com/example/" value="<?php echo $f_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="t_link">Twitter</label>
                  <input type="url" name="t_link" id="t_link" class="form-control" placeholder="http://twitter.com/example/" value="<?php echo $t_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="g_link">Google Plus</label>
                  <input type="url" name="g_link" id="g_link" class="form-control" placeholder="https://myaccount.google.com/example/" value="<?php echo $g_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="i_link">Instagram</label>
                  <input type="url" name="i_link" id="i_link" class="form-control" placeholder="https://www.instagram.com/example/" value="<?php echo $i_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="l_link">Linkedin</label>
                  <input type="url" name="l_link" id="l_link" class="form-control" placeholder="https://bd.linkedin.com/example/" value="<?php echo $l_link ?>">
                </div>
                
                <div class="form-group">
                  <label class="control-label" for="short_description">Short description</label>
                  <input class="form-control" type="text" name="short_description" id="short_description" value="<?php echo $short_description ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="long_description">Long description</label>
                  <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10" ><?php echo $long_description ?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="password">Password</label>
                  <input class="form-control" type="password" name="password" id="password" value="<?php echo $password ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1" <?php if($status == 1) echo "selected"; ?>>Active</option>
                    <option value="0" <?php if($status == 0) echo "selected"; ?>>Deactive</option>
                  </select>
                </div>
                
              </div>
              
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Teacher</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="teacher-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- Footer -->
  <?php include_once('include/footer.php') ?>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
  CKEDITOR.replace( 'long_description' );
  </script>
</body>
</html>
<?php
}
?>