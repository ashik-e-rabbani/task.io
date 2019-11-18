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


		if (isset($_POST['make_order'])) {
			header('Location: draft.html');
		}


		if (isset($_POST['makeorder'])) {
			# code...
			header('Location: makerequest.php');



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
            <span>Online</span>
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
              <i class="fab fa-servicestack"></i>
              <span>Services</span>
              <span class="badge badge-pill badge-warning">New</span>
            </a>
            <div class="sidebar-submenu">
              <ul>

              	<form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">

	                <li>
	                  <a> <button name="assignment" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Assignment</button> </a>
	                </li>
	                <li>
	                 <a> <button name="labreport" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Lab Report</button> </a>
	                </li>
	                <li>
	                  <a> <button name="presentation" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Presentation</button> </a>
	                </li>
	                 <li>
	                  <a> <button name="project" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Project</button> </a>
	                </li>
	                <li>
	                  <a> <button name="remotehelp" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Remote Help</button> </a>
	                </li>

               </form>

              </ul>
            </div>
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
                  <a> <button name="makeorder" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Make Order</button> </a>
                </li>


                <li>
                  <a> <button name="allorder" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >All Orders</button> </a>
                </li>
                <li>
                  <a> <button name="completedorder" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Completed Orders</button> </a>
                </li>
                <li>
                  <a> <button name="ongoingorders" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Accepted Orders</button> </a>
                </li>
            </form>
                
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
           
            <a> <i class="fa fa-book"></i><button name="payment" style="background: transparent; border: none; color:rgba(255,255,255,0.4); padding:  0px" >Payment</button><span class="badge badge-pill badge-primary">Beta</span> </a>
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
      			if (isset($_POST["presentation"])) {
      				# code...
      				echo "Presentation";
      			}elseif (isset($_POST["labreport"])) {
      				# code...
      				echo "Lab Report";
      			}elseif(isset($_POST["project"])){
      				echo "Projects";
      			}elseif (isset($_POST["assignment"])) {
      				# code...
      				echo "Assignment";
      			}elseif(isset($_POST["remotehelp"])){
      				echo "Remote Help";
      			}elseif(isset($_POST["makeorder"])){
      				echo "Make Order";

      			}elseif(isset($_POST["allorder"])){
      				echo "All Orders";

      			}elseif(isset($_POST["completedorder"])){
              echo "Completed Orders";

            }elseif(isset($_POST["ongoingorders"])){
              echo "Accepted Orders";

            }


      			else{
      				echo "All Services";
      			}
      	?>

      </h2>
      <hr>

      	<div class="container-fluid">
      		

      		<?php
        
      		$section_val=0;
            $query = "SELECT * FROM `products`";


        if (isset($_POST["presentation"])) {

              $query = "SELECT * FROM `products` WHERE product_type='presentation'";


            }elseif (isset($_POST["labreport"])) {

              $query = "SELECT * FROM `products` WHERE product_type='labreport'";

            }elseif(isset($_POST["project"])){

              $query = "SELECT * FROM `products` WHERE product_type='project'";

            }elseif (isset($_POST["assignment"])) {

              $query = "SELECT * FROM `products` WHERE product_type='assignment'";


            }elseif(isset($_POST["remotehelp"])){
              
              $query = "SELECT * FROM `products` WHERE product_type='remotehelp'";

            }elseif(isset($_POST["makeorder"])){
            		$section_val = 1;
      				order_Section($section_val);  
      				
      			}elseif(isset($_POST["allorder"])){
      				$section_val = 11;
      				order_Section($section_val); 
      			}elseif (isset($_POST["completedorder"])) {
              $section_val = 12;
              order_Section($section_val);
            }elseif(isset($_POST["ongoingorders"])){
              $section_val = 13;
              order_Section($section_val);}

            else{
                $query = "SELECT * FROM `products`";
            }


           if ($section_val == 0) {
             	# code...
             
              #taking query now time to show result
            $result = mysqli_query($conn ,$query);

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
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$product_price.'</a>
                <a href="#" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>          
        </div>
        ';

          }
    }else {

  echo "No Result Found";

}
 } 

