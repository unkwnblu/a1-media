<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>A1 Media - Manage Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="admin.css" />
    <link rel="shortcut icon" href="../logo.svg" type="image/x-icon" />
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
            <h1>Manage Admin</h1>
          </div>
          <div class="col-1">
            <a href="add-admin.php">
              <button type="button" class="btn btn-primary">
                Add Admin
              </button></a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">S.N</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Username</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php 
            $sql = "SELECT * FROM tbl_admin";

            $res = mysqli_query($conn, $sql);

            if($res) {
              $count = mysqli_num_rows($res);

              $sn=1;

              if($count>0) { while($rows=mysqli_fetch_assoc($res)){
                $id=$rows['id']; $full_name=$rows['full_name'];
                $username=$rows['username']; ?>
                <tr>
                  <th scope="row"><?php echo $sn++; ?></th>
                  <td><?php echo $full_name; ?></td>
                  <td><?php echo $username; ?></td>
                  <td>
                    <a
                      href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"
                      ><button type="button" class="btn btn-primary">
                        Change Password
                      </button></a
                    >
                    <a
                      href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
                      ><button type="button" class="btn btn-secondary">
                        Edit Details
                      </button></a
                    >
                    <a
                      href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
                      ><button type="button" class="btn btn-danger">
                        Delete Admin
                      </button></a
                    >
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
        </div>
      </div>
    </section>

    <?php include('partials/footer.php') ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
