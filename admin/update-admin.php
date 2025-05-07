<?php ob_start(); ?>
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
          if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
        ?>
    </div>
  </div>
</div>


    <div class="container-fluid mt-4">

      <div class="row">
        <div class="col-11">
          <h1>Update Admin</h1>
        </div>
      </div>

          <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE id=$id";
            $res=mysqli_query($conn, $sql);

            if($res) {
                $count = mysqli_num_rows($res);

                if($count==1) 
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                
                } else {
                  $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Admin Dosent Exist</div>";
      
                header('location:' .SITEURL. 'admin/manage-admin.php');
            }
        }
          ?>

      <div class="row mt-3">
        <di class="col-5">
          <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label">Fullname</label>
              <input type="text" name="full_name" class="form-control" placeholder="<?php echo $full_name ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="<?php echo $username ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Update Admin</button>
          </form>
        </di>
      </div>
    </div>
  </section>
  <?php include('partials/footer.php') ?>

  <?php 
    if(isset($_POST['submit'])) {
      $id = $_POST['id'];
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];

      $sql = "UPDATE tbl_admin SET
      full_name = '$full_name',
      username = '$username'

        WHERE id='$id'
      ";

      $res = mysqli_query($conn, $sql);

      if($res) {
        $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Admin Update Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
      $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Update Admin, Contact Support</div>";
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    } 
  ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>