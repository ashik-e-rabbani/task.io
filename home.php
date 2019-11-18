<?php

include('connection.php');

#buyer_registration begins


if (isset($_POST["buyer_reg_submit"])) {
    # code...

    $buyer_name =  $_POST["full_name"] ;
    $buyer_password =  $_POST["buyer_pass"];
    $buyer_email    =  $_POST["buyer_email"];






    if ($buyer_name && $buyer_password && $buyer_email)
    {
        $query = "INSERT INTO `task_user` (`userid`, `user_fname`, `user_email`, `user_type`, `user_contact`, `user_area`, `user_pass`) VALUES (NULL, '$buyer_name', '$buyer_email ', 'buyer', '', '', '$buyer_password ')";
    }
    

    if (mysqli_query( $conn, $query )) {
        # code...
        echo'<div style="margin : 0px;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Registration</strong> Successfull
</div>';
        

    } else

     echo " Error: ". $query . "<br>" . mysqli_error($conn) ;
}


#buyer_registration ends



#seller_registration begins


if (isset($_POST["seller_reg_submit"])) {
    # code...



    $seller_name =  $_POST["seller_name"] ;
    $seller_password =  $_POST["seller_password"];
    $seller_email    =  $_POST["seller_email"];
    $seller_contact =  $_POST["seller_contact"] ;
    $seller_area =  $_POST["seller_area"];
   



    if ($seller_name && $seller_password && $seller_email )
    {
        $query = "INSERT INTO `task_user` (`userid`, `user_fname`, `user_email`, `user_type`, `user_contact`, `user_area`, `user_pass`) VALUES (NULL, '$seller_name', '$seller_email', 'seller', '$seller_contact', '$seller_area', '$seller_password ')";
    }
    

    if (mysqli_query( $conn, $query )) {
        # code...
       echo'<div style="margin : 0px;" class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Registration</strong> Successfull
</div>';
        

    } else

     echo " Error: ". $query . "<br>" . mysqli_error($conn) ;
}


#seller_registration ends



if (isset($_POST["login_user"])) {
    # code...
    session_start();

    $typed_Username =  $_POST["typed_email"] ;
    $typed_Password =  $_POST["typed_pass"];
    $salted = $typed_Password+" ";


    
    $query = " SELECT * FROM task_user WHERE user_email = '$typed_Username'";

    $result = mysqli_query($conn ,$query);




    if (mysqli_num_rows($result)>0) {
        # now we have data
    // output of data


        while ( $row = mysqli_fetch_assoc($result)) {
            # code...


            $db_pas = $row["user_pass"];
            $user_type = $row["user_type"];
            $user_fname = $row["user_fname"];
            $user_id = $row["userid"];


        } // end of while
         

        if ($salted == $db_pas) {
            # code...
            echo "<div class='alert alert-success'> Success! </div>";
            $_SESSION['loggedUser'] = $typed_Username;
            $_SESSION['loggedUser_type'] = $user_type;
            $_SESSION['loggedUser_name'] = $user_fname;
             $_SESSION['loggedUser_id'] = $user_id;

            if ($user_type == 'buyer') {
                header('location: profile.php');
            }else{
                header('location: sprofile.php');
            }

            
        }else
        {
             echo'<div style="margin : 0px;" class="alert alert-danger alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Incorrect Password</strong> Login Failed
</div>';
        }


    } else {

       

    } // end of else

}


if (isset($_POST['redirect_to_profile'])) {
    # code...
    header('location: profile.php');
}


           
if (isset($_POST['local_search'])) {
  # code...
  $type = $_POST['search'];

session_start();
$_SESSION['localsearch'] = $type;

header('location: localsearch.php');

}









?>


</style>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>Task.io</title>

			 <!-- Bootstrap CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/home-section-3.css">
<link rel="stylesheet" type="text/css" href="css/serviceSection.css">
<link rel="stylesheet" type="text/css" href="css/homefadelogo.css">
<link rel="stylesheet" type="text/css" href="css/navlinks.css">
<link rel="stylesheet" type="text/css" href="css/sliderSection.css">
<link rel="stylesheet" type="text/css" href="css/voicelogin.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script type="text/javascript" src="js/slider.js"></script>


