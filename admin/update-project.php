<?php ob_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A1 Media - Update Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <link rel="shortcut icon" href="../logo.svg" type="image/x-icon">
  <script src="https://cdn.tiny.cloud/1/5kviwdkkll675qzbkrmsefll502sow24vqug3x8vz2m63h5y/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
  <?php  include('partials/navbar.php'); ?>

  <section class="px-5 mx-5 my-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-5">
          <?php 
          if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
          ?>
        </div>
      </div>
    </div>

    <div class="container-fluid mt-4 mb-5 pb-5">
      <div class="row">
        <div class="col-11">
          <h1>Update Project</h1>
        </div>
      </div>
      <?php 
        if(isset($_GET['id'])) {

            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_project WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1) {

                $row=mysqli_fetch_assoc($res);

                $title = $row['title'];
                $current_thumbnail = $row['thumbnail'];
                $body = $row['body'];
                $current_img_1 = $row['img_1'];
                $active = $row['active'];
        } else {
                    $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Project Dosent Exist</div>";    
                    header('location:' .SITEURL. 'admin/manage-project.php');
                }
            } else {
                header('location:' .SITEURL. 'admin/manage-project.php');
            }

  ?>
      <div class="row mt-3">
        <div class="col-12 col-lg-7">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label>Title</label>
              <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
            </div>


            <div class="mb-3">
              <label>Current Thumbnail</label><br>
              <?php
if ($current_thumbnail != "") {
?>
  <img src="<?php echo SITEURL; ?>images/projects/thumb/<?php echo $current_thumbnail; ?>" alt="<?php echo $title; ?>" width="100" height="100">
<?php
} else {
  echo "<div class='text-danger'>Image Not Found</div>";
}
?>
              <input type="file" name="banner" class="form-control mt-2">
            </div>

            <div class="mb-3">
              <label>Project Body</label>

                <textarea name="body">
                  <?php echo $body; ?>
                </textarea>

            </div>

            <div class="mb-3">
              <label>Current Additional Images</label><br>
              <?php
$current_img_1 = json_decode($row['img_1'], true);
if (!empty($current_img_1)) {
  foreach ($current_img_1 as $img) {
    if ($img != "") {
?>
      <img src="<?php echo SITEURL; ?>images/projects/<?php echo $img; ?>" alt="<?php echo $title; ?>" width="100" height="100" style="margin-right:5px;">
<?php
    }
  }
} else {
  echo "<div class='text-danger'>No Images Found</div>";
}
?>
              
            </div>

            <div class="mb-3">
              <label class="form-label">Active :</label>
              <input <?php if($active=="Yes") { echo "checked";}?> type="radio" name="active" value="Yes"> Yes
              <input <?php if($active=="No") { echo "checked";}?> type="radio" name="active" value="No"> No
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="current_thumbnail" value="<?php echo $current_thumbnail; ?>">

            <button type="submit" name="submit" class="btn btn-primary">Update Project</button>
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
  
  <?php include('partials/footer.php'); ?>
  
 <?php 
 
  if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    if(isset($_POST['active'])) {
      $active = $_POST['active'];
    } else {
      $active = "No";
    }

    if(isset($_FILES['thumb']['name'])) {
      $thumbnail = $_FILES['thumb']['name'];

      if($thumbnail != "") {
          $source_path = $_FILES['thumb']['tmp_name'];

          $destination_path ="../images/projects/thumb/".$thumbnail;

          $upload = move_uploaded_file($source_path, $destination_path);

          if($upload==false) {
            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Upload Thumbnail, Contact Support</div>";
            header("location:".SITEURL.'admin/manage-project.php');
            die();
          }

          if($current_thumbnail != ""){
            $remove_path = "../images/projects/thumb/".$current_thumbnail;
          $remove = unlink($remove_path);

          if($remove==false) {
            $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed Remove Current Image, Contact Support</div>";
            header("location:".SITEURL.'admin/manage-project.php');
          }
          }
          
      } else {
        $thumbnail = $current_thumbnail;
      }
    } else {
      $thumbnail = $current_thumbnail;
    }
      
  $sql2 = "UPDATE tbl_project SET
  title = '$title',
  thumbnail = '$thumbnail',
  body = '$body',
  active = '$active'
  WHERE id='$id'";

      $res2 = mysqli_query($conn, $sql2);

      if($res2) {
        $_SESSION['success'] = "<div class='text-bg-success rounded-3 p-3'>Project Updated Successfully</div>";
        header("location:".SITEURL.'admin/manage-project.php');
      } else {
        $_SESSION['error'] = "<div class='text-bg-danger rounded-3 p-3'>Failed to Update Project, Contact Support</div>";
        header("location:".SITEURL.'admin/manage-project.php');
      }
    }
 ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>