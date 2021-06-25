<?php
  include('db.php');
  $uploadpro_dir = 'uploadpro/'; 
  session_start();
  if(!isset($_SESSION['ID'])){
    header('location: login.php');
  }
  $ur=$_SESSION['user'];
 
  include('commission-request-in.php');
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
<link rel="stylesheet" href="css/styleko.css">
<link rel="stylesheet" href="css/ll.css">
<link rel="stylesheet" href="css/animate.css">
<title>Ai Art</title>
</head>

<body>
      <div class="lib-page">
      
        <?php
        include("aside-user.php");
        $ur=$_SESSION['user'];
       ?>
		
		<div class="lib-main">

		
         
			 
		
    <div class="container m-3">
    <div class="row">
        <div class="col-sm-6">
          <?php                             
                     $sql = "select * from admin where level = 2";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)){                          
                     while($row = mysqli_fetch_assoc($result)){          
                    ?>
            <div class="card m-3 bg-user">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                          
                            <h3 class="mb-0 text-truncated"><?php echo $row['username'];?></h3>
                            <p class="lead"><?php echo $row['email'] ?></p>
                            
                            <p>
                                I love to read, hang out with friends, watch football, listen to music, and learn new things.
                            </p>
                            <p> <span class="badge badge-info tags">html5</span> 
                                <span class="badge badge-info tags">css3</span>
                                <span class="badge badge-info tags">nodejs</span>
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="<?php echo $uploadpro_dir.$row['aprofilepic']; ?>" alt="" class="mx-auto rounded-circle img-fluid">
                            <br>
                            <ul class="list-inline ratings text-center" title="Ratings">
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0">245</h3>
                            <small>Following</small>
                            <h3 class="mb-0">20.7K</h3>
                            <small>Followers</small>
                            
                   
                        </div>
                        <div class="col-12 col-lg-4">
                            <button type="button" class="btn btn-info btnedit" idValue="<?php echo $row['idadmin']; ?>">
                       Request Commission</button>
                        </div>
                        <div class="col-12 col-lg-4">
                            
                            <?php
                   $idgall = $row['idadmin'];
                  
                  ?>
                            <form method="post" action="user-gallery.php">
                    
                 <?php echo '<input type="hidden" name="idgal" value='.$idgall.'>' ?>
                  <button type="submit"  class="btn btn-outline-info btn-block"><span class="fa fa-user"></span> Visit Gallery</button>
                  </form>
                        </div>
                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
                <!--/card-block-->
            </div>
            <?php                               
                      }                             
                       }                           
                    ?>
        </div>
        <div class="col-sm-6" style="position: relative">
          <?php 
        include('artist-profile-view.php');
          $id=$_SESSION['ID'];
        ?>
        </div>
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
          <form action="commission-request-in.php" method="post" enctype="multipart/form-data" class="p-5" id="updateform" style="background-image: linear-gradient( to top left, #cfc7f8, #cfc7f8 0%, #ebbba7 74%)">
	              <div class="form-group">
	                
	                <input type="hidden" name="id" id="id" value="<?php echo $row['idadmin']; ?>">
	                <input type="text" name="username"  value="<?php echo $ur; ?>" class="form-control" placeholder="Username" readonly>
	              </div>
	        
	              <div class="form-group">
	                <input type="email" name="email" value="" class="form-control" placeholder="Email">
	              </div>
	              
	              <div class="form-group">
	                <select name="typeart" class="form-control">
	                   <option>Type of Artwork</option>
				        <option disabled>-------</option>
				        <option>Physical</option>
				        <option>Digital</option>
				    </select>    
	              </div>	
	              
	              <div class="form-group">
	                <input type="text" value="" name="art" class="form-control" placeholder="Artwork">
	              </div>
	              <div class="form-group">
	              <label for="files">Reference</label>
	              	<input id="files" type="file" name="photo"/>
	              </div>
	              
	              <div class="form-group">
	                <input type="date" value="" name="deadline" class="form-control" placeholder="Your Desired Deadline">
	              </div>
	              
	              <div class="form-group">
	                <button type="submit" name="submitcom" class="btn btn-ai py-3 px-5" id="btn-save">Submit</button>
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
            var username = $(this).parent().prev().prev().prev().prev().text();
            var email = $(this).parent().prev().prev().text();
            var id = $(this).attr("idValue");
            


            //assign to value for input box inside modal

            $("#id").val(id);
            $("#username").val(username);
            $("#email").val(email);
            
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