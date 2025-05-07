<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Dashboard</title>
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
    <h1>Dashboard</h1>

    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-2 bg-dark text-white rounded-3 p-4 text-center mx-2">
          <?php 
           $sql = "SELECT * from tbl_admin";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
          ?>
          <h3><?php echo $count ?></h3>Admin
        </div>
        <div class="col-2 bg-dark text-white rounded-3 p-4 text-center mx-2">
        <?php 
           $sql = "SELECT * from tbl_project";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
          ?>
          <h3><?php echo $count ?></h3>Projects
        </div>
        <div class="col-2 bg-dark text-white rounded-3 p-4 text-center mx-2">
        <?php 
           $sql = "SELECT * from tbl_artist";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
          ?>
          <h3><?php echo $count ?></h3>Artist
        </div>
        <div class="col-2 bg-dark text-white rounded-3 p-4 text-center mx-2">
        <?php 
           $sql = "SELECT * from tbl_blog";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
          ?>
          <h3><?php echo $count ?></h3>Blog
        </div>
      </div>
    </div>
  </section>



  <?php include('partials/footer.php') ?> 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>