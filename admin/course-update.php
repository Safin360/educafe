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
            $sql = "UPDATE `course` SET `name`=:name,`date`=:date,`course_duration`=:course_duration,`class_duration`=:class_duration,`seat_available`=:seat_available,`class_size`=:class_size,`course_price`=:course_price,`image`=:image,`short_description`=:short_description,`long_description`=:long_description,`t_id`=:t_id,`status`=:status WHERE `id`=:id";
            /**
             * File Upload
             */
            if(!empty($_FILES['image'])){
                
                /**
                 * Base path
                 */
                $t_dir = 'uploads/course/';
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
                    header('Location:course-edit.php');
                }
            }
            /**
             * Prepare Statement
             */
            $stmt = $dbh->prepare($sql);
            /**
             * Bind param
             */
        


  $stmt->bindParam(':id', $_POST['id']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':date', $_POST['date']);
  $stmt->bindParam(':course_duration', $_POST['course_duration']);
  $stmt->bindParam(':class_duration', $_POST['class_duration']);
  $stmt->bindParam(':seat_available', $_POST['seat_available']);
  $stmt->bindParam(':class_size', $_POST['class_size']);
  $stmt->bindParam(':course_price', $_POST['course_price']);
  $stmt->bindParam(':short_description', $_POST['short_description']);
  $stmt->bindParam(':long_description', $_POST['long_description']);
  $stmt->bindParam(':t_id', $_POST['t_id']);
 
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
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':status', $_POST['status']);
            /**
             * check File Upload Condition
             */
            if($image != null){
                $stmt->execute();
                header('Location:course-show.php');
            }
            else{
                $msg = "Oops something wrong please try again";
                    header('Location:course-edit.php');
            }
        }
    }
}

?>
