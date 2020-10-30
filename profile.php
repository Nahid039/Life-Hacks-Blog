<?php
  include "inc/header.php";
  include "lib/User.php";
?>

<?php

  $user = new User();
  if(isset($_POST['update'])){
    $user->update($_POST);
  }

?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>User Profile <span class="pull-right"></span></h2>
      </div>

      <?php
        if(isset($_GET['action']) && $_GET['action'] == 'update'){
          $id = (int)$_GET['id'];
          $result = $user->readById($id);
      ?>

      <div class="panel-body">
        <form action="" method="POST">
          <div style="max-width: 600px; margin: 0 auto; ">
            <input type="hidden" class="form-control" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
              <label for="name">Your Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $result['username']; ?>">
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
  <?php }?>
  </div>
</body>

<!-- <?php
  include "inc/footer.php";
?> -->