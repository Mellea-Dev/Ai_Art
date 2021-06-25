<?php

	if(isset($_POST['login'])){
		require 'db.php';
		$userid = $_POST['username'];
		$pass = $_POST['password'];
    
		if(empty($userid)||empty($pass)){
		            header("Location: login.php?error=empty");
					exit();
		}
		else{
			$sql = "SELECT * FROM admin WHERE username=?;";
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo 'sql error';
				exit();
			}

			else{
				mysqli_stmt_bind_param($stmt, "s", $userid);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);

				if($row=mysqli_fetch_assoc($result)){
					$pwdCheck=$row['password'];

						if($pwdCheck!=$pass){
							header("Location: login.php?error=wrongpw");
				        	exit();
						}

						else {
							session_start();
							$_SESSION['valid']= 1;
							$_SESSION['ID']=$row['idadmin'];
							$_SESSION['Firstname']=$row['fname'];
							$_SESSION['Midname']=$row['mname'];
							$_SESSION['Lastname']=$row['lname'];
							$_SESSION['Rights']=$row['level'];
							$_SESSION['Birthday']=$row['bday'];
							$_SESSION['Gender']=$row['gender'];
							$_SESSION['Email']=$row['email'];
							$_SESSION['user']= $userid;

							if($row['level']==1){
							header("Location: admin-dashboard.php");
							exit();
						    }

						    else  if($row['level']==2){
						    header("Location: artist-dashboard.php");
						    exit();	
						    }

						    else  if($row['level']==3){
						    header("Location: user-dashboard.php");
						    exit();	
						    }

						    else  if($row['level']==4){
						    header("Location: login.php?error=YourAccountIsStillPending");
						    exit();	
						    }
						   }
						        
						    
				}

				else{
					header("Location: login.php?error=nouser");
					exit();

				}

			}
		}
	}	
	else{
		echo 'Invalid Access';
	}