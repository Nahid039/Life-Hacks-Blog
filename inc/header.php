<?php
	
	$filepath = realpath(dirname(__FILE__));
	//echo $filepath;
	include_once $filepath.'/../lib/Session.php';
	Session::init();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Basic Website</title>

	<meta charset="utf-8">
	<meta name="keywords" content="HTML CSS">
	<meta name="Author" content="Md. Nahid Hasan">
	
	<!-- <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'> -->
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="inc/jquery.min.js"></script>
	<script type="text/javascript" src="inc/bootstrap.min.js"></script>

</head>

<?php
	
	if(isset($_GET['action']) && $_GET['action']=="logout"){
		Session::destroy();
	}
?>

<body>
	<div class="headersection clear">
		<div class="logo">
			<img src="img/logo-3.jpg">
			<h2>Welcome</h2>
			<h3>Life Hack's Blog</h3>
		</div>
		<div class="social">
			<a href="#"><img src="img/twlogo.png"></a>
			<a href="#"><img src="img/instalogo.jpg"></a>
			<a href="#"><img src="img/fblogo.png"></a>
		</div>
		
	</div>

	<div class="navsection clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Services</a>
				<ul>
					<li><a class="dropdown-item" href="">Service one</a></li>
					<li><a class="dropdown-item" href="">Service two</a></li>
					<li><a class="dropdown-item" href="">Service three</a></li>
					<li><a class="dropdown-item" href="">Service four</a></li>
				</ul>
			</li>
			<?php
				$id = Session::get('id');
				$userlogin = Session::get('login');
				if($userlogin){
			?>
					<li><a href="post.php">Post</a></li>
				<?php }?>

			<li><a href="about.php">About</a></li>
		</ul>
		<ul class="lr">
			<?php
				$id = Session::get('id');
				$userlogin = Session::get('login');
				if($userlogin){
			?>
					<li><a href="profile.php?action=update&id=<?php echo $id; ?>">Profile</a></li>
					<li><a href="?action=logout">Logout</a></li>
				<?php }else{?>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
				<?php } ?>
		</ul>
	</div>