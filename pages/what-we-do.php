<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A1 Media - What we do</title>
  <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
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
<?php include ('../partials-front/navbar.php'); ?>

  <div class="top-banner top-banner-3 mb-5">
    <div class="position-absolute top-50 start-50 translate-middle header-text text-center">
      <h1>WHAT WE ARE GOOD AT</h1>
    </div>
  </div>

  <div class="top-text mb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-start">
          <p id="typewriter"> Our vision is to create a world-class, reliable working platform between brands and the
            public. Our core
            values are diligence, integrity, innovation, passion, and teamwork.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="projects mb-lg-5 mb-3">
    <div class="container-fluid text-start">
      <div class="row g-2">
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>ARTIST BOOKINGS</h3>
            <p id="typewriter">We can book any of your desired Nigerian artists for your various events anywhere across the world at the
            best rate with stress free engagement, management and co-ordination.</p>
            <p></p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>ASSET & CONTENT CREATION</h3>

            <p id="typewriter">Our in-house photography, videography and editing team produce cutting-edge social media
              assets for your
              brand, which can be optimised for each platform that you work with. whether you need campaign photos, an
              original branded video or repurposed influencer content - we've got you covered. Photo shoots, Brand
              Bible/Guidelines, Social Media Calendars,Electronic Press Kit, Look Books, Websites etc</p>

          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>CRISIS MANAGEMENT</h3> <p id="typewriter"> We are very prompt in Identifying, Measuring, Monitoring, Fixing, Repairing,
            Preventing, Response Management etc</p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>PUBLIC AND MEDIA RELATIONS</h3>  <p id="typewriter">Our dedicated creative strategists and content team work together to
            build a game plan that will amplify your story and meaningfully grow your online presence. We work to secure
            positive media coverage and exposure for your brand, leveraging our relationships with key journalists and
            influencers to get your story told.</p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>SOCIAL MEDIA ADS & CAMPAIGNS</h3> <p id="typewriter">We develop and execute social media strategies that engage your target
            audience, build brand awareness, and drive business results.</p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="p-lg-3 py-2">
            <h3>REPORTING</h3>
            <p id="typewriter">Our reports measure how audiences are engaging with your social presence and provide you
            with a clear understanding of the key performance metrics that are most important to you. we analyse trends
            in your audience growth, demographics, and interactions to continuously improve our strategies and maximise
            your roi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const elements = document.querySelectorAll("#typewriter");
      const speed = 20; // Typing speed in milliseconds

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



  <div class="contact-banner banner-2 text-center ">
    <button class="white-button position-absolute top-50 start-50 translate-middle header-text text-center">LETS HANDLE
      YOUR NEXT PROJECT</button>
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