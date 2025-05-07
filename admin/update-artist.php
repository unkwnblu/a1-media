<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Update Artist</title>
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
          <h1>Update Artist</h1>
        </div>
      </div>

          <?php
          if(isset($_GET['id'])) {

            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_artist WHERE id=$id";

            $res=mysqli_query($conn, $sql);
            
            $count = mysqli_num_rows($res);

                if($count==1) 
                {
                    $row=mysqli_fetch_assoc($res);

                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $active = $row['active'];
                
                } else {
                $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Artist Dosent Exist</div>";    
                header('location:' .SITEURL. 'admin/manage-artist.php');
            }
          }
             else {
              header('location:' .SITEURL. 'admin/manage-artist.php');
            }
          ?>

      <div class="row mt-3">
        <di class="col-5">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Artist Name</label>
              <input type="text" name="title" class="form-control" placeholder="<?php echo $title ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Current Artist Image : </label>
              <?php
              if($current_image!= "") {
                      ?> 
                        <img src="<?php echo SITEURL;?>images/artists/<?php echo $current_image ?>" alt="<?php echo $title; ?>" width="100" height="100">
                      <?php
                    
                    } else {
                      echo "<div class='text-danger'>Image Not Found</div>";
                    }
                  ?> </div>
            <div class="mb-3">
              <label class="form-label">Artist Image</label>
              <input type="file" name="image" class="form-control">
              <div id="emailHelp" class="form-text text-warning">Image should be a 1:1 ratio for best fit</div>
            </div>
            <div class="mb-3">
              <label class="form-label">Active :</label>
              <input <?php if($active=="Yes") { echo "checked";}?> type="radio" name="active" value="Yes"> Yes
              <input <?php if($active=="No") { echo "checked";}?> type="radio" name="active" value="No"> No
            </div>

            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Update Artist</button>
          </form>
        </di>
      </div>
    </div>
  </section>
  <?php include('partials/footer.php') ?>

  <?php 
if(isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title = !empty($_POST['title']) ? $_POST['title'] : $row['title']; // Retain previous title if not updated
  $current_image = $_POST['current_image'];
  $active = $_POST['active'];

  if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
      $image_name = $_FILES['image']['name'];
      $source_path = $_FILES['image']['tmp_name'];
      $destination_path = "../images/artists/" . $image_name;
      $upload = move_uploaded_file($source_path, $destination_path);

      if($upload == false) {
          $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Artist, Contact Support</div>";
          header("location:".SITEURL.'admin/manage-artist.php');
          die();
      }

      if($current_image != "") {
          $remove_path = "../images/artists/" . $current_image;
          $remove = unlink($remove_path);
          if($remove == false) {
              $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed Remove Current Image, Contact Support</div>";
              header("location:".SITEURL.'admin/manage-artist.php');
              die();
          }
      }
  } else {
      $image_name = $current_image;
  }

  $sql2 = "UPDATE tbl_artist SET
      title = '$title',
      image_name = '$image_name',
      active = '$active'
      WHERE id='$id'";

  $res2 = mysqli_query($conn, $sql2);

  if($res2) {
      $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Artist Updated Successfully</div>";
      header("location:".SITEURL.'admin/manage-artist.php');
  } else {
      $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Update Artist, Contact Support</div>";
      header("location:".SITEURL.'admin/manage-artist.php');
  }
}


  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>