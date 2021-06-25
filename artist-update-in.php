<?php   
require_once('db.php');  

  if (isset($_POST['id'])) {     
    $id = $_POST['id'];     
    $sql = "select * from admin where idadmin=".$id;     
    $result = mysqli_query($conn, $sql);     
    if (mysqli_num_rows($result) > 0) {       
      $row = mysqli_fetch_assoc($result);     
    }
    else {       
      $errorMsg = 'Could not Find Any Record';     
    }   
  } 
 
  if(isset($_POST['update'])){   
    $user = $_POST['username'];     
    $pass = $_POST['password'];  
    $em = $_POST['email']; 
    $fn = $_POST['fname'];
    $mn = $_POST['mname'];
    $ln = $_POST['lname'];
    $id = $_POST['id'];
   

 
 
 
 
  if(!isset($errorMsg)){    
    $sql = "update admin   set 
    username = '".$user."',     
    password = '".$pass."', 
    email = '".$em."',
    fname = '".$fn."',
    mname = '".$mn."',
    lname = '".$ln."'   where idadmin=".$id;    
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