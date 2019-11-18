<?php

include('connection.php');
session_start();
 if(isset($_GET['value_key'])){
$order_id = $_GET['value_key']; //some_value
$order_name = $_GET['value_key2'];
}

if (isset($_POST['done'])) {

	$download_link = $_POST['download_link'];


  $query = "SELECT * FROM `orders` WHERE order_id='$order_id' and order_name='$order_name ' ";

            $result = mysqli_query($conn ,$query);
            while ($row = mysqli_fetch_assoc($result)) {
    # code...
         	  
              $d_link_db = $row["order_download_link"];
  
}

if ($download_link!=$d_link_db) {



	# code...

	$query = "UPDATE `orders` SET `order_download_link`='$download_link', `order_status`='completed' WHERE `order_id`='$order_id' and `order_name`='$order_name' ";

            if (mysqli_query( $conn, $query )) {
        # code...
             echo'<div style="margin : 0px;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Delivered to Buyer
</div>';

    }
}else{
echo'<div style="margin : 0px;" class="alert alert-warning alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Alredy Submitted
</div>';

}
	
}



?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/sideNav.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!-- centering ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<head>
	<title>Order Delivary</title>
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



<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh">

	 <div class="col-sm-5 my-1">
      <p>You are submitting for<em class="text-success"> <?php  echo $order_name?></em></p>
      <form method="post">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-link"></i></div>
        </div>
        	
        <input type="text" class="form-control" name="download_link" id="download_link" placeholder="share your file link">
        
         	
         
         		
         		<input type="submit" class="btn btn-danger" name="done" value="Submit">

         	

        

      </div>
      </form>
    </div>
    
</div>




</body>
</html>