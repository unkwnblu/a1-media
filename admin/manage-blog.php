<?php ob_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Manage Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
</head>
  <body>
  
  <?php include('partials/navbar.php') ?> 
<section class="px-5 mx-5 my-5">

  

  <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-11">
            <h1>Manage Blog</h1>
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-primary">Add Post</button>
        </div>
    </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Title</th>
      <th scope="col">Image 1</th>
      <th scope="col">Image 2</th>
      <th scope="col">Image 3</th>
      <th scope="col">Active</th>
      <th scope="col">Posted On</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>
        <button type="button" class="btn btn-secondary">Edit Post</button>
        <button type="button" class="btn btn-danger">Delete Post</button>
      </td>
    </tr>
  </tbody>
</table>
  </div>
</section>

<?php include('partials/footer.php') ?> 




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>