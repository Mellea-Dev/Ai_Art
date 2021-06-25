<?php   
require_once('db.php');   
$upload_dir = 'uploads/'; 
 
  if (isset($_POST['submitcom'])) {     
    $usern = $_POST['username'];     
    $em = $_POST['email']; 
    $ty = $_POST['typeart'];
    $art = $_POST['art'];
    $dline = $_POST['deadline'];
    $id = $_POST['id'];   
   
 
    $imgName = $_FILES['photo']['name'];   
    $imgTmp = $_FILES['photo']['tmp_name'];   
    $imgSize = $_FILES['photo']['size']; 
 
    if(empty($ty)){    
      $errorMsg = 'Please select type of artwork';
      echo  $errorMsg;   
    }
    elseif(empty($art)){    
      $errorMsg = 'Please input title for your request'; 
      echo  $errorMsg;  
    }

    elseif(empty($dline)){    
      $errorMsg = 'Please specifie deadline you want to suggest'; 
      echo  $errorMsg;  
    }
    else{ 
 
   $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION)); 
 
   $allowExt  = array('jpeg', 'jpg', 'png', 'gif'); 
 
   $refpic = time().'_'.rand(1000,9999).'.'.$imgExt; 
 
   if(in_array($imgExt, $allowExt)){ 
 
    if($imgSize < 5000000){      
      move_uploaded_file($imgTmp ,$upload_dir.$refpic);     
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
    $sql = "insert into commission(user, email, type, artwork, deadline, rfrnce, artistid)      
    values('".$usern."', '".$em."', '".$ty."', '".$art."', '".$dline."', '".$refpic."', '".$id."')";    
    $result = mysqli_query($conn, $sql);    
    if($result){     
      $successMsg = 'New record added successfully';     
      header('Location: user-dashboard.php');    
    }
    else{     
      $errorMsg = 'Error '.mysqli_error($conn); 
      echo  $errorMsg;   
    }   
  }   
} 
?>