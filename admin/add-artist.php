<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Add Artist</title>
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
          <h1>Add Artist</h1>
        </div>
      </div>
      <div class="row mt-3"> 
        <di class="col-5">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Fullname</label>
              <input type="text" name="title" class="form-control" placeholder="Enter Artist Name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Artist Image</label>
              <input type="file" name="image" class="form-control">
              <div id="emailHelp" class="form-text text-danger">Image should be a 1:1 ratio for best fit</div>
              <div id="emailHelp" class="form-text text-warning">Above 500 x 500</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Active :</label>
              <input type="radio" name="active" value="Yes"> Yes
              <input type="radio" name="active" value="No"> No
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Artist</button>
          </form>
        </di>
      </div>
    </div>
  </section>
  <?php include('partials/footer.php') ?>

  <?php 
    if(isset($_POST['submit'])) {
      $title = $_POST['title'];
      // $image_name = $_POST['image_name'];
      if(isset($_POST['active'])) {
        $active = $_POST['active'];
      } else {
        $active = "No";
      }

      if(isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];

        if($image_name != "") {

        

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path ="../images/artists/".$image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if($upload==false) {
          $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Artist, Contact Support</div>";
          header("location:".SITEURL.'admin/add-artist.php');
          die();
        }
      } else {
        $image_name="";
      }

      $sql = "INSERT INTO tbl_artist (title, image_name, active) VALUES ('$title','$image_name', '$active')";

      $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

      if($res) {
        $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Artist Information Uploaded</div>";
        header("location:".SITEURL.'admin/manage-artist.php');
        die(); 
      }
    } else {
      $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Artist, Contact Support</div>";
      header("location:".SITEURL.'admin/manage-artist.php');
    }
    } 
  ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>