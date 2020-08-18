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
     * Db connection check
     */
    if($dbh){
        /**
         * Form Submit Check
         */
        if(isset($_POST['submit'])){
            /**
             * Sql Query
             */
            $sql = "UPDATE `teachers` SET `name`=:name, `email`=:email, `phone`=:phone, `designation`=:designation, `dob`=:dob, `gender`=:gender, `religion`=:religion, `e_qualification`=:e_qualification,`address`=:address, `f_link`=:f_link, `t_link`=:t_link, `g_link`=:g_link, `i_link`=:i_link, `l_link`=:l_link, `short_description`=:short_description, `long_description`=:long_description, `joining_date`=:joining_date,`status`=:status, `image`=:image WHERE `id`=:id";
            /**
             * File Upload
             */
            if(!empty($_FILES['image'])){
                
                /**
                 * Base path
                 */
                $t_dir = 'uploads/teachers/';
                /**
                 * File Path
                 */
                $t_file = $t_dir . basename($_FILES['image']["name"]);
                /**
                 * File Upload Condition check
                 */
                if(move_uploaded_file($_FILES['image']['tmp_name'], $t_file)){
                    /**
                     * assign Image value
                     */
                    $image2 = $t_file;
                }
                else{
                    $msg = "File Not uploaded";
                    header('Location:teacher-edit.php');
                }
            }
            /**
             * Prepare Statement
             */
            $stmt = $dbh->prepare($sql);
            /**
             * Bind param
             */

  // $stmt->bindParam(':t_id', $_POST['t_id']);


  $stmt->bindParam(':id', $_POST['id']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':phone', $_POST['phone']);
  $stmt->bindParam(':designation', $_POST['designation']);
  $stmt->bindParam(':dob', $_POST['dob']);
  $stmt->bindParam(':gender', $_POST['gender']);
  $stmt->bindParam(':religion', $_POST['religion']);
  $stmt->bindParam(':e_qualification', $_POST['e_qualification']);
  $stmt->bindParam(':address', $_POST['address']);
  $stmt->bindParam(':f_link', $_POST['f_link']);
  $stmt->bindParam(':t_link', $_POST['t_link']);
  $stmt->bindParam(':g_link', $_POST['g_link']);
  $stmt->bindParam(':i_link', $_POST['i_link']);
  $stmt->bindParam(':l_link', $_POST['l_link']);
  $stmt->bindParam(':short_description', $_POST['short_description']);
  $stmt->bindParam(':long_description', $_POST['long_description']);
  $stmt->bindParam(':joining_date', $_POST['joining_date']);
  $stmt->bindParam(':status', $_POST['status']);
  $stmt->bindParam(':image', $image);
 
            if(isset($image2)){
                /**
                *  Old File Check
                */
                if($_POST['old_image'] != null){
                /**
                * Delete File
                */
                unlink($_POST['old_image']);
                }
                $image = $image2;
            }
            else{
                $image = $_POST['old_image'];
            }
          
            /**
             * check File Upload Condition
             */
            if($image != null){
                $stmt->execute();
                header('Location:teacher-show.php');
            }
            else{
                $msg = "Oops something wrong please try again";
                    header('Location:teacher-edit.php');
            }
        }
    }
}

?>
