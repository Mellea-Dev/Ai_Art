 <?php
  include('db.php');
   $uploadpro_dir = 'uploadpro/';
?>
<aside class="lib-aside text-center" role="complementary" style=" background-image: linear-gradient( to top left, #f89b9e, #f89b9e 0%, #c9d9ff 74%);">
			<h1 id="lib-logo" style="color: inherit">
				<span id="rubberBand" class="fa-stack fa-2x"><i class="fas fa-palette fa-stack-2x"></i><i class="fas fa-paint-brush fa-stack-1x fa-inverse"></i></span><br><p id="swing">Ai Art</p>
			</h1>
			
			<nav class="lib-main-menu" role="navigation">
				<ul>
					<li><a href="artist-dashboard.php">My Dashboard</a></li>
					<li><a href="artist-gallery.php">Gallery</a></li>
					<li><a href="artist-commission.php">Commission Request</a></li>
					<li><a href="artist-profile-set.php">Profile Settings</a></li>
					<li><a href="logout_in.php">Log Out</a></li>
				</ul>
			</nav>
		   <?php
               	 $sql = "select * from admin where idadmin=".$id." ";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $adid=$row['idadmin']; 
                 $un=$row['username'];
                 $pass=$row['password'];
                 $em=$row['email'];
                 $fn=$row['fname'];
                 $mn=$row['mname'];
                 $ln=$row['lname'];
                 $gen=$row['gender'];
                 $bd=$row['bday'];
               ?>
			<div class="lib-footer">
			    <img class="rounded-circle profile-aside" src="<?php echo $uploadpro_dir.$row['aprofilepic']; ?>" alt="Edgy image">
				<div class="d-flex justify-content-center">
					<h3>Welcome <?php print $ur; ?> </h3> 			
				</div>
			</div>
</aside>