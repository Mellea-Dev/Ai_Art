<?php   include('db.php');   
$upload_dir = 'uploads/'; 

if(isset($_GET['delete'])){   
	$id = $_GET['delete'];  
	$sql = "select * from contacts where id = ".$id;  
	$result = mysqli_query($conn, $sql);   
	if(mysqli_num_rows($result) > 0){    
		$row = mysqli_fetch_assoc($result);    
		$image = $row['image'];    
		unlink($upload_dir.$image);    
		$sql = "delete from contacts where id=".$id;    
		if(mysqli_query($conn, $sql)){     
			header('location:index.php');    
		}   
	}  
} 
?>

<!DOCTYPE html> 
<html>   
<head>     
	<meta charset="utf-8">     
	<title>PHP CRUD</title>     
	
	<link rel="stylesheet" href="css/bootstrap-4.css">    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">     
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">     
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitterbootstrap/4.0.0/css/bootstrap.css">     
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>   
</head>

<body>
	
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">  
		<div class="container">           
		 <a class="navbar-brand" href="index.php">PHP CRUD WITH IMAGE</a> 
           <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" arialabel="{{ __('Toggle navigation') }}">
           	<span class="navbar-toggler-icon"></span>           
           </button>           
           <div class="collapse navbar-collapse" id="navbarSupportedContent">  <ul class="navbar-nav mr-auto"></ul>               
           	<ul class="navbar-nav ml-auto">                 
           		<li class="nav-item">
           			<a class="btn btn-primary" href="create.php">
           			<i class="fa fa-userplus"></i></a>
           		</li>               
           	</ul>           
           </div>         
       </div>       
   </nav> 

    <div class="container">         
      <div class="row justify-content-center">             
      	<div class="col-md-12">                 
      		<div class="card">                    
      			<div class="card-header">Contact List</div>                  
      			<div class="card-body">                       
      			 <table id="example" class="table table-striped table-bordered" style="width:100%"> 
      			 <thead>                        
      			 	<tr>                                 
      			 		<th>ID</th>                                 
      			 		<th>Account Level:</th>
      			 		<th>Username:</th>                                 
      			 		<th>Password:</th>                                
      			 		<th>E-Mail</th>
      			 		<th>Action</th>                           
      			 	</tr>                         
      			 </thead>                         
      			 <tfoot>                           
      			 	<tr>                             
      			 		<th>ID</th>                                 
      			 		<th>Account Level:</th>
      			 		<th>Username:</th>                                 
      			 		<th>Password:</th>                                
      			 		<th>E-Mail</th>
      			 		<th>Action</th>                           
                    </tr>                         
                 </tfoot>                         
                 <tbody>                           
                    <?php                             
                     $sql = "select * from admin";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          while($row = mysqli_fetch_assoc($result)){          
                    ?>                           
                    <tr>                             
                    	<td><?php echo $row['idadmin'] ?></td>
                    	<td><?php echo $row['level'] ?></td>
                    	<td><?php echo $row['username'] ?></td>
                    	<td><?php echo $row['password'] ?></td>                
                    	<td><?php echo $row['email'] ?></td>
                    	<td class="text-center">  
                    		<a href="show.php?id=<?php echo $row['idadmin'] ?>" class="btn btn-success"><i class="fa faeye"></i></a>                              
                    		<a href="edit.php?id=<?php echo $row['idadmin'] ?>" class="btn btn-info"><i class="fa fa-useredit"></i>
                    		</a>                               
                    		<a href="index.php?delete=<?php echo $row['idadmin'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i>
                    		</a>                             
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
      </div>         
     </div>       
   </div>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>     
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>     
  <script type="text/javascript">     
  $(document).ready(function() {         
  $('#example').DataTable();       } );     
  </script> 

</body>
</html>

