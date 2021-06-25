<?php
  include('db.php');
   $uploadpro_dir = 'uploadpro/'; 
  session_start();
  if(!isset($_SESSION['ID'])){
  	header('location: login.php');
  }
  $ur=$_SESSION['user'];
  $id=$_SESSION['ID'];
 
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-4.css">
<link rel="stylesheet" href="css/styleko.css">
<link rel="stylesheet" href="css/ll.css">
<link rel="stylesheet" href="css/animate.css">

<title>Ai Art</title>
</head>

<body>
      <div class="lib-page">
       
		
		<div class="lib-main">
		<?php 
		include('aside-artist.php');
		$ur=$_SESSION['user'];
     $id=$_SESSION['ID'];     
		?>
		 <?php
                 $sql = "select * from admin where idadmin=".$id." ";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $row['idadmin']; 
                 $row['username'];
                 $row['password'];
                 $row['email'];
                 $row['fname'];
                 $row['mname'];
                 $row['lname'];
                 $row['gender'];
                 $row['bday'];
               ?>
		   <div class="card bg-artist m-5">
		   <h1 class="card-header">User Profile</h1>
	  
		    <div class="card-body">
		     <form class="p-5" action="artist-profile-set-in.php" method="POST" enctype="multipart/form-data">
          
		       <div class="row justify-content-center">
		         
             
		         <div class="col-sm-6">
		          <div class="form-group">           
		              
		               <img src="<?php echo $uploadpro_dir.$row['aprofilepic']; ?>" alt="Image" class="img-fluid card-img-top rounded-circle">
		               
		                <input type="hidden" name="id"  value="<?php echo $row['idadmin'] ?>" class="form-control"> 
						<div class="input-group-md pb-2">
						  <label  class="col-form-label-lg">Username:</label>  
	 		              <input type="text" name="username" value="<?php echo $row['username'] ?>"  class="form-control"> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">Password:</label>    
	 		              <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control"> 
                        </div> 
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">Email:</label>    
	 		              <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control"> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">FirstName:</label>    
	 		              <input type="text" name="fname" value="<?php echo $row['fname'] ?>" class="form-control"> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">MiddleName:</label>    
	 		              <input type="text" name="mname" value="<?php echo $row['mname'] ?>" class="form-control"> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">LastName:</label>    
	 		              <input type="text" name="lname" value="<?php echo $row['lname'] ?>" class="form-control"> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">Gender:</label>    
	 		              <select name="gender" class="form-control"  value="<?php echo $row['gender'] ?>">
                <option>Gender</option>
                <option disabled>-------</option>
                <option>Male</option>
                <option>Female</option>
              </select> 
                        </div>
                        <div class="input-group-md pb-2">
                          <label class="col-form-label-lg">Birthday:</label>    
	 		              <input type="date" name="bday" value="<?php echo $row['bday'] ?>" class="form-control"> 
                        </div>
              
	 		              <button type="submit" name="update" class="btn btn-ai">
                            Update Profile
                          </button> 
                  </div>
				       
					
		         </div>
		       </div>    
		     </form>
         
		     </div>

		  
		   </div>
       <div class="card bg-artist m-5">
          <form class="p-5" action="artist-profilepic-in.php" method="POST" enctype="multipart/form-data">
            <span class="img-div">
              <img src="blank-profile.jpg" onClick="triggerClick()" id="profileDisplay" class="img-fluid align-self-center pb-5">
              <div class="btn btn-ai"  onClick="triggerClick()">
                <h4>Select Image</h4>
              </div>
            </span>
            <input type="hidden" name="id"  value="<?php echo $row['idadmin'] ?>" class="form-control">
            <input type="file" name="image" onChange="displayImage(this)" id="image" class="form-control" value="" style="display: none;">
            <button class="btn btn-ai" name="updatepro" type="submit">
                <h4>Update image Profile Pic</h4>
              </button>
          </form>
       </div>
		  </div>
		</div> 
		
	  

	   


 	

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
<script src="js/popper.min.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin-datatables.min.js"></script>

</body>
</html>