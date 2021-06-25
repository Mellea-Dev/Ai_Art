<?php
  include('db.php');
   $upload_dir = 'uploads/'; 

  session_start();
  if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
  $ur=$_SESSION['user'];
  include('uploadgallery-in.php');
  $id=$_SESSION['ID'];

?>
<html>

<head>
<meta charset="ISO-8859-1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-4.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styleko.css">
<link rel="stylesheet" href="css/ll.css">
<link rel="stylesheet" href="css/animate.css">
<title>Ai Art Gallery</title>
</head>

<body>
      <div class="lib-page">

      <?php
        include("aside-artist.php");
        $ur=$_SESSION['user'];
        $id=$_SESSION['ID'];
       ?>
		<div class="lib-main">

		<a href="uploadgallery.php" class="btn btn-info m-3">Upload Artwork</a>
		<div class="container">
      <div class="row">
        <div class="col-sm-6">
          <?php                             
                     $sql = "select * from gallery where artistid =".$id." ";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          
                     while($row = mysqli_fetch_assoc($result)){          
             ?>
        <div class="row justify-content-center">
       <div class="col-md-12 d-flex text-center">
              <div class="container-fluid m-2">
               <div class="card promoting-card bg-artist">

  <!-- Card content -->
  <div class="card-body d-flex flex-row ">
    <!-- Content -->
    <div>

      <!-- Title -->
      <h4 class="card-title"><?php echo $row['entrytitle']; ?></h4>
      <!-- Subtitle -->
      <p class="card-text"><i class="far fa-clock pr-2"></i>07/24/2018</p>

    </div>

  </div>

  <!-- Card image -->
  <div class="view overlay">
    <img src="<?php echo $upload_dir.$row['entry']; ?>" alt="Image" class="card-img-top rounded-0">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body">

    <div class="collapse-content">

      <!-- Text -->
     <p class="card-text" id="<?php echo $id; ?>"><?php echo $row['entrydes']; ?></p>
      <!-- Button -->
      

    </div>

  </div>

</div> 
            </div>
           </div>
         </div>
            <?php
              }
          }
            ?>
        </div>
        <div class="col-sm-6" style="position: relative;">
          
            <?php 
        include('artist-profile-view.php');
          $id=$_SESSION['ID'];
        ?>

          
        </div>
       
      </div>
    </div>
		   	  
	    
	    
	   </div> 




		
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>