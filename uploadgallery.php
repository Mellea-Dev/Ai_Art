<?php
  include('db.php');
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
<title>Ai Art Gallery</title>
</head>
<body class="bg-dark">
  <div class="card m-5 bg-artist" >
  <h3 class="card-header">Upload Artwork</h3>
  <a href="artist-gallery.php" class="btn-lg btn-ai"><---BACK TO YOUR GALLERY</a>
  <div class="card-body" >
    <form action="uploadgallery-in.php" method="post" enctype="multipart/form-data" class="p-5" >
	             <input type="hidden" name="id" value="<?php echo $id; ?>">
	              
	              <div class="form-group">
	                <input type="file" name="image" class="form-control">
	              </div>
	              
	              <div class="form-group">
	                <input type="text" name="title" class="form-control" placeholder="Enter your Artwork Title">
	              </div>
	              
	              <div class="form-group">
	                <textarea name="des"  cols="20" rows="7" class="form-control" placeholder="Write about Your Work"></textarea>
	              </div>
	              
	               <div class="form-group">
	                <button type="submit" name="submit" class="btn-lg btn-ai">Upload</button>

	              </div>
	      </form>
  </div>
</div>
</body>
</html>