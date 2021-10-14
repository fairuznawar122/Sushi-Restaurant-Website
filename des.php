 <?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "menuitems");  


 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                array_push($_SESSION['shopping_cart'], $item_array);

 
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="des.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'             =>     $_POST["hidden_name"],  
                'item_price'            =>     $_POST["hidden_price"],  
                'item_quantity'         =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="order.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          <link rel="stylesheet" href="mystyle.css">
	       <link rel="stylesheet" href="css/fixed.css">
      </head>  
      <body style=" background-image: url(img/orange.jpg);
   " >  
           <br />  
           <div class="container" style="width:70%;">  
                <div>
                    <h4 class="heading" style="text-shadow: 0 0 0 black; color:black;">DESSERTS</h4>
               </div> 
                <?php  
                $query = "SELECT * FROM `dessert` ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
<div class="col-md-6 col-sm-1">  
    <form method="post" action="des.php?action=add&id=<?php echo $row["id"]; ?>">  
        <div style="border:1px solid #333; background: rgba(0, 0, 0, 0.1)!important; padding:16px;" align="center">  
            <img class="image-responsive" style="height:240px; width:320px; margin-top:15px; " src="<?php echo $row["image"]; ?>">
                               <h4  style="padding-top:10px;font-size: 2rem;
    letter-spacing: 0.1rem;
     color:black;"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger" style="font-weight:700;">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:20px;margin-bottom:5px; border-radius:0px; font-weight:700; border:1px solid #969696; padding:1rem;" class="btn btn-secondary btn-md" value="Add to Cart" />  
                          </div>  
        </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
             
                </div> <a href="order.php" style="margin-top:20px;margin-bottom:5px; border-radius:0px; font-weight:700; border:1px solid #969696; padding:1rem; position:relative; left:83% ; font-size:1.5rem;" class="btn btn-secondary btn-md" class="btn btn-outline-light btn-lg"> Order Details</a> 
           </div>  
           <br />  
      </body>  
 </html>
   