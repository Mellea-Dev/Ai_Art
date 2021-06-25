<?php   include('db.php');
session_start();
if(!isset($_SESSION['ID'])){
    header('location: login.php');
  }
$ur=$_SESSION['user']; 
 $id=$_SESSION['ID'];  
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
       <?php
        include("aside-admin.php");
        $ur=$_SESSION['user'];
         $id=$_SESSION['ID'];
       ?>  
		
		<div class="lib-main">
		 <div class="container-fluid">
	        <div class="p-2">
              <div class="card-header bg-admin">
                <i class="fa fa-table"></i> Approved Artists</div>
        <div class="card-body bg-light">
          <div class="table-responsive"> 
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                </tr>
              </thead>
              <tfoot>             	 
                 <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                </tr>               
              </tfoot>
              <tbody>
                <?php                             
                     $sql = "select * from admin where level = 2";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          
                     while($row = mysqli_fetch_assoc($result)){          
                    ?>
                
                <tr>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['password'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td hidden><?php echo $row['fname'] ?></td>
                  <td hidden><?php echo $row['mname'] ?></td>
                  <td hidden><?php echo $row['lname'] ?></td>
                  <td hidden><?php echo $row['idadmin'] ?></td>
                  <td><button type="button" class="btn btn-info btnedit">
                       Info/Update</button>       
                       
                       
                   <a href="artist-table.php?delete=<?php echo $row['idadmin'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a> 
  
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
        <div class="card-footer small text-muted bg-admin">Updated yesterday at 11:59 PM</div>
      </div>
                 
              </div>
		</div> 
		
		
		<div class="lib-main">
		 <div class="container-fluid">
	        <div class="p-2">
              <div class="card-header bg-admin">
                <i class="fa fa-table"></i> Pending Artists</div>
        <div class="card-body bg-light">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                </tr>
              </thead>
              <tfoot>             	 
                 <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                  <th hidden></th>
                </tr>               
              </tfoot>
              <tbody>
                <?php                             
                     $sql = "select * from admin where level = 4";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          
                     while($row = mysqli_fetch_assoc($result)){          
                  ?>
                <form action="approve-in.php" method="POST">
                
                <tr>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['password'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td hidden><?php echo $row['fname'] ?></td>
                  <td hidden><?php echo $row['mname'] ?></td>
                  <td hidden><?php echo $row['lname'] ?></td>
                  <td hidden><?php echo $row['idadmin'] ?></td>
                  <td>
                    <input type="hidden" name="id" value="<?php echo $row['idadmin'] ?>">
                    <button type="submit" class="btn btn-info" name="approve">
                       Approve</button>
                  <a href="artist-table.php?delete=<?php echo $row['idadmin'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to REJECT this record?')"><i >Reject</i></a>
                  </td>
                </tr>
                </form>
              <?php                               
                      }                             
                       }                           
                    ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted bg-admin">Updated yesterday at 11:59 PM</div>
      </div>
                 
              </div>
		</div> 
		
</div> 		  

<div class="modal fade" id="updatemodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content md-content-bg">
        <div class="modal-header">
          <h4 class="modal-title" style="color:white">Update</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
          <form action="artist-update-in.php" method="post" id="updateform" class="p-5" style=" background-image: linear-gradient( to top left, #fdf86d, #fdf86d 0%, #bddcf1 54%)">
	
	              <div class="form-group row">
	                <input type="hidden" name="id" id="id" >
	                <label for="username" class="control-label col-md-2" style="">Username </label>
	                <div class="col-md-4">
	                <input type="text" name="username"  class="form-control" id="username" placeholder="Username">
	             	</div>
	             	<label for="password" class="control-label col-md-2">Password</label>
	                <div class="col-md-4">
	                <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
	             	</div>
	              </div>
	              
	              <div class="form-group row">
	              <label for="email" class="control-label col-md-4">Email</label>
	                <input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control col-md-8" id="email" placeholder="Email">
	              </div>
	              <div class="form-group row">
	              <label for="fname" class="control-label col-md-4">First Name</label>
	                <input type="text"  name="fname" class="form-control col-md-8" id="fname" placeholder="fname">
	              </div>
	              <div class="form-group row">
	              <label for="mname" class="control-label col-md-4">Middle Name</label>
	                <input type="text"  name="mname" class="form-control col-md-8" id="mname" placeholder="mname">
	              </div>
	              <div class="form-group row">
	              <label for="lname" class="control-label col-md-4">Last Name</label>
	                <input type="text"  name="lname" class="form-control col-md-8" id="lname" placeholder="lname">
	              </div>
	              
	              
	              <div class="form-group">
	                <button type="submit" name="update" class="btn btn-ai py-3 px-5" id="btn-save">Save</button>
	              </div>
	      </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script>
    $(function () {
        $(".btnedit").click(function () {
            //get data from table row
            var user = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
            var pass = $(this).parent().prev().prev().prev().prev().prev().prev().text();
            var mail = $(this).parent().prev().prev().prev().prev().prev().text();
            var fname = $(this).parent().prev().prev().prev().prev().text();
            var mname = $(this).parent().prev().prev().prev().text();
            var lname = $(this).parent().prev().prev().text();
            var id = $(this).parent().prev().text();


            //assign to value for input box inside modal
            $("#username").val(user);
            $("#password").val(pass);
            $("#email").val(mail);
            $("#fname").val(fname);
            $("#mname").val(mname);
            $("#lname").val(lname);
            $("#id").val(id);

            //open modal
            $("#updatemodal").modal();

            $("#btnsave").click(function () {
            	$("#updateform").submit();             
            })
        })
    })
</script>
</body>
</html>