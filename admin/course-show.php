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
     * Query for Database
     */
    $sql = 'SELECT * FROM `course`';
    /**
     * Prepare statement
     */
    $stmt = $dbh->prepare($sql);
    /**
     * Execute Query
     */
    $stmt->execute();
    /**
     * Fetch All row
     */
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard | Show Course</title>
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
          <h1><i class="fa fa-th-list"></i> Course List</h1>
          <p>Educafe course image list</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"> <a href="deshboard.php"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item">Course</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                           <th>Name</th>
                           <th>Course duration</th>
                           <th>Course price</th>
                           <th>Image</th>
                           <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  foreach($row as $val){
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $val['name']; ?></td>
                      <td><?php echo $val['course_duration']; ?></td>
                      <td><?php echo $val['course_price']; ?></td>
                      <td><img src="<?php echo $val['image']; ?>" alt="!" height="50"></td>
                      <td><?php if($val['status'] == 0) {echo "Deactive";}else{echo "Active";} ?></td>
                      <td>
                        <a href="course-edit.php?id=<?php echo $val['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="course-view.php?id=<?php echo $val['id']; ?>" class="btn btn-info">View</a>
                        <a href="course-delete.php?id=<?php echo $val['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    <?php
                    $i++;
                     }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
   
   <!-- Footer -->
    <?php include_once('include/footer.php') ?>
     <!-- Data table plugin-->
     <script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>
<?php
}
?>