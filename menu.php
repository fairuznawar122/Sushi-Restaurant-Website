<?php

session_start();
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
	<link rel="stylesheet" href="menustyle.css">
	<link rel="stylesheet" href="css/fixed.css">
</head>

<body>
<!---NAVIGATION --> 
<div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php"><img src="img/l1.jpg" style="margin-left: 50px; margin-bottom: 5px;"></a>
    
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
</div>
<!---END NAVIGATION --> 
    

<div class="landing">
    <div class="home-wrap">
        <div class="home-inner">
        </div>   
    </div>
</div>   
<div class="caption text-center">
    <h1>Enjoy Authentic Taste</h1>
</div>
<!---End Landing Page -->   
    
<div>
    <h4 class="heading">Menu</h4>
</div>
    
<!-------------------------------------Menu------------------------------------------>  
<!---Printing the Headings -->   
<div class="container">  
<div class="row col-md-12">  
    
<!-----Ramen------>
<div class="column col-md-4">
        <a href="ramen.php"  style="text-decoration-color:black;">
            <h3 class="itemname" >ramen</h3></a>
    <div class="row">
        <div class="column col-md-8" style= "text-align: left;
                                             color: black; 
                                             font-weight: 700; 
                                             font-size: 1.1rem;
                                             position: absolute;
                                             top:80%;">
                        <p> Item Name</p>
            </div>
        <div class="column col-md-4" style= "text-align: left; 
                                             color: black;
                                             font-weight: 700; 
                                             position: absolute;
                                             top:80%; 
                                             left:63%;">
                        <p> Price </p>
             </div>
    </div>
</div>
    
    
<!-----Sushi------>    
<div class="column col-md-4">
    <a class="menulinks" href="sushi.php"  style="text-decoration-color:black ;">
        <h3 class="itemname">Sushi</h3></a>
    <div class="row">
        <div class="column col-md-8" style="text-align: left;
                                            color: black;
                                            font-weight: 700;  
                                            font-size: 1.1rem;
                                            position: absolute;
                                            top:80%;">
                        <p> Item Name</p>
        </div>
        <div class="column col-md-4" style= "text-align: left;
                                             color: black; 
                                             font-weight: 700;  
                                             font-size: 1.1rem;
                                             position: absolute;
                                             top:80%; 
                                             left:63%;">
                        <p> Price </p>
        </div>
    </div>
</div>
    
<!-----Dessert------>    
<div class="column col-md-4">
    <a class="menulinks" href="des.php"  style="text-decoration-color:black;">
        <h3 class="itemname">Dessert</h3>
    </a>
    <div class="row">
                    <div class="column col-md-8" style="text-align: left;
                                                        color: black; 
                                                        font-weight: 700;  
                                                        font-size: 1.1rem;
                                                        position: absolute;
                                                        top:80%;">
                        <p> Item Name</p>
                        </div>
                    <div class="column col-md-4" style="text-align: left;
                                                        color: black;
                                                        font-weight: 700;
                                                        font-size: 1.1rem;
                                                        position: absolute;
                                                        top:80%; 
                                                        left:63%;">
                        <p> Price </p>
                        </div>
    </div>
</div>       
</div>
<!--- End Headings -->
    
    

<!--- List -->

<div class="row col-md-12" >
    
<?PHP

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'menuitems');
    $query1 = " SELECT `id`, `name`, `price` FROM `ramen` ";
    $query2 = " SELECT `id`, `name`, `price` FROM `sushi` ";
    $query3 = " SELECT `id`, `name`, `price` FROM `dessert`";
    
    $queryfire1 = mysqli_query($con, $query1);
    $num1 = mysqli_num_rows($queryfire1);
    
    $queryfire2 = mysqli_query($con, $query2);
    $num2 = mysqli_num_rows($queryfire2);
    
    $queryfire3 = mysqli_query($con, $query3);
    $num3 = mysqli_num_rows($queryfire3);
?>

<!------ Columns ------->
    
<!--- 1st -->
    
<div class="column col-md-4" style="border-right-style: solid; border-width: medium;">
                   
                    <?php if($num1 > 0){
		              while($product1 = mysqli_fetch_array($queryfire1)){
                          $pid= $product1['id'];
                          $name= $product1['name'];
                    ?>    
    
    <div class="row items">
                    <div class="column col-md-8" style="text-align:left;">
                       <?php echo "<a href='details1.php?idRamen=$pid'  style='color: black;'>
                            <p> $name
                             </p>
                        </a>" ?>
                        
                    </div>
                    <div class="column col-md-4">
                            <p><?PHP 
                                 echo $product1['price']."৳";
                            ?></p>
                        
                     </div>
                    </div>
	<?php		
		}
	}
	?>  
 </div>
   
<!--- 2nd -->
    <div class="column col-md-4" style="border-right-style: solid; border-width: medium;">
            <?php
            if($num2 > 0){
		      while($product2 = mysqli_fetch_array($queryfire2)){
                  $pid= $product2['id'];
                  $name= $product2['name'];
            ?>
                <div class="row items">
                    <div class="column col-md-8" style="text-align:left;">
                        <?php echo "<a href='details2.php?idSushi=$pid'   style='color: black;'>
                            <p> $name
                             </p>
                        </a>" ?>
                    </div>
                    <div class="column col-md-4">
                        <p> <?PHP 
                               echo $product2['price']."৳";
                            ?> </p>
                    </div>
                </div>
    <?php		
		}
	}
	?> 
</div>

  
 <!--- 3rd -->   
    
<div class="column col-md-4">
          <?PHP if($num3 > 0){
		          while($product3 = mysqli_fetch_array($queryfire3)){
                  $pid= $product3['id'];
                  $name= $product3['name'];
           ?>
        <div class="row">
                    <div class="column col-md-8" style="text-align:left;">
                        <?php echo "<a href='details3.php?idDessert=$pid'   style='color: black;'>
                            <p> $name
                             </p>
                        </a>" ?>
                    </div>
                    <div class="column col-md-4">
                        <p> <?PHP
                               echo $product3['price']."৳";
                            ?> </p>
                    </div>
        </div>
    <?php		
		}
	}
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
