<?php
session_start();
/**
 * Connect to DB
 */
require_once("config/db_config.php");
if(strlen($_SESSION['email']) == 0){
  header("Location:index.php");
}else{
  $message = null;
/**
 * Insert Slider
 */
if(isset($_POST['submit'])){
  /**
   * Query for insert slider
   */
  $sql = 'INSERT INTO `slider`(`h_title`, `p_title`, `f_b_link`, `l_b_link`, `image`, `status`) VALUES (?,?,?,?,?,?)';
  /**
   * Prepare Statement
   */
  $stmt = $dbh->prepare($sql);
  /**
   * Bindparam
   */
  $stmt->bindParam(1, $_POST['h_title']);
  $stmt->bindParam(2, $_POST['p_title']);
  $stmt->bindParam(3, $_POST['f_b_link']);
  $stmt->bindParam(4, $_POST['l_b_link']);
  $stmt->bindParam(5, $image);
  $stmt->bindParam(6, $_POST['status']);
  /**
   * Image Upload
   */
    $t_dir = 'uploads/slider/';
    $t_file = $t_dir . basename($_FILES['image']["name"]);
    $imgFileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));
    if(move_uploaded_file($_FILES['image']['tmp_name'], $t_file)){
        $image = $t_file;
            /**
             * Execute Query
             */
            if($stmt->execute()){
              $message = "Success!";
              header("Location:slider-show.php");
          }
          else{
              $message = "!Ops Something wrong, please try again!!";
               header("Location:slider-create.php");
          }
    }
    else{
      $message = "Your file is not an image !";
      header("Location:slider-create.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard | Create Slider</title>
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
          <h1><i class="fa fa-edit"></i> Create Silder</h1>
          <p>Add a new slider</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="slider-show.php">Slider</a></li>
          <li class="breadcrumb-item">Create</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="tile">
            <h3 class="tile-title text-center">Add a new slider</h3>
            <?php if($message != null){echo $message;} ?>
            <div class="tile-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label" for="h_title">Heading</label>
                  <input class="form-control" type="text" name="h_title" id="h_title">
                </div>
                <div class="form-group">
                  <label class="control-label" for="p_title">Summary</label>
                  <input class="form-control" type="text" name="p_title" id="p_title">
                </div>
                <div class="form-group">
                  <label class="control-label" for="f_b_link">Link 1</label>
                  <input class="form-control" type="text" name="f_b_link" id="f_b_link">
                </div>
                <div class="form-group">
                  <label class="control-label" for="l_b_link">Link 2</label>
                  <input class="form-control" type="text" name="l_b_link" id="l_b_link">
                </div>
                <div class="form-group">
                  <label class="control-label" for="image">Slide image</label>
                  <input class="form-control" type="file" name="image" id="image">
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
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Slide</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="slider-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
}
?>