<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Add Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
  <script src="https://cdn.tiny.cloud/1/5kviwdkkll675qzbkrmsefll502sow24vqug3x8vz2m63h5y/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
<!-- Database Connection included here -->
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


    <div class="container-fluid mt-4 b-4">

      <div class="row">
        <div class="col-11">
          <h1>Add Project</h1>
        </div>
      </div>
      <div class="row mt-3"> 
        <div class="col-md-8 col-lg-6">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control" placeholder="Project Title" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Thumbnail</label>
              <input type="file" name="thumb" class="form-control">
              <div id="emailHelp" class="form-text text-warning">Image should be a 4:5 ratio for best fit</div>
            </div>
            <div class="mb-3">
            <label class="form-label">Content</label>
              <textarea name="body">
                Input Body Text Here
              </textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Embed Video (Instagram, Tiktok e.t.c)</label>
              <input type="text" name="video_embed" class="form-control" placeholder="Paste embed link or iframe here">
              <div class="form-text text-info">Paste the full iframe code or embed link here.</div>
            </div>

            <div class="mb-3">
              <label class="form-label">Embed Video 2 (Instagram, Tiktok e.t.c)</label>
              <input type="text" name="video_embed_2" class="form-control" placeholder="Paste embed link or iframe here">
              <div class="form-text text-info">Paste the full iframe code or embed link here.</div>
            </div>

            <div class="mb-3">
              <label class="form-label">Embed Video 3 (Instagram, Tiktok e.t.c)</label>
              <input type="text" name="video_embed_3" class="form-control" placeholder="Paste embed link or iframe here">
              <div class="form-text text-info">Paste the full iframe code or embed link here.</div>
            </div>

            <div class="mb-3">
              <label class="form-label">Embed Video 4 (Instagram, Tiktok e.t.c)</label>
              <input type="text" name="video_embed_4" class="form-control" placeholder="Paste embed link or iframe here">
              <div class="form-text text-info">Paste the full iframe code or embed link here.</div>
            </div>

            <div class="mb-3">
              <label class="form-label">Images</label>
              <input type="file" name="img1[]" class="form-control" multiple>
              <div id="emailHelp" class="form-text text-danger">Image should be a 1:1 ratio for best fit</div>
            </div>

            
            <div class="mb-3">
              <label class="form-label">Active :</label>
              <input type="radio" name="active" value="Yes"> Yes
              <input type="radio" name="active" value="No"> No
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Project</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Apr 25, 2025:
      'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>

 <?php 

  if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $video = $_POST['video_embed'];
    $video_2 = $_POST['video_embed_2'];
    $video_3 = $_POST['video_embed_3'];
    $video_4 = $_POST['video_embed_4'];
    if(isset($_POST['active'])) {
      $active = $_POST['active'];
    } else {
      $active = "No";
    }
    if(isset($_FILES['thumb'])) {
      $thumbnail = $_FILES['thumb']['name'];
      if($thumbnail != "") {
        $source_path = $_FILES['thumb']['tmp_name'];
        $destination_path ="../images/projects/thumb/".$thumbnail;
        $upload = move_uploaded_file($source_path, $destination_path);
        if($upload==false) {
          $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Image, Contact Support</div>";
          header("location:".SITEURL.'admin/add-project.php');
          die();
        }
      } else {
        $thumbnail="";
      }

      if(isset($_FILES['img1'])) {
        $img1_files = $_FILES['img1'];
        $img1_names = []; // Array to store image names
    
        for ($i = 0; $i < count($img1_files['name']); $i++) {
            $img_name = $img1_files['name'][$i];
            if ($img_name != "") {
                $source_path = $img1_files['tmp_name'][$i];
                $destination_path = "../images/projects/".$img_name;
                if (move_uploaded_file($source_path, $destination_path)) {
                    $img1_names[] = $img_name; // Store image name
                } else {
                    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Image: $img_name</div>";
                    header("location:".SITEURL.'admin/add-project.php');
                    die();
                }
            }
        }
        // Convert array to JSON format before saving in DB
        $img_1 = json_encode($img1_names);
    } else {
        $img_1 = "";
    }



    $sql = "INSERT INTO tbl_project (title, thumbnail, active, body, img_1, video, video_2, video_3, video_4) 
    VALUES ('$title', '$thumbnail', '$active', '$body', '$img_1', '$video', '$video_2', '$video_3', '$video_4')";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
      if($res) {
        $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Project Uploaded</div>";
        header("location:".SITEURL.'admin/manage-project.php');
        die(); 
      }
    } else {
      $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Project, Contact Support</div>";
      header("location:".SITEURL.'admin/manage-project.php');
    }
    
  }
 ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>