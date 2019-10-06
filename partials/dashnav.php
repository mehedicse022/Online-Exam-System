
<div class="mainmenu_area">
		<div class="mainmenu">
			<ul id="nav">
				<li><a href="profile.php"> Profile </a></li>
				<li><a href="exam.php"> Exam </a></li>
				<li><a href="logout.php"> logout </a></li>
				<li style="color: white;"><?php echo $_SESSION['username']; ?></li>


			</ul>

		</div>
		<span style="color:green;float:right">
     					Welcome <strong><?php echo $_SESSION['username']; ?></strong>
 					</span>
	</div>


