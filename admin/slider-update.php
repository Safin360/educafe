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
            $sql = "UPDATE `slider` SET `h_title`=:h_title,`p_title`=:p_title,`f_b_link`=:f_b_link,`l_b_link`=:l_b_link,`image`=:image,`status`=:status WHERE `id`=:id";
            /**
             * File Upload
             */
            if(!empty($_FILES['image'])){
                
                /**
                 * Base path
                 */
                $t_dir = 'uploads/slider/';
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
                    header('Location:slider-edit.php');
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
            $stmt->bindParam(':h_title', $_POST['h_title']);
            $stmt->bindParam(':p_title', $_POST['p_title']);
            $stmt->bindParam(':f_b_link', $_POST['f_b_link']);
            $stmt->bindParam(':l_b_link', $_POST['l_b_link']);
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
                header('Location:slider-show.php');
            }
            else{
                $msg = "Oops something wrong please try again";
                    header('Location:slider-edit.php');
            }
        }
    }
}

?>
