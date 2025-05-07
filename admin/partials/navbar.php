  <?php
  
    ob_start();
    include('../config/constants.php');
    include('login-check.php');
    
  
  ?>
   
  <nav class="navbar navbar-expand-lg px-5 py-3">
    <div class="container-fluid">
      <a class="navbar-brand mx-5" href="#">
        <img src="../logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"> Dashboard </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="manage-admin.php"> Admin </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-artist.php">Artist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-project.php">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-blog.php">Blog</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="navbar-text" href="logout.php">Log-Out</a>
          
        </span>
      </div>
    </div>
  </nav>