</head>
<body>

<section style=" margin: 0px; padding: 0px; background-image: linear-gradient(to right top, #051937, #004369, #007392, #00a5ab, #36d7b3);">
<nav  class="navbar navbar-expand-md navbar-dark navbar-glossy">
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
                    echo'<a class="nav-link"  href="profile.php">'.$_SESSION["loggedUser"].'</a>
                    ';

                } else{

                    echo '
                <a id="bas" class="nav-link" data-toggle="modal" data-target="#loginModal" href="#">Login</a>'
            ;
                }

                ?>

           
                


                
            </li>

            <li class="nav-item">
                 <a id="bas" class="nav-link" data-toggle="modal" data-target="#sellerModal" href="#">Become a seller</a>
            </li>
            
            <li class="nav-item ">
                 <a id="bas" class="nav-link" data-toggle="modal" data-target="#singupModal" href="#">Sing up</a>
            </li>
        </ul>
    </div>
    </div>
</nav>

<div 
    class="col-md-12 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2"
    style=" min-height:90vh; ">

    <div style=" padding: 30px;" class="row ">

        <!-- left side -->
        
        <div id="homesl" style="text-align: center; top: 50%;
  left:50%; position: absolute;
  transform: translate(-50%, -50%);" class="col-12 ">
          

       

            <h1 class="font-weight-normal text-white" > 
              <p style="display: inline;" href="" class="typewrite font-weight-normal text-white" data-period="3000" data-type='[ "Hey, are you stuck with your work?","Github code is not running?", "Seeking for solution?", "Here is your friend TASKBD", "Ready to Go" ]'>
                <span class="wrap"></span>
              </p>
            </h1><br><br>

            <div class="row">
              <div class="col-4"></div>
              <div class="col-4">
                <form class='navbar-form'  method="post">
          <div class='input-group'>
            
                <input class='form-control' type='text' name='search' placeholder='try "presentation" ' required/>
                <span class="input-group-btn">
              
                  <input type='submit' value="Search" name="local_search" class='btn btn-danger'>
                    
                  </button>
              
            </span>
           
          </div>
        </form>
      </div>

      <div class="col-4"></div>
            </div>

                      <br><br><h1> </h1>


        </div>
         



     </div>



</div>

</section>
 <!-- The Login Modal -->
  <div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
      <div style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);" class="modal-content">
      
       
        
        <!-- Login Modal body -->

        <div  class="container">
            <br>
            <h2 class="text-center">Login</h2>
            <br>
       <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" style="margin-left: 80px; margin-right: 80px" method="POST">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="typed_email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="typed_pass" required>
  </div>
  
  <input type="submit" class="btn btn-success center-block" name="login_user"></input>
</form>
</div>
    
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



 <!-- The Singup Modal buyer -->
  <div class="modal fade " id="singupModal">
    <div class="modal-dialog modal-dialog-centered">
      <div style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);" class="modal-content">
      
       
        
        <!-- singup Modal body -->

       <div  class="container">
            <br>
            <h2 class="text-center">Sing Up</h2>
            <br>
       <form style="margin-left: 80px; margin-right: 80px" action="#" method="post">

        <div class="form-group">
    <label for="f_name">Full Name:</label>
    <input type="text" class="form-control" id="f_name" name="full_name" required>
  </div>


  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="buyer_email" name="buyer_email" required>
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="buyer_pass" name="buyer_pass" required>
  </div>

  <input type="submit" class="btn btn-success center-block" name="buyer_reg_submit"></input>
</form> <!-- end of buyer reg form -->
</div>
    
    
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


       <!-- Seller reg footer -->
<div class="modal fade" id="sellerModal">
    <div class="modal-dialog modal-dialog-centered">
      <div style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);" class="modal-content">
          <!-- Seller Modal body -->

       <div  class="container">
            <br>
            <h2 class="text-center">Seller Registration</h2>
            <br>
       <form style="margin-left: 80px; margin-right: 80px" action="#" method="POST">

        <div class="form-group">
    <label for="full_name">Full Name:</label>
    <input type="text" class="form-control" id="full_name" name="seller_name" required>
  </div>


  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="seller_email" required>
  </div>


  <div class="form-group">
    <label for="email">Contact No:</label>
    <input type="text" class="form-control" id="contact_no" name="seller_contact" required>
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="seller_password" required>
  </div>

  <div  class="form-group">
  <label for="expert">Expert Area:</label>
  <select class="form-control" id="expert" name="seller_area" required>
    <option value="assignment">Assignment</option>
    <option value="project">Project</option>
    <option value="labreport" >Lab Report</option>
    <option value="presentation">Presentation</option>
    <option value="remotehelp">Remote Help</option>
  </select>
