
<?php
$idRamen=$_GET["idRamen"];

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'menuitems');
$query = " SELECT * FROM `ramen` where id=$idRamen";

$res= mysqli_query($con,$query);
$row= mysqli_fetch_array($res);

$name= $row['name'];
$details= $row['details'];
$price = $row['price'];
$name= $row['name'];
$details= $row['details'];
$price = $row['price'];
$image = $row['image'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CSE 3.1</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="detailstyle.css">
	<link rel="stylesheet" href="css/fixed.css">
</head>
    
<body>
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
        
<div>
    <a href="ramen.php">
    <h4 class="heading">Ramen Bowls</h4>
    </a>
</div>
        
        
<div class="container">
    
<div class="row col-md-12">
    
<!---Image --> 
    <?php 
       echo "<div class='column col-md-8 col-sm-12'>";
           
        echo "<img src='$image'>
        </div>"
?>  
    
<!---Others --> 
<div class="column col-md-4">
<?php
            echo "<div class='row col-md-12' >
                <h3 class='itemname'>$name</h3>
             </div>";
            echo "<div class='row col-md-12' >
                <p>$details</p>
             </div>";
            echo "<div class='row col-md-12' >
                 <h5>Price : $price $</h5>
             </div>";
    
            echo "
                <div class='column col-md-8'>
               <a href='ramen.php' class='btn btn-outline-dark btn-lg' 
               style= 'border-radius:0px;  
               text-align: center; 
               font-size:1rem; 
               padding-top: 0.7rem;
               padding-left: 1rem;
               padding-right: 1rem;
                '>SEE MORE </a>
               </div>";            
             
 ?>         
        
</div>  
        
</div>
</div>
    
<!--- Start Contact/Footer Section -->  
<div id="contact" class="offset">
<footer>
    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <img  src="img/l1.jpg">
            <p>We have been proudly serving high quality food since 1995</p>
            <strong>Contact Info</strong>
            <p>+88077788899<br>sushiramen@gmail.com</p>
            <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a>
        </div>
        <hr class="socket">
        &copy; ramensushi.com
    </div>
    </footer>    
    </div>
   
<!--xxxx End Contact Section -->


<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->

</body>
</html>