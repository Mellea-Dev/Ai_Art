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
       <?php
        include("aside-artist.php");
        $ur=$_SESSION['user'];
         $id=$_SESSION['ID'];
       ?>
    
    <div class="lib-main">
     
       
    <div class="card-deck p-5">
         <div class="card bg-artist">
            <h4 class="card-header">Artworks
                <?php
                 $sql = "select count(idgallery) as idgallery from gallery where artistid=".$id." ";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $count=$row['idgallery']; 
                ?>
                <span class="badge badge-danger"><?php echo $count; ?></span>
                </h4>
               <div class="card-body">
                 <h4 class="card-title">My Gallery</h4>  
                 <a href="#" class="card-link">Go to My Gallery</a>              
               </div>
             </div>
             <div class="card bg-artist">
               <h4 class="card-header">Commissions
                <?php
                 $sql = "select count(idcomm) as idcomm from commission where artistid=".$id." ";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $count=$row['idcomm']; 
                ?>
                <span class="badge badge-danger"><?php echo $count; ?></span>
                </h4>
               <div class="card-body">
                 <h4 class="card-title">Commission Request</h4>  
                 <a href="#" class="card-link">Go to Request Table</a>              
               </div>
             </div>
      </div>
            </div> 
    </div>        

     


  


<script src="js/popper.min.js"></script>    
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin-datatables.min.js"></script>
</body>
</html>