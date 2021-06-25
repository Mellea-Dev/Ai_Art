<?php
  include('db.php');

$sql = "select count(idadmin) as idadmin from admin where level=2";
$result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result)){                          
 while($row = mysqli_fetch_assoc($result)){

$sql = "select count(idadmin) as idadmin from admin where level=3";
$result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result)){                          
 while($row = mysqli_fetch_assoc($result)){

 


?>