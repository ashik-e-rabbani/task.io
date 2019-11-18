




<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/order_details.css">
<link rel="stylesheet" type="text/css" href="css/sideNav.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<head>
	<title>Payment</title>
</head>
<body>
<nav style="min-height: 70px;  background-color: #2f3241 ; border-bottom:1px solid #1a1b23;" class="navbar fixed-top navbar-expand-md navbar-dark navbar-glossy">
    <div class="container-fluid">
     <a href="home.php" class="navbar-brand d-flex w-50 mr-auto"><img style="height: 3.5vh; width: 20vh;" src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
       
        <!-- center work 
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="//codeply.com">Codeply</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul> -->
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">

            <form>
              <li class="nav-item">
            
                <?php 
                  
                if (isset($_SESSION['loggedUser'])) {
                    # code...
                    echo'<a style="margin-right:10px;"  href="profile.php">'.$_SESSION["loggedUser"].'</a>
                    ';

                } else{

                    header('Location home.php')
            ;
                }

                ?>

                
            </li>
            </form>


       		<form method="post">   
       		   <li class="nav-item ">
                  <a> <button name="Logout" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Logout</button> </a>
            </li>
            </form>
        </ul>
    </div>
    </div>
</nav><!-- END of  NAVBAR -->

<div style="margin-top: 80px;" class="container">





<?php
include('connection.php');

session_start();
$logged_user = $_SESSION['loggedUser'] ;

   if(isset($_GET['value_key'])){
  
  	$task_name = $_GET['value_key']; //some_value
 	 $task_price = $_GET['value_key2'];
 	 $task_seller = $_GET['value_key3'];


  $query = "SELECT * FROM `orders` WHERE order_name='$task_name' and o_buyer_name='$logged_user ' ";

   #taking query now time to show result
            $result = mysqli_query($conn ,$query);
            while ($row = mysqli_fetch_assoc($result)) {
    
         	  $o_seller_name = $row["o_seller_name"];
         	  #echo $o_seller_name;
         	 

  
}

 

 $query2 = "INSERT INTO `payment` (`buyer_name`, `seller_name`, `amount`, `payment_id`) 
 	 VALUES ('$logged_user', '$task_seller', '$task_price', NULL)";



 	 if (mysqli_query($conn ,$query2)) {
 	 	# code...
 	 	 echo'<div style="margin : 0px; height:60vh;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  PAyment Done
</div>';
 	 }



}


?>

</div>




<br><br><br><br><br>
         <!-- Footer -->
    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    
                    
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p><u><a href="https://www.nationaltransaction.com/">AF software solution</a></u> is an under developing company in Bangladesh</p>
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.ashikrabbani.com" target="_blank">taskbd.io</a></p>
                </div>
                </hr>
            </div>  
        </div>
    </section>

<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/sideNav.js"></script>
</body>
</html>