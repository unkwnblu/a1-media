<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1 Media - Our Artists</title> 
    <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include ('../partials-front/navbar.php'); ?>

          <div class="top-banner top-banner-6 mb-5">
            <div class="position-absolute top-50 start-50 translate-middle header-text text-center">
                <h1>MUSIC COLLABS</h1>
            </div>
          </div>

          <div class="top-text">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 text-center">
                  <p>These are some Amazing  Acts we work with currently</p>
                </div>
              </div>
            </div>
          </div>
          

          <div class="projects mb-lg-5">
            <div class="container-fluid pt-lg-5 pt-3">
                <div class="row text-center">
                <?php 
      $sql = "SELECT * FROM tbl_artist WHERE active='Yes' ";

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

                  <div class="col-lg-2 col-6">
                  <?php 
                    if($image_name!= "") {
                      ?> 
                        <img src="<?php echo SITEURL;?>images/artists/<?php echo $image_name ?>" class="img-fluid" alt="<?php echo $title; ?>">
                      <?php
                    
                    } else {
                      echo "<div class='text-danger'>Image Not Found</div>";
                    }
                  ?>
                    <p><?php echo $title; ?></p>
                  </div>
                  <?php
          }
        } else {

        }
      }

      
    ?>
                </div>
              </div>
          </div>

          <footer>
            <div class="container-fluid p-3 text-center">
              <div class="row">
                <div class="col-lg-2 ">
                  PRIVACY POLICY
                </div>
                <div class="col-lg-8 ">
                  © 2025 A1 MEDIA GROUP
                </div>
                <div class="col-lg-2">
                  ALL RIGHTS RESEVERED
                </div>
              </div>
            </div>
          </footer>
    
</body>
</html>