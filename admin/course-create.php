<?php
session_start();
require_once("config/db_config.php");

if(isset($_POST['submit'])){
  /**
   * Query for insert slider
   */
 $sql = 'INSERT INTO `course`(`name`, `date`, `course_duration`, `class_duration`, `seat_available`, `class_size`,`course_price`,`image`, `short_description`,`long_description`,`t_id`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';

  $stmt = $dbh->prepare($sql);
  /**
   * Bindparam
   */
  $stmt->bindParam(1, $_POST['name']);
  
  $stmt->bindParam(2, $_POST['date']);
  $stmt->bindParam(3, $_POST['course_duration']);
  $stmt->bindParam(4, $_POST['class_duration']);
  $stmt->bindParam(5, $_POST['seat_available']);
  $stmt->bindParam(6, $_POST['class_size']);
  $stmt->bindParam(7, $_POST['course_price']);
   $stmt->bindParam(8, $image);
  $stmt->bindParam(9, $_POST['short_description']);
    $stmt->bindParam(10, $_POST['long_description']);
  $stmt->bindParam(11, $_POST['t_id']);
  $stmt->bindParam(12, $_POST['status']);
  
    $t_dir = 'uploads/course/';
    $t_file = $t_dir . basename($_FILES['image']["name"]);
    $imgFileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));
    if(move_uploaded_file($_FILES['image']['tmp_name'], $t_file)){
        $image = $t_file;
          
            if($stmt->execute()){
              $message = "Success!";
              header("Location:course-show.php");
          }
          else{
              $message = "!Ops Something wrong, please try again!!";
               header("Location:course-create.php");
          }
    }
    else{
      $message = "Your file is not an image !";
      header("Location:course-create.php");
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
          <h1><i class="fa fa-edit"></i> Create Course</h1>
          <p>Add a new Course</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="course-show.php">Course</a></li>
          <li class="breadcrumb-item">Create</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="tile">
            <h3 class="tile-title text-center">Add a new course</h3>
           
            <div class="tile-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label" for="name">Course name</label>
                  <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" type="date" name="date" id="date">
                </div>
                <div class="form-group">
                  <label class="control-label" for="course_duration">Course duration</label>
                  <input class="form-control" type="text" name="course_duration" id="course_duration">
                </div>
                <div class="form-group">
                  <label class="control-label" for="class_duration">Class duration</label>
                  <input class="form-control" type="text" name="class_duration" id="class_duration">
                </div>

                <div class="form-group">
                  <label class="control-label" for="seat_available">Seat available</label>
                  <input class="form-control" type="text" name="seat_available" id="seat_available">
                </div>
                <div class="form-group">
                  <label class="control-label" for="class_size">Class size</label>
                  <input class="form-control" type="text" name="class_size" id="class_size">
                </div>

                <div class="form-group">
                  <label class="control-label" for="course_price">Course price</label>
                  <input class="form-control" type="text" name="course_price" id="course_price">
                </div>

                <div class="form-group">
                  <label class="control-label" for="image">Course image</label>
                  <input class="form-control" type="file" name="image" id="image">
                </div>

                <div class="form-group">
                  <label class="control-label" for="short_description">Short description</label>
                  <input class="form-control" type="text" name="short_description" id="short_description">
                </div>

                <div class="form-group">
                  <label class="control-label" for="long_description">Long_description</label>
                  <textarea name="long_description" id="long_description" cols="30" rows="10" class="form-control"></textarea>
                  
                </div>

                    <div class="form-group">
                  <label class="control-label" for="t_id">Teacher id</label>
                  <input class="form-control" type="text" name="t_id" id="t_id">
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
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add course</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="course-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

?>