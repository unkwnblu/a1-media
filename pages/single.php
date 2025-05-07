<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>A1 Media</title>
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

    <?php 
        if(isset($_GET['id'])) {

            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_project WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1) {

                $rows=mysqli_fetch_assoc($res);

                $title=$rows['title'];
                $thumbnail=$rows['thumbnail'];
                $body = $rows['body'];
                $img_1=$rows['img_1'];
                $active=$rows['active'];
                $video = $rows['video'];
                $video_2 = $rows['video_2'];
                $video_3 = $rows['video_3'];
        } else {
                    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Project Dosent Exist</div>";    
                    header('location:' .SITEURL. 'pages/projects.php');
                }
            } else {
                header('location:' .SITEURL. 'pages/projects.php');
            }

  ?>

    <div class="top-bannerr container">
        <div class="row">
            <div class="col">
                <p><sub> <a class="text-reset" href="<?php echo SITEURL; ?>pages/projects.php">< back</a></sub></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1><?php echo $title ?></h1>
            </div>
        </div>
      </div>


      <div class="container mt-5 mb-5 pb-5 text-start">
      <div class="row">
        <div class="col-12">
        <?php echo $body ?>
        </div>
        </div>
        <div class="row pb-5">
            
            <?php 
        if (!empty($rows['img_1'])) { // Corrected variable name
            $img1_array = json_decode($rows['img_1'], true); // Decode JSON
            if (!empty($img1_array)) { 
                foreach ($img1_array as $img) {
                    ?>
                    <div class="col-lg-3 col-6 pb-3">
                    <img class="img-fluid" src="<?php echo SITEURL; ?>images/projects/<?php echo $img; ?>">
                    </div>
                    <?php
                            }
                        } else {
                            echo "<div class='text-danger'></div>";
                        }
                    } else {
                        echo "<div class='text-danger'></div>";
                    }
                    ?>
            
        </div>

        <div class="row" >
            <div class="col-lg-4">
                <?php echo $video ?>
            </div>
            <div class="col-lg-4">
                <?php echo $video_2 ?>
            </div>
            <div class="col-lg-4">
                <?php echo $video_3 ?>
            </div>
        </div>
        
        </div>
        


        <div class="contact-banner banner-2 text-center ">
    <button class="white-button position-absolute top-50 start-50 translate-middle header-text text-center">LETS HANDLE
      YOUR NEXT PROJECT</button>
  </div>
</body>
</html>

