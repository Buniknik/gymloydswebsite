<?php
session_start();
// Include the database connection
include('include/db.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize input to prevent XSS and SQL injection
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);

    // Check if all fields are filled out
    if (!empty($name) && !empty($email) && !empty($feedback)) {
        // Sanitize email address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = 'Invalid email format.';
            header('Location: index.php');
            exit();  // Ensure no further code is executed after the redirect
        }

        // Prepare SQL query to insert feedback into the database
        $query = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            // Set session variables for success message
            $_SESSION['action'] = 'success';
            $_SESSION['message'] = 'Thank you for your feedback!';
            header('Location: index.php');
            exit();  // Ensure no further code is executed after the redirect
        } else {
            // Set session variables for error message
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = 'Error: Could not submit your feedback. Please try again later.';
            header('Location: index.php');
            exit();  // Ensure no further code is executed after the redirect
        }
    } else {
        // Set session variables for missing fields error
        $_SESSION['action'] = 'error';
        $_SESSION['message'] = 'All fields are required.';
        header('Location: index.php');
        exit();  // Ensure no further code is executed after the redirect
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Loyds Fitness gym</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <!-- <div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
            <div class="container">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                            <a href="tel:+01234567890" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>0963 201 9988</a>
                            <a href="mailto:example@gmail.com" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>loydsfitnessgym@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="display-6 text-warning"></i>LOYD'S FITNESS GYM</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto py-0">
                            <a href="index.php" class="nav-item scroll nav-link active">Home</a>
                            <a href="about.php" class="nav-item scroll nav-link">About</a>
                            <a href="service.php" class="nav-item scroll nav-link">Service</a>
                            <a href="#package" class="nav-item scroll nav-link">Packages</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link scroll dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0">
                                    <a href="#timetable" class="dropdown-item scroll">Time Table</a>
                                    <a href="#trainers" class="dropdown-item scroll">Our Trainers</a>
                                </div>
                            </div>
                            <a href="login2.php" class="nav-item nav-link">Login</a>
                        </div>
                        <!-- <a href="form1.php" class="btn btn-primary rounded-pill  py-1 px-3">Join Now!</a> -->
                    </div>
                </nav>
            </div>
        </div>
        
        <!-- Navbar & Hero End -->

        <!-- Carousel Start -->
        <section id="home" class="position-relative">
    <!-- Overlay for Gradient Effect -->
    <div class="overlay position-absolute w-100 h-100" style="background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

    <!-- Main Content -->
    <div class="carousel-content position-relative" style="z-index: 2;">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- Background Image -->
                    <img src="img/loyd18.jpg" class="img-fluid w-100" alt="First slide" />

                    <!-- Carousel Caption Content -->
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="container text-center">
                            <h1 class="display-3 text-light fw-bold mb-3" style="animation: fadeInDown 1s ease-in-out;">
                                Where Your Fitness Goals Become Reality!
                            </h1>
                            <p class="lead text-white-50 mb-4" style="animation: fadeInUp 1.5s ease-in-out;">
                                Join us and take the first step towards a healthier, fitter you.
                            </p>
                            <a href="membershipform.php" class="btn btn-primary btn-lg rounded-pill px-4 py-2 mb-5" style="animation: fadeInUp 2s ease-in-out;">
                                Get Started
                            </a>

                            <!-- Counter Section -->
                            <!-- <div class="container counter py-5">
                                <div class="container py-5">
                                    <div class="row g-5">
                                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="counter-item text-center">
                                                <div class="counter-item-icon mx-auto">
                                                    <i class="fas fa-smile fa-2x"></i>
                                                </div>
                                                <div class="counter-counting my-3">
                                                    <span class="text-white fs-2 fw-bold" data-toggle="counter-up">829</span>
                                                    <span class="h1 fw-bold text-white">+</span>
                                                </div>
                                                <h4 class="text-white mb-0">Happy Clients</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="counter-item text-center">
                                                <div class="counter-item-icon mx-auto">
                                                    <i class="fas fa-dumbbell fa-2x"></i>
                                                </div>
                                                <div class="counter-counting my-3">
                                                    <span class="text-white fs-2 fw-bold" data-toggle="counter-up">56</span>
                                                    <span class="h1 fw-bold text-white">+</span>
                                                </div>
                                                <h4 class="text-white mb-0">Experienced Trainers</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                                            <div class="counter-item text-center">
                                                <div class="counter-item-icon mx-auto">
                                                    <i class="fas fa-trophy fa-2x"></i>
                                                </div>
                                                <div class="counter-counting my-3">
                                                    <span class="text-white fs-2 fw-bold" data-toggle="counter-up">127</span>
                                                    <span class="h1 fw-bold text-white">+</span>
                                                </div>
                                                <h4 class="text-white mb-0">Successful Programs</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                                            <div class="counter-item text-center">
                                                <div class="counter-item-icon mx-auto">
                                                    <i class="fas fa-clock fa-2x"></i>
                                                </div>
                                                <div class="counter-counting my-3">
                                                    <span class="text-white fs-2 fw-bold" data-toggle="counter-up">589</span>
                                                    <span class="h1 fw-bold text-white">+</span>
                                                </div>
                                                <h4 class="text-white mb-0">Hours Opened</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- End of Counter Section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid counter py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="counter-item text-center">
                            <div class="counter-item-icon mx-auto">
                                <i class="fas fa-smile fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-white fs-2 fw-bold" data-toggle="counter-up">829</span>
                                <span class="h1 fw-bold text-white">+</span>
                            </div>
                            <h4 class="text-white mb-0">Happy Clients</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="counter-item text-center">
                            <div class="counter-item-icon mx-auto">
                                <i class="fas fa-dumbbell fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-white fs-2 fw-bold" data-toggle="counter-up">56</span>
                                <span class="h1 fw-bold text-white">+</span>
                            </div>
                            <h4 class="text-white mb-0">Experienced Trainers</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="counter-item text-center">
                            <div class="counter-item-icon mx-auto">
                                <i class="fas fa-trophy fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-white fs-2 fw-bold" data-toggle="counter-up">127</span>
                                <span class="h1 fw-bold text-white">+</span>
                            </div>
                            <h4 class="text-white mb-0">Successful Programs</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="counter-item text-center">
                            <div class="counter-item-icon mx-auto">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-white fs-2 fw-bold" data-toggle="counter-up">589</span>
                                <span class="h1 fw-bold text-white">+</span>
                            </div>
                            <h4 class="text-white mb-0">Hours Opened</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Additional Styling -->
        
        <!-- Carousel End -->

        <!-- About Start -->
        <section id="about">
            <div class="container-fluid bg-black overflow-hidden about py-5">
                
                <div class="container py-5">
                    <div class="row g-5">
                        <!-- First Column: Text Content -->
                        <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="about-item">
                            <h1 class="display-5 text-center text-capitalize">Gym <span class="text-primary">About</span></h1>
                            <p class="mt-4" style="font-size: 1.5rem;">
                                    Loyd's Fitness Gym is dedicated to providing a comprehensive fitness experience for everyone, regardless of fitness level. We offer a wide range of services including personal training, group classes, and a well-equipped facility designed to help you achieve your fitness goals.
                                </p>

                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="about.php" class="btn btn-primary mt-4 px-4 py-2">About Us</a>
                            </div>
                        </div>
                
                        <!-- Second Column: Image -->
                        <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                            <div class="about-item">
                                <img src="loyds/loyds2.jpg" class="img-fluid rounded h-100 w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                        <h1 class="display-5 text-center text-capitalize mb-5">Why <span class="text-primary">Choose Us</span></h1>
                        <div class="row g-4">

                            <!-- First Card: Professional Trainers -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-dumbbell fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Professional Trainers</h5>
                                        <p class="card-text">Our trainers are certified professionals dedicated to helping you achieve your fitness goals with personalized guidance.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Card: Modern Equipment -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-cogs fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Modern Equipment</h5>
                                        <p class="card-text">We provide state-of-the-art equipment to ensure that you have access to the best tools for your workout.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Card: Wide Range of Classes -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Wide Range of Classes</h5>
                                        <p class="card-text">From yoga to cardio, we offer a variety of classes suited to all fitness levels and goals.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Fourth Card: Flexible Membership Plans -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-calendar-alt fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Flexible Membership Plans</h5>
                                        <p class="card-text">Choose from a variety of membership options tailored to fit your lifestyle and commitment level.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Fifth Card: Supportive Community -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-heart fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Supportive Community</h5>
                                        <p class="card-text">Join a community that inspires and supports each other in reaching their fitness goals.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Sixth Card: Clean and Safe Environment -->
                            <div class="col-xl-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
                                <div class="card border-0 shadow h-100">
                                    <div class="card-body text-center">
                                        <i class="fa fa-shield-alt fa-3x text-primary mb-3"></i>
                                        <h5 class="card-title">Clean and Safe Environment</h5>
                                        <p class="card-text">We maintain a clean and safe facility, so you can focus on your fitness with peace of mind.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        
        </section>
        <!-- Why Choose Us Section -->
        
            



        <!-- Services Start -->
        <section id="services">
            <div class="container-fluid service py-5">
                <div class="container py-5">
                    <div class="text-center mx-auto pb-5" style="max-width: 100px;">
                        <!-- Add Title and Subtitle here if needed -->
                    </div>
                    <div class="row">
                        <!-- First Column with Professional Design -->
                        <div class="col-md-6">
                            <h1 class="display-4 text-capitalize text-center mb-5">Our <span class="text-primary">Services</span></h1>
                            <p class="lead mb-4 text-muted large-text">Unlock a range of fitness options crafted to suit every fitness goal.</p>
                    
                            <div class="d-flex justify-content-center">
                                <a href="service.php" class="btn btn-primary mt-4 px-4 py-2">Get Started</a>
                            </div>
                        </div>
                
                        <!-- Second Column with Automatically Scrolling Cards -->
                        <div class="col-md-6">
                            <div class="sticky-container">
                                <div class="scrollable-cards">
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Personal Training</h5>
                                            <p class="card-text">One-on-one sessions with our expert trainers.</p>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Yoga Classes</h5>
                                            <p class="card-text">Relax and stretch with our experienced yoga instructors.</p>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Cardio Workouts</h5>
                                            <p class="card-text">Boost your heart rate with our high-energy cardio sessions.</p>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Strength Training</h5>
                                            <p class="card-text">Build muscle and strength with targeted exercises.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .large-text {
                font-size: 3rem; /* Adjust size as needed */
                font-weight: bold; /* Make the text bold */
                line-height: 1.4; /* Adjust line height for better readability */
                color: #495057; /* Change the color if necessary */
                text-align: center; /* Center align if you want it centered */
            }

            /* Auto-scrolling effect */
            .scrollable-cards {
                max-height: 400px; /* Adjust the height to your preference */
                overflow: hidden;
                position: relative;
            }

            .scrolling-cards .card {
                height: 150px; /* Adjust card height as needed */
                flex-shrink: 0; /* Prevent the cards from shrinking */
            }

            @keyframes scroll {
                0% {
                    transform: translateY(0);
                }
                100% {
                    transform: translateY(-100%); /* Scroll the total height of the cards */
                }
            }

            .scrolling-cards {
                animation: scroll 20s linear infinite; /* Adjust the speed by changing the duration */
            }

            .scrollable-cards {
                display: flex;
                flex-direction: column;
                position: relative;
                z-index: 1; /* Ensures this section stays above the background */
            }

            .scrollable-cards:hover {
                animation-play-state: paused; /* Pause on hover for readability */
            }

            /* Prevent scroll overflow into other sections */
            .scrollable-cards {
                padding-bottom: 1rem; /* Adjust to ensure no cards overflow */
            }
        </style>


        <!-- Services End -->

        <section class="pricing-section py-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize">Unlock Your Full Potential at Loyd's Fitness Gym</h1>
            <p>At Loyd's Fitness Gym, we believe that every journey is unique. That's why we offer a variety of membership plans designed to help you reach your fitness goals. Whether you're looking to get stronger, build endurance, or improve overall well-being, our flexible options ensure there's a plan that fits your needs. Explore our membership plans and start your path to a healthier, stronger you today!</p>
        </div>

        <div class="row justify-content-center"> <!-- Center the row and cards -->
            <?php
            include 'include/db.php';
            // Fetch all plans from the database
            $query = "SELECT * FROM plan"; 
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($plan = $result->fetch_assoc()) {
                    $benefits = json_decode($plan['benefits'], true); // Decode the benefits
            ?>
                    <div class="col-md-5 col-lg-4 mb-4">
                        <div class="card shadow-lg h-100 d-flex flex-column"> <!-- Ensure consistent height -->
                            <div class="card-header text-center bg-primary text-white">
                                <h4 class="mb-0 text-white"><?php echo htmlspecialchars($plan["plan"]); ?></h4>
                            </div>
                            <div class="card-body text-center flex-grow-1"> <!-- Flex-grow for equal height -->
                                <h2 class="price display-4 text-primary mb-3"><?= htmlspecialchars('₱' . $plan['amount']); ?></h2>
                                <ul class="list-unstyled">
                                    <?php foreach ($benefits as $benefit) { ?>
                                        <li><i class="fa fa-check-circle text-success me-2"></i><?= htmlspecialchars($benefit); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="membershipform.php" class="btn btn-primary btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p>No plans available.</p>';
            }
            ?>
        </div>
    </div>
</section>

<style>
    .pricing-section .card {
        border-radius: 10px;
        display: flex;
        flex-direction: column;
    }

    .pricing-section .card-header {
        font-weight: bold;
        font-size: 1.5rem;
    }

    .pricing-section .price {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .pricing-section .list-unstyled li {
        font-size: 1rem;
        margin: 10px 0;
    }

    .pricing-section .card-body {
        flex-grow: 1; /* Ensures card-body takes up remaining space */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .pricing-section .card-footer {
        margin-top: auto; /* Push footer to the bottom of the card */
    }

    .pricing-section .btn {
        width: 100%; /* Make buttons uniformly wide */
    }
</style>





        

        


        <!-- Car categories End -->

        <!-- Car Steps Start -->
         <section id="timetable">
        <div class="container-fluid steps py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize text-white mb-3">Diverse Classes for Every Fitness Enthusiast</span></h1>
                    <p class="text-white">Our diverse range of classes caters to all fitness levels, offering a mix of high-energy sessions and mindful practices to keep your fitness journey exciting and effective.</p>
                </div>
                <div class="row">
                      <!-- Card 1 -->
                      <div class="col-md-4 mb-4">
                        <div class="card h-100">
                          <h3 class="mt-3 text-center">1. Boxing</h3>
                          <div class="card-body">
                            <p class="card-text text-center">Experience high-energy boxing that builds strength and agility. Perfect for beginners, this intense workout tones muscles and boosts cardio health.</p>
                          </div>
                          <!-- Inner Card (Level & Intensity) -->
                          <div class="row justify-content-center mb-4">
                            <div class="col-md-10">
                              <div class="card shadow-sm bg-transparent border">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-6 text-center">
                                      <p><strong>Level:</strong></p>
                                      <span>Beginner</span>
                                    </div>
                                    <div class="col-6 text-center">
                                      <p><strong>Intensity:</strong></p>
                                      <span>High</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="text-center mb-3">
                            <a href="view-details.php" class="btn btn-primary">More Details</a>
                          </div>
                        </div>
                      </div>

                      <!-- Card 2 -->
                      <div class="col-md-4 mb-4">
                        <div class="card h-100">
                          <h3 class="mt-3 text-center">2. Yoga</h3>
                          <div class="card-body">
                            <p class="card-text text-center">Enjoy a beginner-friendly yoga class focused on flexibility and mindfulness. With moderate intensity, it's a peaceful way to enhance well-being and reduce stress.</p>
                          </div>
                          <!-- Inner Card (Level & Intensity) -->
                          <div class="row justify-content-center mb-4">
                            <div class="col-md-10">
                              <div class="card shadow-sm bg-transparent border">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-6 text-center">
                                      <p><strong>Level:</strong></p>
                                      <span>Beginner</span>
                                    </div>
                                    <div class="col-6 text-center">
                                      <p><strong>Intensity:</strong></p>
                                      <span>Medium</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="text-center mb-3">
                            <a href="view-details.php" class="btn btn-primary">More Details</a>
                          </div>
                        </div>
                      </div>

                      <!-- Card 3 -->
                      <div class="col-md-4 mb-4">
                        <div class="card h-100">
                          <h3 class="text-center mt-3">3. Cardio</h3>
                          <div class="card-body">
                            <p class="card-text text-center">Challenge yourself with advanced, high-intensity cardio. Ideal for fitness enthusiasts, this class boosts endurance and helps you achieve peak performance.</p>
                          </div>
                          <!-- Inner Card (Level & Intensity) -->
                          <div class="row justify-content-center mb-4">
                            <div class="col-md-10">
                              <div class="card shadow-sm bg-transparent border">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-6 text-center">
                                      <p><strong>Level:</strong></p>
                                      <span>Advanced</span>
                                    </div>
                                    <div class="col-6 text-center">
                                      <p><strong>Intensity:</strong></p>
                                      <span>High</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="text-center mb-3">
                            <a href="view-details.php" class="btn btn-primary">More Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                

    
                <!-- View All Classes Button -->
                <div class="text-center mt-4">
                  <a href="#" class="btn btn-outline-primary">View All Classes</a>
                </div>
              </div>
         </section>
        <!-- Car Steps End -->
        

<section id="classes">
    <div class="container-fluid steps py-5">
        <div class="container py-5">
            <div class="row">
                <!-- Left Column: Information for Respondents -->
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-4 text-center text-md-start">
                    <h2 class="text-uppercase text-white">We Value Your Feedback!</h2>
                    <p>Your feedback helps us improve our services at Loyd's Fitness Gym. Whether you're a member, a gym-goer, or a visitor, please take a moment to share your thoughts with us.</p>
                </div>

                <!-- Right Column: Feedback Form -->
                <div class="col-12 col-md-6 p-4 bg-light text-dark rounded mt-4 mt-md-0">
                    <h3 class="text-center">Feedback Form</h3>
                    <?php
                    // Display session message if it exists
                    if (isset($_SESSION['action']) && isset($_SESSION['message'])) {
                        // Set the class for the alert based on success or error
                        $alert_class = ($_SESSION['action'] == 'success') ? 'alert-success' : 'alert-danger';

                        // Display the alert message
                        echo "<div class='alert $alert_class text-center' role='alert'>{$_SESSION['message']}</div>";

                        // Unset session variables after displaying the message
                        unset($_SESSION['action']);
                        unset($_SESSION['message']);
                    }
                    ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="feedback">Your Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- Banner Start -->
       

<!-- Banner End -->


        <!-- Team Start -->
        <section id="trainers">
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">
                    Meet Some <span class="text-primary">of Our</span> Trainers
                </h1>
                <p class="mb-0">
                    At Loyd's Fitness Gym, we pride ourselves on having a team of highly skilled and certified trainers.
                    Our trainers are here to guide you every step of the way, providing expert advice, personalized fitness
                    programs, and the motivation you need to succeed. Get to know the passionate professionals behind your fitness journey!
                </p>
                <a href="#classes" class="btn btn-primary btn-lg mt-4">Explore Our Classes</a>
            </div>

            <div class="container">
                <div class="row">
                    <?php
                    include 'include/db.php';

                    // Query to fetch trainers
                    $sql = "SELECT * FROM trainer"; 
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $imagePath = $row['img'];
                            ?>
                            <div class="col-md-4 col-lg-3 mb-4">
                                <div class="card shadow-sm border-light h-100 d-flex flex-column align-items-center">
                                    <div class="card-body text-center">
                                        <!-- Trainer Image -->
                                        <div class="position-relative">
                                            <img src="../trainerimg/<?php echo $imagePath; ?>" 
                                                class="card-img-top rounded-circle border border-3 border-white" 
                                                alt="Trainer Image" style="width: 120px; height: 120px; object-fit: cover;">
                                            <span class="position-absolute top-0 end-0 translate-middle p-1 bg-success rounded-circle"></span>
                                        </div>

                                        <!-- Trainer Name and Title -->
                                        <h5 class="card-title mt-3 font-weight-bold"><?php echo htmlspecialchars($row["trainer_name"]); ?></h5>
                                        <p class="card-text text-muted"><?php echo htmlspecialchars($row["profession"]); ?></p>
                                        <p class="card-text text-muted small"><?php echo htmlspecialchars($row["description"]); ?></p>

                                        <!-- Contact Button -->
                                        <a href="mailto:trainer@example.com" class="btn btn-outline-primary btn-sm mt-auto w-100 align-self-center">
                                            Contact Trainer
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No trainers found.</p>";
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: center;
}

.card .btn {
    width: 100%; /* Make the buttons the same width */
    margin-top: auto; /* Push button to the bottom */
}

.card {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

</style>
        <!-- Team End -->

        <!-- Testimonial Start -->
        <!-- <div class="container-fluid testimonial pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Our Clients<span class="text-primary"> Riviews</span></h1>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis modi quisquam quia distinctio,
                    </p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="img/testimonial-1.jpg" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Person Name</h4>
                                <p>Profession</p>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta neque ab repudiandae reprehenderit ipsum eos cumque esse repellendus impedit.</p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="img/testimonial-2.jpg" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Person Name</h4>
                                <p>Profession</p>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta neque ab repudiandae reprehenderit ipsum eos cumque esse repellendus impedit.</p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="img/testimonial-3.jpg" class="img-fluid" alt="">
                            <div class="ms-4">
                                <h4>Person Name</h4>
                                <p>Profession</p>
                                <div class="d-flex text-primary">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                            </div>
                        </div>
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta neque ab repudiandae reprehenderit ipsum eos cumque esse repellendus impedit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">About Us</h4>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#services"><i class="fas fa-angle-right me-2"></i> Services</a>
                            <a href="#about"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="#packages"><i class="fas fa-angle-right me-2"></i> Packages</a>
                            <a href="#trainers"><i class="fas fa-angle-right me-2"></i> Expert Trainers</a>
                            <a href="#timetable"><i class="fas fa-angle-right me-2"></i> Time Table</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Business Hours</h4>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Mon - Friday:</h6>
                                <p class="text-white mb-0">09.00 am to 07.00 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Saturday:</h6>
                                <p class="text-white mb-0">10.00 am to 05.00 pm</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted mb-0">Vacation:</h6>
                                <p class="text-white mb-0">All Sunday is our vacation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Contact Info</h4>
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i> Magsaysay St. Cogon, Sorsogon, Philippines</a>
                            <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> loydsfitnessgym@gmail.com</a>
                            <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> 0963 201 9988</a>
                            <div class="d-flex">
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f text-white"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>