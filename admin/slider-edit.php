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
            $sql = "SELECT * FROM `slider` WHERE id = :id";
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
    <title>Deshboard | Edit Slider</title>
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
          <h1><i class="fa fa-edit"></i> Edit Silder</h1>
          <p>Update slider</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="slider-show.php">Slider</a></li>
          <li class="breadcrumb-item">Edit</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="tile">
            <h3 class="tile-title text-center">Update slider</h3>
            <?php //if($message != null){echo $message;}
            // echo $id;
            ?>
            <div class="tile-body">
            <form action="slider-update.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                  <label class="control-label" for="h_title">Heading</label>
                  <input class="form-control" type="text" name="h_title" id="h_title" value="<?php echo $h_title; ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="p_title">Summary</label>
                  <input class="form-control" type="text" name="p_title" id="p_title" value="<?php echo $p_title ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="f_b_link">Link 1</label>
                  <input class="form-control" type="text" name="f_b_link" id="f_b_link" value="<?php echo $f_b_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="l_b_link">Link 2</label>
                  <input class="form-control" type="text" name="l_b_link" id="l_b_link" value="<?php echo $l_b_link ?>">
                </div>
                <div class="form-group">
                  <label class="control-label" for="image">Slide image</label>
                  <input class="form-control" type="file" name="image" id="image">
                  <img src="<?php echo $image; ?>" alt="!" height="60">
                  <input type="hidden" name="old_image" value="<?php echo $image; ?>">
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
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Slide</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="slider-show.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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