<?php

if(isset($_POST['login-submit'])){
	require 'dbh.inc.php';
	
$mail=$_POST['Email'];
$password=$_POST['pass'];
$id=$_POST[''];

if(empty($mail) || empty($password)){
	header("Location:../loginpage.php?error=emptyfields");
	exit();
}
else{
	$sql="SELECT * FROM users WHERE  Uemail=?;";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:../loginpage.php?error=sqlerror");
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$mail);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($result)){
			$passcheck=password_verify($password,$row['Upassword']);
			if($passcheck==false){
				header("Location:../loginpage.php?error=wrongpassword");
				exit();
		
				
			}
			elseif($passcheck==true){
				session_start();
				$_SESSION['userId']=$row['UserId'];
				$_SESSION['username']=$row['UserName'];
				
				header("Location:../loginpage.php?login=success");
				exit();
				
			}
			else{
				header("Location:../loginpage.php?error=wrongpassword");
				exit();
			}

		}
		else{
			header("Location:../loginpage.php?error=nouser");
		exit();
		
		}
	}
		
}
	
}
else{
	header("Location:../loginpage.php");
	exit();
}
?>