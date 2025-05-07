<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Manage Artist</title>
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
  

  <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-11">
            <h1>Manage Artist</h1>
        </div>
        <div class="col-1">
            <a href="add-artist.php"><button type="button" class="btn btn-primary">Add Artist</button></a>
        </div>
    </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Artist Image</th>
      <th scope="col">Displayed</th>
      <th scope="col">Actions</th> 
    </tr>
  </thead>
  <tbody>
    <?php 
      $sql = "SELECT * FROM tbl_artist";

      $res = mysqli_query($conn, $sql);

      if($res) {
        $count = mysqli_num_rows($res);

        $sn=1;

        if($count>0) {
          while ($rows=mysqli_fetch_assoc($res)) {
            $id=$rows['id'];
            $title=$rows['title'];
            $image_name=$rows['image_name'];
            $active=$rows['active']; ?>

            <tr>
                  <th scope="row"><?php echo $sn++; ?></th>
                  <td><?php echo $title; ?></td>
                  <td><?php 
                    if($image_name!= "") {
                      ?> 
                        <img src="<?php echo SITEURL;?>images/artists/<?php echo $image_name ?>" alt="<?php echo $title; ?>" width="100" height="100">
                      <?php
                    
                    } else {
                      echo "<div class='text-danger'>Image Not Found</div>";
                    }
                  ?></td>
                  <td><?php echo $active; ?></td>
                  <td>
                  <a href="<?php echo SITEURL; ?>admin/update-artist.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-secondary">Edit Details</button></a>
                  <a href="<?php echo SITEURL; ?>admin/delete-artist.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>"><button type="button" class="btn btn-danger">Delete Artist</button>
                  </td>
                </tr>
            <?php
          }
        } else {

        }
      }

      
    ?>


  </tbody>
</table>
  </div>
</section>

<?php include('partials/footer.php') ?> 




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>