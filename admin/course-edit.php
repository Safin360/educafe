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
            $sql = "SELECT * FROM `course` WHERE id = :id";
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
    <title>Deshboard | Edit Course</title>
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
          <h1><i class="fa fa-edit"></i> Edit Course</h1>
          <p>Update course</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="course-show.php">Course</a></li>
          <li class="breadcrumb-item">Edit</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="tile">
            <h3 class="tile-title text-center">Update Course</h3>
            <?php //if($message != null){echo $message;}
            // echo $id;
            ?>
            <div class="tile-body">
            <form action="course-update.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label class="control-label" for="name">Course name</label>
                  <input class="form-control" type="text" name="name" id="name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" type="text" name="date" id="date" value="<?php echo $date ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="course_duration">Course duration</label>
                  <input class="form-control" type="text" name="course_duration" id="course_duration" value="<?php echo $course_duration ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="class_duration">Class duration</label>
                  <input class="form-control" type="text" name="class_duration" id="class_duration" value="<?php echo $class_duration ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="seat_available">Seat available</label>
                  <input class="form-control" type="text" name="seat_available" id="seat_available" value="<?php echo $seat_available ?>">
                </div>

                 <div class="form-group">
                  <label class="control-label" for="class_size">Class size</label>
                  <input class="form-control" type="text" name="class_size" id="class_size" value="<?php echo $class_size ?>">
                </div>

                <div class="form-group">
                  <label class="control-label" for="course_price">Course price</label>
                  <input class="form-control" type="text" name="course_price" id="course_price" value="<?php echo $course_price ?>">
                </div>

                <div class="form-group">
                  <label class="control-label" for="image">Course Image</label>
                  <input class="form-control" type="file" name="image" id="image">
                  <img src="<?php echo $image; ?>" alt="!" height="60">
                  <input type="hidden" name="old_image" value="<?php echo $image; ?>">
                </div>
                 

                 <div class="form-group">
                  <label class="control-label" for="short_description">Short description</label>
                  <input class="form-control" type="text" name="short_description" id="short_description" value="<?php echo $short_description ?>">
                </div>

                <div class="form-group">
                  <label class="control-label" for="long_description">Long description</label>
                  <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10"><?php echo $long_description ?></textarea>
                  <!-- <input class="form-control" type="text" name="long_description" id="long_description" value="<?php echo $long_description ?>"> -->
                </div>

                <div class="form-group">
                  <label class="control-label" for="t_id">Teacher id</label>
                  <input class="form-control" type="text" name="t_id" id="t_id" value="<?php echo $t_id ?>">
                </div>

                <div class="form-group">
                  <label class="control-label" for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1" <?php if($status == 1) echo "selected"; ?>>Active</option> 
                    <option value="0" <?php if($status == 0) echo "selected"; ?>>Deactive</option> 
                  </select>
                </div>
                
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update course</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="course-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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