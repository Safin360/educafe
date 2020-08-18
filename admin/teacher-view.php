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
          <h1><i class="fa fa-edit"></i> Edit View</h1>
          <p>View a single course</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a> </li>
          <li class="breadcrumb-item"><a href="course-show.php">Teacher</a></li>
          <li class="breadcrumb-item">View</li>
        </ul>
      </div>
      <div class="row">
      <div class="col-md-12">
        <div class="tile">
            <table class="table table-hover">
                <tr>
                    <th>Teacher name
                    </th>
                    <th><?php echo $name; ?></th>
                </tr>
                <tr>
                    <th>Teacher Email</th>
                    <th><?php echo $email; ?></th>
                </tr>
                <tr>
                    <th>Teacher's Phone</th>
                    <th><?php echo $phone; ?></th>
                </tr>
                <tr>
                    <th>Designation</th>
                    <th><?php echo $designation; ?></th>
                </tr>
                 <tr>
                    <th>Date of Birth</th>
                    <th><?php echo $dob; ?></th>
                </tr>
                 <tr>
                    <th>Gender</th>
                    <th><!-- <?php echo $gender; ?> -->
                         <?php
                          if($gender == 1){ 
                            echo "Male"; }
                      
                        else if($gender == 0){
                            echo "Female"; }
                        else
                            echo "Others";

                            ?>
                    </th>
                </tr>
                 <tr>
                    <th>Religion</th>
                    <th>
                        <?php
                          if($religion == 1){ 
                            echo "Islam"; }
                      
                        else if($religion == 2){
                            echo "Hindu"; }
                         else if($religion == 3){
                            echo "Others"; }
                        else
                            echo "Submit again";

                            ?>
                    </th>
                </tr>
                 <tr>
                    <th>Education Qualification(last degree)</th>
                    <th>
                        <?php
                          if($e_qualification == 1){ 
                            echo "SSC"; }
                      
                        else if($e_qualification == 2){
                            echo "HSC"; }
                         else if($e_qualification == 3){
                            echo "Diploma"; }
                         else if($e_qualification == 4){
                            echo "BSc"; }
                         else if($e_qualification == 5){
                            echo "MSc"; }
                         else if($e_qualification == 6){
                            echo "BSS"; }
                         else if($e_qualification == 7){
                            echo "BBA"; }
                         else if($e_qualification == 8){
                            echo "MBA"; }
                         else if($e_qualification == 9){
                            echo "MA"; }
                        else
                            echo "Submit again";

                            ?>
                    </th>
                </tr>
                 <tr>
                    <th>Address</th>
                    <th><?php echo $address; ?></th>
                </tr>
                 <tr>
                 <tr>
                    <th>Facebook Link</th>
                    <th><?php echo $f_link; ?>
                        <button>
                            <a href="<?php echo $f_link; ?>" target="_blank"><i class="fa fa-facebook-square p-2" aria-hidden="true"></i></a>
                        </button>
                   
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>Twitter Link</th>
                    <th><?php echo $t_link; ?>
                        <button>
                            <a href="<?php echo $t_link; ?>" target="_blank"><i class="fa fa-twitter-square p-2" aria-hidden="true"></i></a>
                        </button>
                   
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>Google Plus Link</th>
                    <th><?php echo $g_link; ?>
                        <button>
                            <a href="<?php echo $g_link; ?>" target="_blank"><i class="fa fa-google-plus-square p-2" aria-hidden="true"></i></a>
                        </button>
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>Instagram Link</th>
                    <th><?php echo $i_link; ?>
                        <button>
                            <a href="<?php echo $i_link; ?>" target="_blank"><i class="fa fa-instagram p-2" aria-hidden="true"></i></a>
                        </button>
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>linkedIn Link</th>
                    <th><?php echo $l_link; ?>
                        <button>
                            <a href="<?php echo $l_link; ?>" target="_blank"><i class="fa fa-linkedin-square p-2" aria-hidden="true"></i></a>
                        </button>
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>Short Description</th>
                    <th><?php echo $short_description; ?></th>
                </tr>
                 <tr>

                 <tr>
                    <th>Long Description</th>
                    <th><?php echo $long_description; ?></th>
                </tr>
                 <tr>
                     <tr>
                    <th>Joining Date</th>
                    <th><?php echo $joining_date; ?></th>
                </tr>
                 <tr>
                     <tr>
                    <th>Resign Date</th>
                    <th><?php echo $resign_date; ?></th>
                </tr>
                 <tr>
                    

                    <th>Teacher Image</th>
                    <th>
                         <img src="<?php echo $image ?>" alt="!" height="200" />
                    </th>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>
                         <?php
                         if($status == 1){
                            echo "<span class='text-success'>Active</span>";
                         }
                         else{
                            echo "<span class='text-danger'>Deactive</span>";
                         }
                           
                           ?>
                    </th>
                </tr>
                 <tr>
                     <tr>
                    <th>Password</th>
                    <th><?php echo $password; ?></th>
                </tr>
                 <tr>
                    
               
            </table>
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