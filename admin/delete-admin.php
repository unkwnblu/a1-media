
<?php 
    ob_start();
    
    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn , $sql);

    if($res) {
        $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Admin Deleted</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['error'] = "<div class='text-bg-success rounded-3 p-3'>Failed to Add Admin, Contact Support</div>";
      header("location:".SITEURL.'admin/add-admin.php');
    }
?>