<?php   
require_once('db.php');   
$upload_dir = 'uploads/'; 
 
  if (isset($_POST['submit'])) {     
    $title = $_POST['title'];     
    $des = $_POST['des']; 
    $id = $_POST['id'];   
   
 
    $imgName = $_FILES['image']['name'];   
    $imgTmp = $_FILES['image']['tmp_name'];   
    $imgSize = $_FILES['image']['size']; 
 
    if(empty($title)){    
      $errorMsg = 'Please input title';
      echo  $errorMsg;   
    }
    elseif(empty($des)){    
      $errorMsg = 'Please input description'; 
      echo  $errorMsg;  
    }
    else{ 
 
   $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); 
 
   $allowExt  = array('jpeg', 'jpg', 'png', 'gif'); 
 
   $pic = time().'_'.rand(1000,9999).'.'.$imgExt; 
 
   if(in_array($imgExt, $allowExt)){ 
 
    if($imgSize < 5000000){      
      move_uploaded_file($imgTmp ,$upload_dir.$pic);     
    }
    else{      
      $errorMsg = 'Image too large'; 
      echo  $errorMsg;
 
    }    
  }
  else{     
    $errorMsg = 'Please select a valid image'; 
    echo  $errorMsg;   
  }   
} 
 
 
  if(!isset($errorMsg)){    
    $sql = "insert into gallery(entrytitle, entrydes, artistid, entry)      
    values('".$title."', '".$des."', '".$id."', '".$pic."')";    
    $result = mysqli_query($conn, $sql);    
    if($result){     
      $successMsg = 'New record added successfully';     
      header('Location: uploadgallery.php');    
    }
    else{     
      $errorMsg = 'Error '.mysqli_error($conn); 
      echo  $errorMsg;   
    }   
  }   
} 
?>