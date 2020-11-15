<?php
include 'inc/header.php';
include "lib/User.php";
include "helpers/Format.php";

$user = new User();
$fm = new Format();

?>

	<div class="slidesection clear">
		 <div id="slider">
            <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="Beauty of Nature" /></a>
        </div>
	</div>
	<div class="contentsection clear">
		<div class="maincontent clear">
			<?php
			$i=0;
				foreach ($user->select() as $result) {
	        		$i++;
	        ?>
			<div class="samepost clear">
				<h2><?php echo $result['title']; ?></h2>
				<p><?php echo $result['date']; ?><a href=""><?php echo ", Posted by ".$result['author']; ?></a></p>
				<img src="admin/upload/<?php echo $result['image']; ?>">
				<p><?php echo $fm->textShorten($result['body']); ?></p>
				<div class="readmore">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>

		<?php } ?>
		</div>

		<div class="sidebar clear">
			<div class="samesidebar">
			<h2>Latest Articles</h2>
				<ul>
					<li><a href="#">Post title one will go here</a></li>
					<li><a href="#">Post title two will go here</a></li>
					<li><a href="#">Post title three will go here</a></li>
					<li><a href="#">Post title four will go here</a></li>
					<li><a href="#">Post title five will go here</a></li>
					<li><a href="#">Post title six will go here</a></li>
				</ul>
			</div>

			<h2>Sidebar header Two</h2>
			<p>
				Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.
			</p>
			<p>
				Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.
			</p>
			<h2>Sidebar header Three</h2>
			<p>
				Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.
			</p>
			<p>
				Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.Sidebar text will go here.
			</p>
			
		</div>
	</div>

	<?php
	include 'inc/footer.php';
	?>