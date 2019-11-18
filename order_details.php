<?php
include('connection.php');
session_start();

   if(isset($_GET['value_key'])){
  
  	$order_id = $_GET['value_key']; //some_value
 	 $order_name = $_GET['value_key2'];

  $query = "SELECT * FROM `orders` WHERE order_id='$order_id' and order_name='$order_name ' ";

   #taking query now time to show result
            $result = mysqli_query($conn ,$query);
            while ($row = mysqli_fetch_assoc($result)) {
    # code...
         	  $order_id = $row["order_id"];
         	  $order_name = $row["order_name"];
              $order_price = $row["price"];
              $order_type = $row["order_type"];
              $order_desc = $row["order_details"];
              $o_buyer_name = $row["o_buyer_name"];
              $order_status = $row["order_status"];
              $order_delivary = $row["delivary_time"];
  
}
}



if (!isset($_SESSION['loggedUser'])) {
			


			header('Location: home.php');

			echo'<div style="margin : 0px;" class="alert alert-info alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Please Login First
</div>';
		}

		if (isset($_POST['Logout'])) {
			# code...
			session_unset($_SESSION['loggedUser']);
			header('Location: home.php');
		}

if (isset($_POST['accept_button'])) {
	# code...

	if ($order_status=='') {
		# code...
	

	$session_user = $_SESSION['loggedUser'];
	$session_user_id = $_SESSION['loggedUser_id']; 
	 $query = "UPDATE `orders` SET `o_seller_name`='$session_user',`o_seller_id`='$session_user_id', `order_status`='accepted' WHERE `order_id`='$order_id' and `order_name`='$order_name' ";

            if (mysqli_query( $conn, $query )) {
        # code...
              echo'<div style="margin : 0px;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Accepted
</div>';

	}
}else{

	 echo'<div style="margin : 0px;" class="alert alert-info alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  You Alredy Envolved
</div>';
	}
}



?>

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
	<title>Order Details</title>
</head>
<body>

	<nav style="min-height: 70px;  background-color: #2f3241 ; border-bottom:1px solid #1a1b23;" class="navbar fixed-top navbar-expand-md navbar-dark navbar-glossy">
    <div class="container-fluid">
    <a href="home.php" class="navbar-brand d-flex w-50 mr-auto"><img style="height: 5vh; width: 30vh;" src="img/logo.png"></a>
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

        	<li class="nav-item">

            
                <?php 
                   # session_start();
                if (isset($_SESSION['loggedUser'])) {
                    # code...
                    echo'<a style="margin-right:10px;color:#DD6D39 ;"href="sprofile.php">'.$_SESSION["loggedUser"].'</a>
                    ';

                } 

                ?>

           
                


                
            </li>



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
<br>	
<h2 style="text-align: center; margin: 0 auto;" class="h2">Product Details</h2>

<br>


<div class="card">

	<div class="row">
		<aside class="col-sm-5 border-right">
<article class="gallery-wrap "> 
<div class="img-big-wrap">
   <img class="col-sm-12 rounded" src="img/details/<?php echo $order_type ?>.png">
</div> <!-- slider-product.// -->

<!--
<div class="img-small-wrap">
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
  <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
</div>  slider-nav.// -->


</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
<article class="card-body p-5">
	<h3 class="title mb-3"><?php echo $order_name ?></h3>

<p class="price-detail-wrap"> 
	<span class="price h3 text-warning"> 
		<span class="currency text-success">BDT </span><span class="num text-danger"><?php echo $order_price ?>&#2547;</span>
	</span> 
	 
</p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p><?php echo $order_desc ?></p></dd>
</dl>
<dl class="param param-feature">
  <dt>Client</dt>
  <dd><?php echo $o_buyer_name ?></dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>Delivary Time</dt>
  <dd><?php echo $order_delivary ?></dd>
</dl>  <!-- item-property-hor .// -->
 <!-- item-property-hor .// -->

<hr>
	
<form method="post">
	<input type="submit" value="Accept" name="accept_button" class="btn btn-lg btn-success text-uppercase">  </a></form>
	<!--<a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a> -->
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->



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