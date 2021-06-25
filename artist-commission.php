<?php   include('db.php');
session_start();
if(!isset($_SESSION['ID'])){
    header('location: login.php');
  }
$ur=$_SESSION['user'];   
$upload_dir = 'uploads/';


if(isset($_GET['delete'])){   
  $id = $_GET['delete'];  
  $sql = "select * from admin where idadmin = ".$id;  
  $result = mysqli_query($conn, $sql);   
  if(mysqli_num_rows($result) > 0){    
    $row = mysqli_fetch_assoc($result);    
    $image = $row['image'];    
    unlink($upload_dir.$image);    
    $sql = "delete from admin where idadmin=".$id;    
    if(mysqli_query($conn, $sql)){     
      header('location: artist-table.php');    
    }   
  }  
} 

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
		 <div class="container-fluid">
	        <div class="p-2">
              <div class="card-header bg-artist">
                <i class="fa fa-table"></i> Commission Request</div>
        <div class="card-body bg-light">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Type of Artwork</th>
                  <th>Artwork</th>
                  <th>Dead Line</th>
                  <th>Reference</th>
                  <th>Action</th>
                  <th hidden></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Type of Artwork</th>
                  <th>Artwork</th>
                  <th>Dead Line</th>
                  <th>Reference</th>
                  <th>Action</th>
                  <th hidden></th>
                </tr>
              </tfoot>
          
              <tbody>
                 <?php                             
                     $sql = "select * from commission where artistid=".$id." ";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          
                     while($row = mysqli_fetch_assoc($result)){          
                    ?>
                <tr>
                  <td><?php echo $row['idcomm'];?></td>
                  <td><?php echo $row['user'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['type'];?></td>
                  <td><?php echo $row['artwork'];?></td>
                  <td><?php echo $row['deadline'];?></td>
                  <td> <img src="<?php echo $upload_dir.$row['rfrnce']; ?>" alt="Image" class="card-img-top rounded-0"></td>  
                  <td hidden><?php echo $row['artistid'];?></td>
                  <td><button type="button" class="btn btn-info btnedit">
                       Accept Request</button>
                <form method="POST" action="decline">
                  <input type="hidden" name="delete" value="true">
                  <input type="hidden" name="id" value="<?php echo $row['idcomm'];?>">
                  <button type="submit"class="btn btn-danger">Decline</button>
                </form>
                  </td>
                  </tr>
                
                   <?php                             
                    }
                    }          
                    ?>
              </tbody>
            
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted bg-artist"></div>
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