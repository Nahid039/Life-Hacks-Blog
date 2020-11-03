<?php
include "inc/header.php";
include "lib/User.php";

$user = new User();
//Session::checkSession();
?>

<?php
      $id = (int)$_GET['id'];
      $result = $user->postById($id);
?>
<div class="contentsection clear">
	<div class="maincontent clear">
			<div class="samepost clear">
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['date']; ?><a href=""><?php echo ", Posted by ".$result['author']; ?></a></p>
				<img src="img/image_1.jpg">
				<p><?php echo $result['body']; ?></p>
			</div>
			
	</div>
	<?php
		include "inc/sidebar.php";	
	?>
</div>

<?php
	include "inc/footer.php";	
?>