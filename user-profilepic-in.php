<?php   
require_once('db.php'); 
$uploadpro_dir = 'uploadpro/'; 

  if (isset($_POST['id'])) {     
    $id = $_POST['id'];     
    $sql = "select * from admin where idadmin=".$id;     
    $result = mysqli_query($conn, $sql);     
    if (mysqli_num_rows($result) > 0) {       
      $row = mysqli_fetch_assoc($result);     
    }
    else {       
      $errorMsg = 'Could not Find Any Record';
      echo $errorMsg;     
    }   
  }

  if(isset($_POST['updatepro'])){   
   
    $id = $_POST['id'];

   $imgName = $_FILES['image']['name'];   
    $imgTmp = $_FILES['image']['tmp_name'];   
    $imgSize = $_FILES['image']['size']; 
 
    
  
 
   $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); 
 
   $allowExt  = array('jpeg', 'jpg', 'png', 'gif'); 
 
   $userPic = time().'_'.rand(1000,9999).'.'.$imgExt; 
 
   if(in_array($imgExt, $allowExt)){ 
 
    if($imgSize < 5000000){      
      move_uploaded_file($imgTmp ,$uploadpro_dir.$userPic);     
    }
    else{      
      $errorMsg = 'Image too large'; 
      echo  $errorMsg;
 
    }    
  
   
}

if(!isset($errorMsg)){    
    $sql = "update admin   set 
    aprofilepic = '".$userPic."'   where idadmin=".$id;    
    $result = mysqli_query($conn, $sql);    
    if($result){     
      $successMsg = 'New record updated successfully';     
      header('Location:user-profile-set.php');    
    }
    else{     
      $errorMsg = 'Error '.mysqli_error($conn); 
      echo $errorMsg;   
    }   
  } 
 
 } 

?>