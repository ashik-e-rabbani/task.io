<?php
include('connection.php');



		session_start();

		

		if (!isset($_SESSION['loggedUser'])) {
			


			header('Location: home.php');

			echo '<script type="text/javascript">
        
            alert("Required to Login First");
        
    </script>';
		}

		if (isset($_POST['Logout'])) {
			# code...
			session_unset($_SESSION['loggedUser']);
			header('Location: home.php');
		}


    if (isset($_POST['submitrequest'])) {
      # code...
          

           $logged_user = $_SESSION['loggedUser'] ;
          
          $loggedUser_name =   $_SESSION['loggedUser_name'];
           $loggedUser_id =   $_SESSION['loggedUser_id'] ;

            $task_name= $_POST['taskname'] ;
            $task_price= $_POST['price'] ;
            $task_delivary= $_POST['delivarydays'] ;
            $task_type= $_POST['tasktype'] ;
            $task_desc= $_POST['taskdescription'] ;

            $query = "INSERT INTO `orders` (`order_id`, `order_name`, `delivary_time`, `order_status`, `o_buyer_id`, `o_buyer_name`, `o_seller_id`, `o_seller_name`, `price`, `order_details`, `order_download_link`, `order_type`) VALUES 
            (NULL, '$task_name', '$task_delivary', '', '$loggedUser_id', '$logged_user', '', '', '$task_price', ' $task_desc', '', '$task_type')";

            if (mysqli_query( $conn, $query )) {
        # code...
              echo'<div style="margin : 0px;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  Request submission Successfull
</div>';
        

    }
            

    }


?>

<!DOCTYPE html>
<html>
<!-- Custom Stylesheet-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/make-req-form.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/sideNav.css">
<link rel="stylesheet" type="text/css" href="css/notification-popup.css">

<!-- CDN Stylesheet-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- CDN script-->

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- CDN Font awesome-->

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
</nav>

<div style="margin-top: 70px;" class="container">

<div class="row">            
<div class="col-md-3"></div>

<div class="col-md-6">
  
<div class="box">
  
  <div class="box-icon">
                    <span><i class="fas fa-align-justify"></i></span>
                </div><!--end of boxicon -->
<br>
 <div class="info">
                    <h4 class="text-center">Make Request</h4></div>
                    <br>
               <form method="post">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_taskname">Task name</label>
                    <input id="form_taskname" type="text" name="taskname" class="form-control" placeholder="Making website" required="required" data-error="Task name is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_price">Price</label>
                    <input id="form_price" type="text" name="price" class="form-control" placeholder="eg: 250 $" required="required" data-error="price is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_delivarydays">Delivary days</label>
                    <input id="form_delivarydays" type="text" name="delivarydays" class="form-control" placeholder="eg : 3/7 days" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_type">Task Type*</label>
                    <select id="form_type" name="tasktype" class="form-control" required="required" data-error="Please specify your need.">
                        <option value="assignment">Assignment</option>
                        <option value="project">Project</option>
                        <option value="labreport" >Lab Report</option>
                        <option value="presentation">Presentation</option>
                        <option value="remotehelp">Remote Help</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_desc">Task Description</label>
                    <textarea id="form_desc" name="taskdescription" class="form-control" placeholder="Description of your task." rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="submitrequest" class="btn btn-danger btn-send" value="Submit Request">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    <strong>*</strong> These fields are required. </p>
            </div>
        </div>
    </div>

</form>
 

</div><!--end of box -->


</div>










<div class="col-md-3"></div>
</div><!--end of row -->
    
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