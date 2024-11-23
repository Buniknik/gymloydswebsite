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
            <style>
                .accordion-card {
                    background-color: #ffffff;
                    padding: 15px;
                    border-radius: 5px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    margin-bottom: 15px;
                }
                .section {
                    padding: 50px 0;
                    background-size: cover;
                    background-position: center;
                    padding: 100px 0;
                    color: black;
                }
                .accordion-button {
                    color: #c2185b;
                    font-weight: bold;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                    position: relative; /* Add relative positioning */
                }

                .icon-button {
                    border: 2px solid #c2185b;
                    padding: 5px;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    transition: background-color 0.3s;
                    width: 50px;
                    height: 50px;
                    position: absolute; /* Position the icon button absolutely */
                    right: 5px; /* Align the button to the right end */
                }

                .icon-button:hover {
                    background-color: rgba(194, 24, 91, 0.1);
                }
                .container {
                max-width: 100%;
                padding: 15px;
                margin: auto;
                }
            </style>

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

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- About Start -->
            <div class="container-fluid overflow-hidden about py-5">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="about-item">
                                <div class="pb-5">
                                    <h1 class="display-5 text-capitalize">Loyd's <span class="text-primary">About</span></h1>
                                    <p class="mb-0">I am aware of my own health and physical condition and having knowledge that my participation in any exercise program may be injurious to my health, I am voluntarily participating in a physical activity. Having such knowledge, I hereby acknowledge this release and release any representatives, agents, and Successors from liability for accidental injury or illness that may incur because of participating in the said program. I agree to disclose any physical limitation, disability, ailment, or impairment that may affect my ability to participate in said fitness program.
                                    </p>
                                </div>
                                <div class="text-left mt-3 mb-3">
                                    <button type="button" class="btn btn-primary btn-lg">Get Started</button>
                                </div>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="about-item-inner border p-4 h-100">
                                            <div class="about-icon mb-4">
                                                <img src="img/vision1.png" class="img-fluid w-50 h-50" alt="Icon">
                                            </div>
                                            <h5 class="mb-3">Our Vision</h5>
                                            <p class="mb-0">To inspire a healthier community by being Sorsogon City’s trusted fitness hub for all.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-item-inner border p-4 h-100">
                                            <div class="about-icon mb-4">
                                                <img src="img/mission.png" class="img-fluid h-50 w-50" alt="Icon">
                                            </div>
                                            <h5 class="mb-3">Our Mission</h5>
                                            <p class="mb-0">Loyd's Fitness Gym is dedicated to empowering individuals with quality training, modern facilities, and a welcoming space for all fitness levels.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-4">
                                <h2 class="text-center mt-5">Gym Rules</h2>
                                    <div class="col-lg-6">
                                        
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Use facilities at your own risk.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Use equipment properly. Follow directions carefully.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Consult a physician before beginning an exercise program.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Children under 18 must be accompanied by an adult.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Proper fitness attire: no bare feet, sandals, or boots.</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Report any damaged equipment to management immediately; do not use.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Always be courteous and respectful of others.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Return all equipment to its proper place and sanitize.</p>
                                        <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Practice social distancing.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        

                        <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                            <div class="about-img">
                            <div class="about-img">
                                <div class="img-1">
                                <img src="loyds/loyds2.jpg" class="img-fluid rounded h-100 w-100" alt="">
                                </div>
                                <div class="img-2">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- About End -->
        <section class="py-5" style="background-color: #f8f9fa;">
            <div class="container text-center">
                <h2 class="display-6 mb-4 fw-bold">Our Approach</h2>
                <p class="lead mb-5">
                    At Loyd’s Fitness Gym, our commitment to helping you achieve your best self is what truly sets us apart. We combine high-quality facilities with the latest fitness equipment and a variety of classes tailored to meet your individual needs.
                </p>
            
                <div class="row g-4">
                    <!-- Feature 1 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="icon mb-3 text-primary">
                                    <i class="fas fa-dumbbell fa-3x"></i>
                                </div>
                                <h5 class="card-title fw-bold">State-of-the-Art Facilities</h5>
                                <p class="card-text">
                                    Train with top-tier equipment in a space designed to enhance your workout experience.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="icon mb-3 text-primary">
                                    <i class="fas fa-bolt fa-3x"></i>
                                </div>
                                <h5 class="card-title fw-bold">Cutting-Edge Equipment</h5>
                                <p class="card-text">
                                    From cardio to strength training, our equipment helps you reach your goals efficiently and effectively.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="icon mb-3 text-primary">
                                    <i class="fas fa-heartbeat fa-3x"></i>
                                </div>
                                <h5 class="card-title fw-bold">Diverse Classes</h5>
                                <p class="card-text">
                                    Explore classes for strength, flexibility, and overall wellness led by our expert trainers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="lead mt-5">
                    Whether you're focused on building strength, enhancing flexibility, or finding overall balance, our expert trainers and resources are here to support you every step of the way.
                </p>
            </div>
        </section>
        <!-- Fact Counter -->
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

        <!-- Fact Counter -->

        <!-- Features Start -->
        <div class="container-fluid feature py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3">Loyd's Fitness Gym <span class="text-primary">Features</span></h1>
                    <p class="mb-0">Discover the ultimate fitness experience with our state-of-the-art facilities and dedicated team of professionals at Loyd's Fitness Gym. We are committed to helping you reach your fitness goals with our personalized services and world-class amenities.</p>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4">
                        <div class="row gy-4 gx-0">
                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <span class="fa fa-dumbbell fa-2x"></span>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="mb-3">Professional Trainers</h5>
                                        <p class="mb-0">Our certified trainers provide personalized guidance to help you achieve your fitness goals safely and effectively.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <span class="fa fa-calendar-check fa-2x"></span>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="mb-3">Flexible Schedules</h5>
                                        <p class="mb-0">We offer flexible scheduling options, making it easy to find a time that fits your busy lifestyle.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <img src="images/dumbbell-removebg-preview.png" class="img-fluid w-100" style="object-fit: cover;" alt="Gym Features">
                    </div>
                    <div class="col-xl-4">
                        <div class="row gy-4 gx-0">
                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="feature-item justify-content-end">
                                    <div class="text-end me-4">
                                        <h5 class="mb-3">Modern Equipment</h5>
                                        <p class="mb-0">Our gym is equipped with the latest fitness technology to ensure an efficient and enjoyable workout experience.</p>
                                    </div>
                                    <div class="feature-icon">
                                        <span class="fa fa-running fa-2x"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="feature-item justify-content-end">
                                    <div class="text-end me-4">
                                        <h5 class="mb-3">Group Classes & Events</h5>
                                        <p class="mb-0">Stay motivated by joining our group classes and fitness events tailored for all levels and interests.</p>
                                    </div>
                                    <div class="feature-icon">
                                        <span class="fa fa-users fa-2x"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features End -->

        <!-- Car Steps Start -->
        <div class="container-fluid steps py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize text-white mb-3">Loyd's Fitness Gym<span class="text-primary"> Process</span></h1>
                    <p class="mb-0 text-white">Our streamlined process ensures a seamless experience at Loyd's Fitness Gym. From the moment you walk in, we guide you through each step to help you achieve your fitness goals efficiently and enjoyably.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Step 1: Join Us</h4>
                            <p class="mb-0">Get started by signing up and choosing a membership plan that fits your lifestyle and goals.</p>
                            <div class="steps-number">01.</div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Step 2: Personalized Program</h4>
                            <p class="mb-0">Work with a trainer to develop a customized workout program tailored to your fitness level and objectives.</p>
                            <div class="steps-number">02.</div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Step 3: Achieve & Celebrate</h4>
                            <p class="mb-0">Stay committed, track your progress, and celebrate each milestone with us!</p>
                            <div class="steps-number">03.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Car Steps End -->

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
        <section class="section">
            <div class="container">
                <div class="row d-flex justify-content-center">
            
                    <!-- First Column: Intro Text -->
                    <div class="col-md-4 mb-4">
                        <h2 class="text-center" style="font-size: 2.5rem;">Frequently Asked Questions</h2>
                        <p class="text-center">Don't hesitate to reach out if you have any questions.</p>

                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary btn-lg">Contact Us</button>
                        </div>
                    </div>

            
                    <!-- Second Column: FAQ Accordion -->
                    <div class="col-md-8">
                        <div class="accordion" id="accordionExample">
                    
                            <!-- Question 1 -->
                            <div class="accordion-item accordion-card">
                                <h2 class="accordion-header" id="headingOne">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span>Can I freeze or cancel my membership?</span>
                                        <span class="icon-button ml-auto"></span>
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Yes, you can freeze or cancel your membership. Freezing options vary based on your membership type. Please contact our front desk or check your membership terms for more details on freezing or cancellation policies.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="accordion-item accordion-card">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>Are personal training sessions included in any membership plans?</span>
                                        <span class="icon-button ml-auto"></span>
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Personal training sessions are generally not included in standard membership plans, but we offer several packages for personal training. Contact our front desk or check our website for available packages and rates.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="accordion-item accordion-card">
                                <h2 class="accordion-header" id="headingThree">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>Can I try out a class before committing to a membership?</span>
                                        <span class="icon-button ml-auto"></span>
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Yes! We offer trial classes so you can experience our gym and classes before committing to a membership. Contact us to schedule your trial session.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="accordion-item accordion-card">
                                <h2 class="accordion-header" id="headingFour">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span>How do I sign up for a membership at Peak Fitness?</span>
                                        <span class="icon-button ml-auto"></span>
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Signing up is easy! You can visit us in person or sign up online through our website. Our team will be happy to guide you through the process and help you select the membership that suits you best.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Banner Start -->
       
        <!-- Banner End -->

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">About Us</h4>
                                <p class="mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            </div>
                            <div class="position-relative">
                                <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Subscribe</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> About</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Cars</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Car Types</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Team</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Contact us</a>
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
                            <a href="#"><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a>
                            <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@example.com</a>
                            <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                            <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex">
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-instagram text-white"></i></a>
                                <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i class="fab fa-linkedin-in text-white"></i></a>
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