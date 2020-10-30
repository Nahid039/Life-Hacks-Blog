<?php
  include "inc/header.php";
  include "lib/User.php";
?>
<?php
  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
      $user->userLogin($_POST);
  }
?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>User Login</h2>
      </div>

      <div class="panel-body">
        <form action="" method="POST">
          <div style="max-width: 600px; margin: 0 auto; ">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" required="">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </div>
        </form>
    </div>
  </div>
</body>

<!-- <?php
  include "inc/footer.php";
?> -->