</div>
  
  
  <input type="submit" class="btn btn-success center-block" name="seller_reg_submit"></input>
</form>
</div>
    
    
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>





<br>
<br>
<br>




<!-- Services section -->
    <div  class="row">
        <div class="col-sm-1"></div>
        <div  class="col-sm-10">
            <section id="what-we-do">
        <div class="container-fluid ">
            <h2 class="section-title mb-2 h1 ">Our Services</h2>
            <p class="text-center text-muted h5 font-weight-normal">Choose your desired service from us</p>
             <div class="col-sm-2"></div>
              <div class="col-sm-2"></div>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card ">
                        <div class="card-block block-1">
                            <h3 class="card-title font-weight-normal">Project</h3>
                            <p class="card-text font-weight-normal">Make your project done by our experienced team and sellers.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-2">
                            <h3 class="card-title font-weight-normal">Presentation</h3>
                            <p class="card-text font-weight-normal">Make your presentation slides using prezi / powerpoint by our sellers.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-3">
                            <h3 class="card-title font-weight-normal">Lab Report</h3>
                            <p class="card-text">Make Report content more attractive.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-4">
                            <h3 class="card-title font-weight-normal">Android</h3>
                            <p class="card-text font-weight-normal">Make android apps  also available cross platform service.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-5">
                            <h3 class="card-title font-weight-normal">Assignment</h3>
                            <p class="card-text">Make Assignment content more attractive.</p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-block block-6">
                            <h3 class="card-title font-weight-normal">Remote Help</h3>
                            <p class="card-text font-weight-normal">Time to Worry about your random computer problem is over. </p>
                            <a href="javascript:void();" title="Read more" class="read-more" >Explore<i class="fa fa-angle-double-right ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <!-- /Services section -->

        </div>

        <div class="col-sm-1"></div>

    </div> <!-- end div of service -->

    <br>
<br>
<br><br>
<br>




    
        <div style=" min-height: 50vh;" class="row ">
            <div class="col-sm-1"></div>
            <div class="col-sm-5 thrd-sec">
                     <div class="container ">
  <h3 class="font-weight-normal">Give Your Business The Right Tools</h3>    
  
  <br>
  <br>
  <dl>
    <dt ><p style="display: inline; color: #007b5e; ">&#9783; </p> Full Transparency</dt>
    <dd class="font-weight-normal">A new shared dashboard allows you to track your team's activity, so that everyone is always in sync.</dd>

    <br>

    <dt><p style="display: inline; color: #007b5e; ">&#9783; </p> VIP Customer Support</dt>
    <dd class="font-weight-normal">Quick response time and upgraded support solutions will help you to get what you need, when you need it.</dd>

    <br>

    <dt><p style="display: inline; color: #007b5e; ">&#9783; </p> Improved Billing Options</dt>
    <dd class="font-weight-normal">One team - one payment method. You can now add a card on file that every team member can use.</dd>

     </dl>     
            </div>
            </div>
             

            <div class="col-sm-5 thrd-sec">
                
                <div class="row">
                        <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <img style=" margin: 20px;  height: auto;" src="img/lggg.png">
                    </div>
                        <div class="col-sm-4"></div>
                </div>



            </div>

            <div class="col-sm-1"></div>
             </div>


<br><br><br><br>
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
                    <p><u><a href="#">AF software solution</a></u> is an under developing company in Bangladesh</p>
                    <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.ashikrabbani.com" target="_blank">taskbd.io</a></p>
                </div>
                </hr>
            </div>  
        </div>
    </section>
 
	





<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script type="text/javascript" src="slider.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/typeWritter.js"></script>
</body>
</html>