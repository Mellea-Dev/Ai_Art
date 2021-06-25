<?php
  include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="fontawesome/css/all.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-4.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styleko.css">
<link rel="stylesheet" href="css/ll.css">
<title>Ai Art Login</title>
</head>

<body>

      <div class="lib-page">
       <aside class="lib-aside text-center" role="complementary">
			<h1 id="lib-logo" style="color: inherit">
				<span class="fa-stack fa-2x"><i class="fas fa-palette fa-stack-2x"></i><i class="fas fa-paint-brush fa-stack-1x fa-inverse"></i></span><br>Ai Art
			</h1>
			<nav class="lib-main-menu" role="navigation">		 
				<form method="post" action="login_in.php">
				
					<div class="form-group">        
						<div class="input-group">    
	 		              <input type="text" name="username" value="" class="form-control"  placeholder="Username"> 
	 		               <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                             </span>                    
                           </div> 
                        </div>     
					</div>  
					<div class="form-group">        
						<div class="input-group">    
	 		              <input type="password" name="password" value="" class="form-control"  placeholder="Password"> 
	 		               <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                             </span>                    
                           </div> 
                        </div>     
					</div>
					<div class="d-flex justify-content-center">  
					<button type="submit" name="login" class="btn btn-ai">
						Sign In
					</button>
					</div>
				</form>
			</nav>
			
			<div class="lib-footer">
			    <br>
				<h3>Create your Account</h3>
				<div class="d-flex justify-content-center">
					<button type="button" class="btn btn-ai" data-toggle="modal" data-target="#myModal">  Join Us!! </button> 						
				</div>
			</div>
		</aside>
		
		<div class="lib-main">
			 <div class="bd-example">
               <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                 <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                 <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                   <img style="height: 100%;" class="d-block w-100"  alt="First slide [900x300]" src="sky.gif" data-holder-rendered="true">
                   <div class="carousel-caption d-none d-md-block">
                    <h3>Welcome to Ai Art</h3>
                    <h6>Let's Explore the Wonderful World of Art in Ai Art</h6>
                   </div>
                  </div>
                  <div class="carousel-item">
                    <img style="height: 100%;" class="d-block w-100"  alt="First slide [900x300]" src="drawings.gif" data-holder-rendered="true">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Artwork</h3>
                      <h6>Quality Artworks</h6>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img style="height: 100%;" class="d-block w-100"  alt="First slide [900x300]" src="nor.jpg" data-holder-rendered="true">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Artist</h3>
                      <h6>Let's Explore the Wonderful World of Art in Ai Art</h6>
                    </div>
                  </div>
                 </div>
                 <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                 </a>
                 <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                 </a>
                </div>
              </div>
            </div>	
	</div>
	<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content md-content-bg">
        <div class="modal-header">
          <h4 class="modal-title" style="color:white">Register to Join</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body"> 
        <?php include('add.php'); ?>
          <form action="add.php" method="post" class="p-5" style="background-image: linear-gradient( to top left, #f67e7d,#f27d4e,orange)" enctype="multipart/form-data">

	              
                  <div class="form-group">
                    <span class="img-div">
              <img src="blank-profile.jpg" onClick="triggerClick()" id="profileDisplay" class="img-thumbnail align-self-center pb-5">
              <div class="btn btn-ai"  onClick="triggerClick()">
                <h4>Upload Profile</h4>
              </div>
              <input type="file" name="image" onChange="displayImage(this)" id="image" class="form-control" style="display: none;">
            </span>
                  </div>

	              <div class="form-group">

	                <input type="text" name="username" class="form-control" placeholder="Username">
	              </div>
	              
	              <div class="form-group">
	            
	                <input type="password" name="password" class="form-control" placeholder="Password">
	              </div>
	            
	              <div class="form-group">
	            
	                <input type="email" name="email" class="form-control" placeholder="e-mail">
	              </div>
	              
	              <div class="form-group">
	                <input type="text" name="fname" class="form-control" placeholder="First Name">
	              </div>
	              
	              <div class="form-group">
	                <input type="text" name="mname" class="form-control" placeholder="Middle Name">
	              </div>
	              
	              <div class="form-group">
	              	
	                <input type="text" name="lname" class="form-control" placeholder="Last Name">
	              </div>
	              
	              <div class="form-group">
	                <select name="gender" class="form-control" id="sel1">
				        <option>Gender</option>
				        <option disabled>-------</option>
				        <option>Male</option>
				        <option>Female</option>
				      </select>
	              </div>
	              
	              <div class="form-group">
	              	
	                <input type="date" name="bday" class="form-control" placeholder="Birth Date">
	              </div>
	              
	              <div class="form-group">
	              	
	                <select name="level" class="form-control" id="sel1">
				        <option>Type of Account</option>
				        <option disabled>-------</option>
				        <option>User</option>
				        <option>Artist</option>
		
				      </select>
	              </div>
	              
	              <div class="form-group">
	                <button type="submit" name="Join"  class="btn btn-ai py-3 px-5">Join</button> 
	              </div>
	      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  	if(<%=emptyfield%>){
  		$('#myModal').modal('show'); 
  	}
    
  
});
</script>
<script>
	function triggerClick(e) {
  document.querySelector('#image').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}</script>
</body>
</html>