<?php   
require_once('db.php');  

  if (isset($_GET['id'])) {     
    $id = $_GET['id'];     
    $sql = "select * from admin where idadmin=".$id;     
    $result = mysqli_query($conn, $sql);     
    if (mysqli_num_rows($result) > 0) {       
      $row = mysqli_fetch_assoc($result);     
    }
    else {       
      $errorMsg = 'Could not Find Any Record';     
    }   
  } 
 
  if(isset($_POST['approve'])){   
    
    $lv = 2;
    $id = $_POST['id'];
   

 
 
 
 
  if(!isset($errorMsg)){    
    $sql = "update admin   set  level = '".$lv."'   where idadmin=".$id;    
    $result = mysqli_query($conn, $sql);    
    if($result){     
      $successMsg = 'New record updated successfully';     
      header('Location:artist-table.php');    
    }
    else{     
      $errorMsg = 'Error '.mysqli_error($conn);    
    }   
  } 
 
 } 
 
?> 