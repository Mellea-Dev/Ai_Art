<?php   
require_once('db.php');   
$uploadpro_dir = 'uploadpro/';
 
  if (isset($_POST['Join'])) {     
    $user = $_POST['username'];     
    $pass = $_POST['password'];     
    $email = $_POST['email']; 
    $fn = $_POST['fname'];
    $mn = $_POST['mname'];
    $ln = $_POST['lname'];
    $gen = $_POST['gender'];
    $bd = $_POST['bday'];
    $lv = $_POST['level'];
 
     
  if($lv=="Artist"){
    $lv=4;
  }

  else if($lv=="User"){
    $lv=3;
  }

  else{
    $lv=1;
  }
 
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

}    
}
else{     
  $errorMsg = 'Please select a valid image';   
   }   

   
    $sql = "insert into admin(username, password, email, fname, mname, lname, gender, bday, level, aprofilepic)      
    values('".$user."', '".$pass."', '".$email."', '".$fn."', '".$mn."', '".$ln."', '".$gen."', '".$bd."', '".$lv."', '".$userPic."')";    
    $result = mysqli_query($conn, $sql);    
    if($result){     
      $successMsg = 'New record added successfully';     
      header('Location: login.php');    
    }
    else{     
      $errorMsg = 'Error '.mysqli_error($conn);    
    }   
    
} 
?>