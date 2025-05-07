<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A1 Media is an Entertainment company full of Art and Music Lovers.">
  <meta name="keywords" content="Music Lovers, A1 Media,Top Entertainment, News Blog, Social Gathering">
  <meta name="robots" content="index, follow">

  <meta property="og:title" content="A1 Media - We are Dreamers">
  <meta property="og:description" content="A1 Media is an Entertainment company full of Art and Music Lovers.">
  <meta property="og:image" content="https://thea1media.com/logo.png">
  <meta property="og:url" content="https://thea1media.com">
  <meta property="og:type" content="website">



  <title>A1 Media</title>
  <link rel="shortcut icon" href="logo.svg" type="image/x-icon" alt="A1 Media"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include ('partials-front/index-nav.php'); ?>


  <div class="header-video mb-5">
    <video preload="auto" loop autoplay muted playsinline width="100%" height="100%" class="object-fit-cover">
      <source src="intro.mp4" type="video/mp4">
    </video>

  </div>


  <div class="top-text">
    <div class="container-fluid pt-3">
      <div class="row">
        <div class="col-12 text-center">
          <p id="typewriter">We are an Entertainment company full of Art and Music Lovers. We are Dreamers of all kinds and Passionate
            about Creating the most Unique Experiences Ever.</p>


          <p id="typewriter">OUR VALUES REPRESENT THE CORNERSTONES OF OUR CULTURE. ROOTED IN A RICH HISTORY AND FUTURE FOCUSED, WE ARE
            LED BY PRINCIPLES THAT DEFINE OUR DECISIONS AND INSPIRE US DAY AFTER DAY.</p>

        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const elements = document.querySelectorAll("#typewriter");
      const speed = 10; // Typing speed in milliseconds

      elements.forEach(element => {
        const text = element.innerHTML;
        element.innerHTML = "";
        let index = 0;

        function typeWriter() {
          if (index < text.length) {
            element.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, speed);
          }
        }

        typeWriter();
      });
    });
  </script>

  <div class="reviews text-center pt-5">
    <h2>WHAT SETS US APART</h2>
    <div class="container-fluid p-5">
      <img src="<?php echo SITEURL . 'static-img/reviews.svg'; ?>" class="img-fluid" alt="">
    </div>
  </div>

  <div class="mobile-reviews">
  <div class="container-fluid my-4">
    <h2 class="text-center mb-3 mb-md-5">WHAT SETS US APART</h2>
    <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
          <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
            <div class="carousel-caption d-block">
              <h5>Adetolu Tayo</h5>
              <p>I’ve never felt more welcomed and valued by a company before! Their commitment to diversity and inclusion truly shines through in everything they do.</p>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
            <div class="carousel-caption d-block">
              <h5>Stephanie Opara</h5>
              <p>From start to finish, I felt like I was part of something bigger. Their dedication to inclusion isn’t just a statement—it’s a way of life!</p>
            </div>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
            <div class="carousel-caption d-block">
              <h5>Sylvester T</h5>
              <p>Highly recommend! Not only are their services top-notch, but the sense of community they build is unlike anything I’ve seen before.</p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>


  <div class="socials text-center mb-lg-5 mb-3 ">
    <h2>SPOT US ON SOCIALS</h2>
    <div class="container-fluid pt-lg-5 pt-3">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-2">
          <a href="https://www.instagram.com/p/DFh2zY_tVoZ/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
            <img src="<?php echo SITEURL . 'static-img/ig-1.jpg'; ?>" class="img-fluid" alt="A1 Media">
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-2">
          <a href="https://www.instagram.com/p/DGDC3p7tuwj/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
            <img src="<?php echo SITEURL . 'static-img/ig-2.jpg'; ?>" class="img-fluid" alt="A1 Media">
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-2">
          <a href="https://www.instagram.com/p/C_LW-v4tL8l/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
            <img src="<?php echo SITEURL . 'static-img/ig-3.jpg'; ?>" class="img-fluid" alt="A1 Media">
          </a>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-2">
          <a href="https://www.instagram.com/p/C_LaP4QNEYS/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
            <img src="<?php echo SITEURL . 'static-img/ig-4.jpg'; ?>" class="img-fluid" alt="A1 Media">
          </a>
        </div>
      </div>
    </div>

  </div>

  <div class="contact-banner banner-1 text-center ">
    <div class="position-absolute top-50 start-50 translate-middle">
      <h2>HIT US UP</h2>
      DROP US A MESSAGE, WE DON'T BITE <br>
      <button class="white-button mt-lg-4 mt-3">DM A1</button>
    </div>

  </div>

  <footer>
    <div class="container-fluid p-3 text-center">
      <div class="row">
        <div class="col-lg-2">
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>