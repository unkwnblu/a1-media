<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Update Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
</head>

<body>

  <?php include('partials/navbar.php') ?>
  <section class="px-5 mx-5 my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-5">
          <?php 
          if(isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
        ?>
        </div>
      </div>
    </div>
  
  <div class="container-fluid">
  <div class="row">
    <div class="col-5">
       <?php 
          if(isset($_GET['id'])) {
            $id=$_GET['id'];
          }
        ?>
        
    </div>
  </div>
</div>


    <div class="container-fluid mt-4">

      <div class="row">
        <div class="col-11">
          <h1>Update Admin Password</h1>
        </div>
      </div>

      <div class="row mt-3">
        <di class="col-5">
          <form action="" method="POST">
          <div class="mb-3">
              <label class="form-label">Currennt Password</label>
              <input type="password" name="current_password" class="form-control"  placeholder="Enter your Current Password">
            </div>
            <div class="mb-3">
              <label class="form-label">New Password</label>
              <input type="password" name="new_password" class="form-control"  placeholder="Enter your New Password">
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm your New Password">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Update Password</button>
          </form>
        </di>
      </div>
    </div>
  </section>
  <?php include('partials/footer.php') ?>

  <?php 
if(isset($_POST['submit'])) {
    // Ensure $id is set and numeric to prevent SQL errors
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Invalid User ID</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
        exit();
    }

    $id = intval($_POST['id']); // Convert to integer to prevent SQL issues
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Check if user exists
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
    $res = mysqli_query($conn, $sql);

    if($res) {
        $count = mysqli_num_rows($res);

        if($count == 1) {
            if($new_password == $confirm_password) { // Fix: Check if new password matches confirm password
                $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);

                if($res2){
                    $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Password Updated Successfully</div>";
                } else {
                    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Password wasn't Updated, Contact Support</div>";
                }
                header("location:".SITEURL.'admin/manage-admin.php');
            } else {
                $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>New Passwords Do Not Match</div>";
                header("location:".SITEURL.'admin/update-password.php');
            }
        } else {
            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>User Not Found or Incorrect Password</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
}
?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>