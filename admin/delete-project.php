<?php 
ob_start();
include('../config/constants.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch project data
    $sql = "SELECT * FROM tbl_project WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        $thumbnail = $row['thumbnail'];
        $img_1 = $row['img_1'];

        // Delete thumbnail if it exists
        if (!empty($thumbnail)) {
            $thumb_path = "../images/projects/thumb/" . $thumbnail;
            if (file_exists($thumb_path)) {
                $remove_thumb = unlink($thumb_path);
                if ($remove_thumb == false) {
                    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to remove thumbnail</div>";
                    header("location:".SITEURL.'admin/manage-project.php');
                    die();
                }
            }
        }

        // Delete additional images if they exist
        if (!empty($img_1)) {
            $img_array = json_decode($img_1, true);
            if (is_array($img_array)) {
                foreach ($img_array as $img) {
                    $img_path = "../images/projects/" . $img;
                    if (file_exists($img_path)) {
                        $remove_img = unlink($img_path);
                        if ($remove_img == false) {
                            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to remove an image</div>";
                            header("location:".SITEURL.'admin/manage-project.php');
                            die();
                        }
                    }
                }
            }
        }

        // Delete from database
        $delete_sql = "DELETE FROM tbl_project WHERE id = $id";
        $delete_res = mysqli_query($conn, $delete_sql);

        if ($delete_res) {
            $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Project deleted successfully</div>";
        } else {
            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to delete project from database</div>";
        }

    } else {
        $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Project not found</div>";
    }

} else {
    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Invalid request</div>";
}

// Redirect
header("location:".SITEURL.'admin/manage-project.php');
exit();
?>
