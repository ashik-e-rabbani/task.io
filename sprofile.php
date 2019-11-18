<?php
include('connection.php');



		session_start();

		

		if (!isset($_SESSION['loggedUser'])) {
			


			header('Location: home.php');

			echo '<script type="text/javascript">alert("Need to Login First");</script>';
		}

		if (isset($_POST['Logout'])) {
			# code...
			session_unset($_SESSION['loggedUser']);
			header('Location: home.php');
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
<head>
	<title>Task.io</title>
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
       		<form method="post">   
       		   <li class="nav-item ">
                  <a> <button name="Logout" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Logout</button> </a>
            </li>
            </form>
        </ul>
    </div>
    </div>
</nav>





<div  class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" style="margin-top:  70px;" class="sidebar-wrapper ">
    <div class="sidebar-content">
	     <!-- <div class="sidebar-brand">
	        <a href="#">pro sidebar</a>
	        <div id="close-sidebar">
	          <i class="fas fa-times"></i>
	        </div>
	      </div> -->
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php echo $_SESSION['loggedUser_name']; ?></strong>
          </span>
          <span class="user-role"><?php echo $_SESSION['loggedUser_type']; ?></span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>

              <?php 

                if (isset($_SESSION['loggedUser'])) {

                  $seller_name = $_SESSION['loggedUser'];
                  
                  $query = "SELECT * FROM `payment` WHERE seller_name = '$seller_name' ";
                  $result = mysqli_query($conn ,$query);

                  while ($row = mysqli_fetch_assoc($result)) {
    # code...
            
              $income = $row["amount"];
  
}echo $income." TK";
                }

            ?></span>
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
         
          
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-sort-amount-up"></i>
              <span>Orders</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              
                <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">

                  <li>
                    <a> <button name="all_orders" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >All Orders</button> </a>
                  </li>
                  <li>
                   <a> <button name="completed_orders" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Completed</button> </a>
                  </li>
                  <li>
                    <a> <button name="on_going_orders" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >On Going</button> </a>
                  </li>
                 

               </form>


                
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Live Chat</span>
              <span class="badge badge-pill badge-primary">Coming</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
         
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <p>This is footer</p>
    </div>
  </nav> <!-- end of side nav -->


    <main style="margin-top:  80px;" class="page-content">
    <div class="container-fluid xyz">
      <h2>

      	<?php
      			if (isset($_POST["all_orders"])) {
      				# code...
      				echo "All Orders";
      			}elseif (isset($_POST["completed_orders"])) {
      				# code...
      				echo "Completed Orders";
      			}elseif(isset($_POST["on_going_orders"])){
      				echo "On Going Orders";}
      			else{
      				echo "On Going Orders";
      			}
      	?>

      </h2>
      <hr>

      	<div class="container-fluid">
      		

      		<?php
            
            $session_user = $_SESSION['loggedUser'];

            $query = "SELECT * FROM `orders` WHERE order_status='accepted' and o_seller_name='$session_user'";
            $display_mode =1;


        if (isset($_POST["all_orders"])) {

               $query = "SELECT * FROM `orders` WHERE order_status='' ";
               $display_mode =0;

            }elseif (isset($_POST["completed_orders"])) {

              $query = "SELECT * FROM `orders` WHERE order_status='completed' and o_seller_name='$session_user'";
              $display_mode =15;

            }elseif(isset($_POST["on_going_orders"])){

              $query = "SELECT * FROM `orders` WHERE order_status='accepted' and o_seller_name='$session_user'";
              $display_mode =1;

            }else{
                $query = "SELECT * FROM `orders` WHERE order_status='accepted' and o_seller_name='$session_user'";
                $display_mode =1;
            }


              
              #taking query now time to show result
            $result = mysqli_query($conn ,$query);

              if (mysqli_num_rows($result)>0) {
          # now we have data
          // output of data

        echo'<div class="row"> ';


        while ($row = mysqli_fetch_assoc($result)) {
    # code...
          $order_id = $row["order_id"];
          $order_name = $row["order_name"];
              $order_price = $row["price"];
              $order_type = $row["order_type"];
              $order_desc = $row["order_details"];
              
    

         if ($display_mode ==1) {
                 echo '
                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
               <div class="card rounded-0 p-0 shadow-sm">


          
              <img src="img/'.$order_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

              <div class="card-body text-center">
                <h6 class="card-title">'.$order_name.'</h6>
                
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$order_price.'</a>
                <a href="deliver_order.php?value_key='.$order_id.'&value_key2='.$order_name.'"  class="btn btn-primary btn-sm">Submit</a>
                <form method="post">

                
                </div>
              </div>          
            </div>
            ';
              }elseif($display_mode ==0){
                  echo '
                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
               <div class="card rounded-0 p-0 shadow-sm">


          
              <img src="img/'.$order_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

              <div class="card-body text-center">
                <h6 class="card-title">'.$order_name.'</h6>
                <p class="card-text">'.$order_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$order_price.'</a>
                <a href="order_details.php?value_key='.$order_id.'&value_key2='.$order_name.'"  class="btn btn-primary btn-sm">Preview</a>
                
                </div>
              </div>          
            </div>
            ';
              } elseif ($display_mode ==15) {
                # code...
                 echo '
                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
               <div class="card rounded-0 p-0 shadow-sm">


          
              <img src="img/'.$order_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

              <div class="card-body text-center">
                <h6 class="card-title">'.$order_name.'</h6>
                <p class="card-text">'.$order_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$order_price.'</a>
                
                
                </div>
              </div>          
            </div>
            ';
              }   
      

          }
    }else {

  echo '<div style=" height: 100vh;" class="d-flex justify-content-center align-items-center" id="main">
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">7093</h1>
    <div class="inline-block align-middle">
      <h2 class="font-weight-normal lead" id="desc">The data you requested was not found.</h2>
    </div>
</div>';

}

echo "</div>"; # end of the grid row

        ?>





      	</div> 

      
    </div>

  </main>
  <!-- page-content" -->

</div>






































<!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/sideNav.js"></script>
    
</body>
</html>