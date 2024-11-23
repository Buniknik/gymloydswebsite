<?php
session_start();
include 'include/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit();
    }

    // Perform the SQL query to get the hashed password from the database
    $sql = "SELECT * FROM memberlist WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Password is correct
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['user_id']; // Correct variable name to match the fetched data

            // Redirect to the dashboard or other desired page
            header("Location: members/dashboard.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // Invalid username
        echo "Invalid username or password.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Pro Fitness center HTML5 web Template | WebThemez</title>
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico"> 
    <style>
        /* Container and layout */
        .section {
          padding: 50px 0;
          background-image: url('images/banner/bg1.jpg');
              background-size: cover;
              background-position: center;
              padding: 100px 0;
              color: white;
              text-align: center;
              color: #c2185b;
        }

        /* Form with white background */
        .form-white {
          padding: 30px;
          background-color: #ffffff; /* White background */
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          position: relative;
          overflow: hidden;
          transition: transform 0.5s ease-in-out, box-shadow 0.3s ease-in-out;
          color: #c2185b;
          
        }

        /* Form with pink background */
        .form-pink {
          padding: 30px;
          background-color: #c2185b; /* Pink background */
          color: #fff; /* White text color for contrast */
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
          position: relative;
          overflow: hidden;
          transition: transform 0.5s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Hover effect with slide transition */
        .form-wrap:hover {
          transform: translateY(-15px); /* Slide effect on hover */
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
          margin-bottom: 30px;
        }

        /* Increase font size for input text */
        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        input[type="number"], 
        select {
          font-size: 18px; /* Make the input text larger */
          padding: 25px; /* Add padding for a larger input field */
          border: 1px solid #ccc;
          border-radius: 5px;
          width: 100%;
          box-sizing: border-box;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          
        }

        /* Increase font size for select dropdown */
        .select-wrap select {
          appearance: none;
          border: 1px solid #ccc;
          padding: 25px; /* Make the select field larger */
          font-size: 18px; /* Increase text size */
          color: black;
        }

        /* Button styles */
        .btn {
          font-size: 16px;
          padding: 20px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        

        

    </style>

</head> 

<body    >

<header id="header">
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="index.html"><h1>LOYD'S FITNESS GYM</h1></a>
            </div>
            
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll"><a href="index.php">Home</a></li>  
                    <li class="scroll"><a href="index.php">Services</a></li>
                    <li class="scroll"><a href="index.php">About</a></li> 
                    <li class="scroll"><a href="index.php">Experts</a></li> 
                     <li class="scroll"><a href="index.php">Gallery</a></li>
                    <li class="scroll"><a href="index.php">Package</a></li>
                    <li class="scroll"><a href="index.php">Contact</a></li>  
                    <li class="scroll active"><a href="login.php">Login</a></li>                      
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header>

    

    <!-- section for membership form -->

    <section class="section">
      <div class="container">
        <div class="row">
            
          <!-- First form with white background -->
          

          <!-- Second form with pink background -->
          <div class="col-md-6">
            <div class="form-wrap form-pink overlap element-animate">
              <h2 class="h2">Log in</h2>
              <form action="login.php" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <input type="hidden" name="event_id" value="<?php echo $event['event_id']; ?>">
                <div class="form-group">
                  <p>Forgot your password? <a href="#" style="color: #fff;">click here</a></p>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block py-3" value="Log In">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>





    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2018 Company Name. <a href="https://webthemez.com/free-bootstrap-templates/" target="_blank">Free Bootstrap Templates</a> by WebThemez.com
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
 <script src="contact/jqBootstrapValidation.js"></script>
 <script src="contact/contact_me.js"></script>
    <script src="js/custom-scripts.js"></script>

</body>
</html>