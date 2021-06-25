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
<link rel="stylesheet" href="css/profilecard.css">
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

		 <div class="card-deck p-5">
		     <div class="card bg-admin">
               <h4 class="card-header">Pending Artist
               	<?php
               	 $sql = "select count(idadmin) as idadmin from admin where level=4";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $count=$row['idadmin']; 
               	?>
                <span class="badge badge-danger"><?php echo $count; ?></span>
                </h4>
               <div class="card-body">
                 <h4 class="card-title">Manage Admin</h4>                
               </div>
             </div>
             <div class="card bg-admin">
               <h4 class="card-header">Artist
               	<?php
               	 $sql = "select count(idadmin) as idadmin from admin where level=2";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $count=$row['idadmin']; 
               	?>
                <span class="badge badge-danger"><?php echo $count; ?></span>
                </h4>
               <div class="card-body">
                 <h4 class="card-title">Manage Artist</h4>  
               </div>
             </div>
             <div class="card bg-admin">
               <h4 class="card-header">Users
               	<?php
               	 $sql = "select count(idadmin) as idadmin from admin where level=3";
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                 $count=$row['idadmin']; 
               	?>
                <span class="badge badge-danger"><?php echo $count; ?></span>
                </h4>
               <div class="card-body">
                 <h4 class="card-title">Manage User</h4>                
               </div>
             </div>     
	    </div>
		<div class="card-deck p-5 justify-content-center">
          <?php
               	 $sql = "select * from admin where level=1";
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

       <div class="col-md-6 mt-4 bg-">
    		    <div class="card profile-card-5 bg-admin">
    		    <div class="container">  
    		    	<div class="row justify-content-center">   
    		    		<div class="col-md-6">
    		    			<div class="card-img-block">
    		            <img id="rubberBand" src="<?php echo $uploadpro_dir.$row['aprofilepic']; ?>" alt="Image" class="card-img-top rounded-circle">

    		                </div>
    		               
    		    		</div> 
    		    		
    		    		
    		    	</div> 
                    <div class="row justify-content-center">
                    	<div class="col-md-6 justify-content-center">
    		    			<div class="card-body pt-0">
                              <h5 class="card-title" style="text-align: center;
                              font-size: 30px"><?php echo $un ?></h5>
    		                </div>
    		                
    		    		</div> 
                    </div>
    		    </div> 

    		    	<div class="container"> 
    		    		<div class="row">      
    		    			<div class="col-sm-4">
    		    	          <div class="card-body pt-0">
    		    	          	
    <p class="card-text"><i class="fas">FIRST NAME</i><br>  <?php echo $fn ?>
    </p>
   
    
    <p class="card-text"><i class="fas">EMAIL</i><br>  <?php echo $em ?>
    </p>
                              </div>
                            </div>      
    		    			<div class="col-sm-4">
    		    				<div class="card-body pt-0">
    		    	
                    
                    
                  
          
    <p class="card-text"><i class="fas">MIDDLE NAME</i><br>  <?php echo $mn ?>
    </p>
     <p class="card-text"><i class="fas">GENDER</i><br>  <?php echo $gen ?>
    </p>
    
                  </div>
    		    			</div>
    		    			<div class="col-sm-4">
    		    				<div class="card-body pt-0">
     <p class="card-text"><i class="fas">LAST NAME</i><br>  <?php echo $ln ?>
    </p>	    					
   
    <p class="card-text"><i class="fas">BIRTHDAY</i><br>  <?php echo $bd ?>
    </p>
    		    				</div>
    		    			</div>

    		    		</div> 
    		    	</div>
    		        

                </div>
                
    		</div> 
<!-- Card -->
		</div>	
   
			

		  
	  
		</div> 
		
</div> 		  

	

<script>
			function previewImage(event){
			
				var reader = new FileReader();
				var imageField= document.getElementById("image-field")
				
				reader.onload = function(){
					if (reader.readyState == 2){
						imageField.src = reader.result;
					}
				}
				reader.readAsDataURL(event.target.files[0]);
			}
</script>
<script>         
var xmlHttp         
var xmlHttp       
function showState(str){        
	if (typeof XMLHttpRequest != "undefined")
	{         
		xmlHttp= new XMLHttpRequest();        
		}        
	else if (window.ActiveXObject){         
		xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");        
		}        
	if (xmlHttp==null){         
		alert("Browser does not support XMLHTTP Request")        
		return;        
		}                 
	var url="state.jsp";        
	url +="?count=" +str;        
	xmlHttp.onreadystatechange = stateChange;        
	xmlHttp.open("GET", url, true);        
	xmlHttp.send(null);    } 
 
      function stateChange(){           
    	  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){           
    		  document.getElementById("state").innerHTML=xmlHttp.responseText           
    		  }          
    	  } 
 
      function showCity(str){        
    	  if (typeof XMLHttpRequest != "undefined"){          
    		  xmlHttp= new XMLHttpRequest();        
    		  }        
    	  else if (window.ActiveXObject){          
    		  xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");        
    		  } 
       if (xmlHttp==null){         
    	   alert("Browser does not support XMLHTTP Request")        
    	   return;           
    	   }                 
       var url="city.jsp";        
       url +="?count=" +str;        
       xmlHttp.onreadystatechange = stateChange1;        
       xmlHttp.open("GET", url, true);        
       xmlHttp.send(null);       
       }              
      function stateChange1(){           
    	  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){            
    		  document.getElementById("city").innerHTML=xmlHttp.responseText           
    		  }          
    	  }  
</script>
<script>   
function handleFileSelect(evt) {       
	var files = evt.target.files;         
	// Loop through the FileList and render image files as thumbnails.       
	for (var i = 0, f; f = files[i]; i++) {           
		// Only process image files.         
		if (!f.type.match('image.*')) {           
			continue;         
			}           
		var reader = new FileReader();           
		// Closure to capture the file information.         
		reader.onload = (function(theFile) {           
			return function(e) {             
				// Render thumbnail.             
				var span = document.createElement('span');             
				span.innerHTML =              
					[               
						'<img style="height: 75px; border: 1px solid #000; margin: 5px" src="',                
						e.target.result,               
						
						'" title="', escape(theFile.name),                
						'"/>'             
						].join('');                          
				document.getElementById('list').insertBefore(span, null);           
				};         
				})(f);           
		// Read in the image file as a data URL.         
		reader.readAsDataURL(f);       
		}     
       document.getElementById('files').addEventListener('change', handleFileSelect, false);  
</script> 

<script src="js/popper.min.js"></script>		
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin-datatables.min.js"></script>
</body>
</html>