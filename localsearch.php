<?php
session_start();

echo $_SESSION['localsearch'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/sideNav.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
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
       		<form method="post">   
       		   <li class="nav-item ">
                  <a> <button name="Logout" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Logout</button> </a>
            </li>
            </form>
        </ul>
    </div>
    </div>
</nav>

<div style="padding: 80px;" class="container">
<?php
include('connection.php');

$type = $_SESSION['localsearch'];
$query = "SELECT * FROM `products` WHERE product_type='$type'";
	
 $result = mysqli_query($conn ,$query);

echo "<h3>$type</h3><hr>";
              if (mysqli_num_rows($result)>0) {
          # now we have data
          // output of data



        echo'<div class="row"> ';


        while ($row = mysqli_fetch_assoc($result)) {
    	# code...
          $product_id = $row["pid"];
          $product_name = $row["p_name"];
              $product_price = $row["p_price"];
              $product_type = $row["product_type"];
              $product_desc = $row["p_description"];
              
    
              #$_SESSION['clickedItem'] =$product_id;
        echo '
                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
          <div class="card rounded-0 p-0 shadow-sm">


          
            <img src="img/'.$product_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

            <div class="card-body text-center">
                <h6 class="card-title">'.$product_name.'</h6>
                <p class="card-text">'.$product_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$product_price.' TK</a>
                
            </div>
          </div>          
        </div>
        ';

          }
    }else {

  echo "No Result Found";

}

?>

	</div>

</body>
</html>