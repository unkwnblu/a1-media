<?php 
    ob_start();
    
    include('../config/constants.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "") {

            $path = "../images/artists/".$image_name;
            $remove = unlink($path);

            if($remove==false) {
                $_SESSION['error'] = "<div class='text-bg-success rounded-3 p-3'>Failed to Remove Image</div>";
                header("location:".SITEURL.'admin/manage-artist.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_artist WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true) {
            $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Artist Deleted Sucessfully</div>";
            header("location:".SITEURL.'admin/manage-artist.php');
        } else {
            $_SESSION['error'] = "<div class='text-bg-success rounded-3 p-3'>Failed to Delete Artist, Contact Support</div>";
            header("location:".SITEURL.'admin/manage-artist.php');
        }
    } else {
        header("location:".SITEURL.'admin/manage-artist.php');
    }
?>