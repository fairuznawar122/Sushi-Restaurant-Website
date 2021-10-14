<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CSE 3.1</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="mystyle.css">
	<link rel="stylesheet" href="css/fixed.css">
</head>
    
<body style="   background-image: url(img/orange.jpg);">


<!---NAVIGATION -->  
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.html"><img src="img/l1.jpg" style="margin-left: 50px; margin-bottom: 5px;"></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarResponsive"`>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="loginpage.php">Login/Sign-Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            
        </ul>
    </div>
</nav>   
<!---END-NAVIGATION -->


    
<!--login form-->

<section class="section-default">

           
<?php
 if(isset($_SESSION['userId'])){
	 echo' <div class="container">
     
     <div class="wrapper-main" style="position:absolute;top:45%; left:42%">
	 <form action="includes/logout.inc.php" method="post">
<button type="submit" class="btn btn-primary" name="logout-submit">Logout</button>
<a href="profile.php" class="btn btn-primary">Profile</a>
</form>

</div>
</div>
</div>
';

 }
 else{
	 echo' <div class="wrapper-main " style="position:absolute;top:35%; left:38%">
<form action="includes/login.inc.php" method="post">
<label for="email" style="float:left;">Email:</label>
<input type="text" class="form-control" name="Email" placeholder="E-mail">
<label for="pwd"style="float:left;">Password: </label>
<input type="password" class="form-control" name="pass" placeholder="Password">
<br>
<input type="hidden" class="form-control" name="id" val>
<button type="submit" class="btn btn-outline-dark btn-md" style="position:relative; left:38%; "  name="login-submit">LogIn</button>

<a href="signuppage.php" class="btn btn-outline-dark btn-md" style="position:relative; left:43%; "  name="login-submit">Sign-Up</a>
</div>';
     
     $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullurl,"error=emptyfields")==true){
	echo "<p class='error'style='color:red;margin-top:300px;'>you did not fill all fields!</p>";
}

if(strpos($fullurl,"error=wrongpassword")==true){
	echo "<p class='error'style='color:red;margin-top:300px;'>Wrong email or password !</p>";
}
if(strpos($fullurl,"error=nouser")==true){
	echo "<p class='error'style='color:red;margin-top:300px;'>Wrong email or password!</p>";
}

if(strpos($fullurl,"error=emailtaken")==true){
	echo "<p class='error'style='color:red;margin-top:300px;'>Email already taken.Enter another email !</p>";
}

 
 }
 ?>

</section>
<!--end login-->
     

    
<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->
    
</body>
</html>