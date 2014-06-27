<nav class="top-bar" data-topbar>
	<ul class="title-area">
		<li class="name">
			<h1><a href="index.php">เมธี</a></h1>
		</li>
		<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

  <section class="top-bar-section">
	<!-- Right Nav Section -->
	<ul class="right">
		<?php if(isset($_SESSION['status'])){
			if($_SESSION["status"] === "ADMIN"){?>
				<li class="active"><a href="search.php">Search</a></li>
		<?php } } 
		if(isset($_SESSION['user_id'])){
		?>
		<li><a class="active" href="myVideos.php">คลังวีดีโอของฉัน</a></li>
		<li class="has-dropdown">
			<a href="#">Others</a>
			<ul class="dropdown">
				<li><a href="A.php">A</a></li>	
				<li><a href="B.php">B</a></li>
				<li><a href="C.php">C</a></li>
			</ul>
		</li>
		<li class="has-dropdown">
			<a href="#">Setting</a>
			<ul class="dropdown">
				<?php if(isset($_SESSION['status'])){
					if($_SESSION["status"] === "ADMIN"){?>
						<li><a href="admin_page.php">My Account</a></li>
					<?php
					}else if($_SESSION["status"] === "USER"){
					?>
						<li><a href="user_page.php">My Account</a></li>
					<?php
					}
				}
				?>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>
		<?php } ?>
	</ul>

	<!-- Left Nav Section -->
	<!--<ul class="left">
	  <li><a href="#">Left Nav Button</a></li>
	</ul>-->
	<ul class="left">
		<?php if(!isset($_SESSION["user_id"])){ ?>
		<li class="has-form">
			<form name="form1" method="post" action="check_login.php" data-abide>
				<div class="row collapse">
				<div class="large-4 small-4 columns">
					<input type="text" name="txtUsername" id="txtUsername" placeholder="Username">
				</div>
				<div class="large-4 small-4 columns">
					<input type="password" name="txtPassword" id="txtPassword" placeholder="Password">
				</div>
				<div class="large-4 small-4 columns">
					<input type="submit" name="Submit" value="Login">
				</div>
				</div>
			</form>
		</li>
		<li class="active"><a href="register.php">Register</a></li>
		<?php } ?>
	</ul>
  </section>
</nav>