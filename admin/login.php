<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A1 Media - Admin Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
<nav class="pt-3 pb-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-11 col-2">
            <img src="../logo.svg" alt="A1 Media" width="70" height="38">
        </div>

        <div class="col-lg-1 col-10">
          <div class="topnav pt-1">
            <a class="px-2" href="../index.php">Public</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

<section class="vh-100" style="background-color:rgb(12, 12, 12);">


  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-start">

            <h3>Sign in</h3>
            <div class="col-12 my-3">
       <?php 
          if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
          if(isset($_SESSION['login-error'])) {
            echo $_SESSION['login-error'];
            unset($_SESSION['login-error']);
          }
        ?>
    </div>
            <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter your Username">
            </div>
            <div class="mb-5">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control"  placeholder="Enter your Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
          </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html> 

<?php 
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password= md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1){
            $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Login successful</div>";
            $_SESSION['user'] = $username;
            
            header("location:".SITEURL.'admin/');
            
            
             // JavaScript Fallback (Will never run because of exit)
        echo "<script>window.location.href = '".SITEURL."admin/index.php';</script>";
            
        } else  {
            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Username or Password is Incorrect</div>";
            header("location:".SITEURL.'admin/login.php');
        }
    }
?>