function order_Section($section_val)
{
	if ($section_val==1) {
		# code...

			echo '
            ';

}elseif ($section_val==10) {
	# code...
	echo "Submitted";
}

elseif($section_val==11){
		

#data for all orders show

$server 	= "localhost";
$username 	= "root";
$password	= "";
$db 		= "task";

// creating separate  connectionbcz new db is coming

$conn = mysqli_connect($server,$username,$password,$db );

	$logged_user = $_SESSION['loggedUser'] ;

	$query = "SELECT * FROM `orders` WHERE o_buyer_name='$logged_user'";
	$result = mysqli_query($conn ,$query);

if (mysqli_num_rows($result)>0) {

	echo '<div class="row"> ';
while ($row = mysqli_fetch_assoc($result)) {
    	# code...
             $task_name= $row['order_name'] ;
            $task_price= $row['price'] ;
            $task_delivary= $row['delivary_time'] ;
            $task_type= $row['order_type'] ;
            $task_desc= $row['order_details'] ;

 echo '

                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
          <div class="card rounded-0 p-0 shadow-sm">


          
            <img src="img/'.$task_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

            <div class="card-body text-center">
                <h6 class="card-title">'.$task_name.'</h6>
                <p class="card-text">'.$task_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$task_price.'</a>
                <a href="#" target="_blank" class="btn btn-success btn-sm">Delete</a>
            </div>
          </div>          
        </div>
        ';

          }
    }else {

  echo "No Result Found";
}
}elseif($section_val==12){
    

#data for all orders show

$server   = "localhost";
$username   = "root";
$password = "";
$db     = "task";

// creating separate  connectionbcz new db is coming

$conn = mysqli_connect($server,$username,$password,$db );

  $logged_user = $_SESSION['loggedUser'] ;

  $query = "SELECT * FROM `orders` WHERE o_buyer_name='$logged_user' and order_status='completed'";
  $result = mysqli_query($conn ,$query);

if (mysqli_num_rows($result)>0) {

  echo '<div class="row"> ';
while ($row = mysqli_fetch_assoc($result)) {
      # code...
             $task_name= $row['order_name'] ;
            $task_price= $row['price'] ;
            $task_delivary= $row['delivary_time'] ;
            $task_type= $row['order_type'] ;
            $task_desc= $row['order_details'] ;
             $task_seller = $row['o_seller_name'] ;
 echo '

                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
          <div class="card rounded-0 p-0 shadow-sm">


          
            <img src="img/'.$task_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

            <div class="card-body text-center">
                <h6 class="card-title">'.$task_name.'</h6>
                <p class="card-text">'.$task_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$task_price.'</a>
                <a href="payment.php?value_key='.$task_name.'&value_key2='.$task_price.'&value_key3='.$task_seller.'"  class="btn btn-primary btn-sm">Pay</a>
            </div>
          </div>          
        </div>
        ';

          }
    }else {

  echo "No Result Found";
}
}elseif($section_val==13){
    

#data for all orders show

$server   = "localhost";
$username   = "root";
$password = "";
$db     = "task";

// creating separate  connectionbcz new db is coming

$conn = mysqli_connect($server,$username,$password,$db );

  $logged_user = $_SESSION['loggedUser'] ;

  $query = "SELECT * FROM `orders` WHERE o_buyer_name='$logged_user' and order_status='accepted'";
  $result = mysqli_query($conn ,$query);

if (mysqli_num_rows($result)>0) {

  echo '<div class="row"> ';
while ($row = mysqli_fetch_assoc($result)) {
      # code...
             $task_name= $row['order_name'] ;
            $task_price= $row['price'] ;
            $task_delivary= $row['delivary_time'] ;
            $task_type= $row['order_type'] ;
            $task_desc= $row['order_details'] ;
 echo '

                  <div style="margin-bottom: 20px;" class="col-xs-12 col-sm-6 col-md-6 col-lg-4">          
          <div class="card rounded-0 p-0 shadow-sm">


          
            <img src="img/'.$task_type.'.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">

            <div class="card-body text-center">
                <h6 class="card-title">'.$task_name.'</h6>
                <p class="card-text">'.$task_desc.'</p>
                <a href="#" target="_blank" class="btn btn-danger btn-sm">BDT: '.$task_price.'</a>
                <a href="#" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>          
        </div>
        ';

          }
    }else {

  echo "No Result Found";
}
}





	}
	# code...


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