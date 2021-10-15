<?php

if(isset($_POST['signup-submit'])){
	require 'dbh.inc.php';
	
	$username=$_POST['userId'];
	$email=$_POST['email'];
	$password=$_POST['pass'];
	$Repassword=$_POST['pass-repeat'];
	
	if(empty($username)||empty($email)||empty($password)||empty($Repassword)){
		header("Location:../signuppage.php?error=emptyfields");
		exit();
	}
	
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		header("Location:../signuppage.php?error=invalidemail");
		exit();
	}
	
	elseif($password!==$Repassword){
		header("Location:../signuppage.php?error=passwordcheck");
		exit();
	}
	
	else{
		$sql="SELECT Uemail FROM users where Uemail=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../signuppage.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck=mysqli_stmt_num_rows($stmt);
			if($resultCheck>0){
				header("Location:../signuppage.php?error=emailtaken");
			exit();
			}
			else{
				
				$sql="INSERT INTO users (UserName,Uemail,Upassword)VALUES(?,?,?)";
				$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../signuppage.php?error=sqlerror");
			exit();
		}
		else{
			$hashedpwd=password_hash($password,PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedpwd);
			mysqli_stmt_execute($stmt);
			header("Location:../signuppage.php?signup=success");
			exit();
		}
		}
				
		}
		
		}
		mysqli_stmt_close($stmt);
		mysql_close($conn);
	}
	else{
		header("LOcation:../signuppage.php");
		exit();
	}
	
