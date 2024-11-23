<?php
    session_start();
    include 'include/db.php';

    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_POST['add_member'])) {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['member_gender'];
        $date = $_POST['member_date'];
        $contact = $_POST['member_contact'];
        $address = $_POST['member_address'];
        $username = $_POST['username'];
        $password = $_POST['password']; // User submitted password
        $dob = $_POST['dob'];
        $zipcode = $_POST['zip_code'];
        $membership = $_POST['membership'];
        $amount = $_POST['amount'];
        $city = $_POST['city'];
        $municipality = $_POST['municipality'];

        // Check if any required field is empty
        $error_messages = [];

        if (empty($firstname)) $error_messages[] = 'First Name is required.';
        if (empty($lastname)) $error_messages[] = 'Last Name is required.';
        if (empty($municipality)) $error_messages[] = 'Municipality is required.';
        if (empty($email)) $error_messages[] = 'Email Address is required.';
        if (empty($gender)) $error_messages[] = 'Gender is required.';
        if (empty($date)) $error_messages[] = 'Date of Birth is required.';
        if (empty($contact)) $error_messages[] = 'Contact number is required.';
        if (empty($address)) $error_messages[] = 'Address is required.';
        if (empty($username)) $error_messages[] = 'Username is required.';
        if (empty($password)) $error_messages[] = 'Password is required.';
        if (empty($dob)) $error_messages[] = 'Date of Birth is required.';
        if (empty($zipcode)) $error_messages[] = 'Zip Code is required.';
        if (empty($membership)) $error_messages[] = 'Membership type is required.';
        if (empty($amount)) $error_messages[] = 'Membership Fee is required.';
        if (empty($city)) $error_messages[] = 'City is required.';
        if (empty($_FILES['img']['name'])) $error_messages[] = 'Profile picture is required.';

        // If there are any error messages, display them and stop further processing
        if (count($error_messages) > 0) {
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = implode('<br>', $error_messages);
            header('Location: membershipform.php');
            exit();
        }

        // Email validation (check if the email is in a valid format)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = 'Invalid email format.';
            header('Location: membershipform.php');
            exit();
        }

        // Check if the email, username, or contact number already exists
        $check_query = "SELECT * FROM membervalid WHERE username='$username' OR member_email='$email'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = 'You already have an account with this username or email address.';
            header('Location: membershipform.php');
            exit();
        }

        // Proceed with image upload and member registration
        $status = "new";
        $picture_tmp = $_FILES['img']['tmp_name'];
        $picture_name = $_FILES['img']['name'];
        $picture_type = $_FILES['img']['type'];

        $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

        if (in_array($picture_type, $allowed_type)) {
            $new_image_name = uniqid() . '-' . $picture_name;
            $upload_dir = 'upload/';
            $upload_path = $upload_dir . $new_image_name;

            if (move_uploaded_file($picture_tmp, $upload_path)) {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insert the member data into the database
                $sql = "INSERT INTO membervalid (firstname, lastname, member_email, member_gender, member_date, member_contact, member_address, zipcode, city, municipality, membership_plan, amount, img, username, password, status) 
                        VALUES ('$firstname', '$lastname', '$email', '$gender', '$dob', '$contact', '$address', '$zipcode', '$city', '$municipality', '$membership', '$amount', '$new_image_name', '$username', '$hashed_password', '$status')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['action'] = 'success';
                    $_SESSION['message'] = 'New member registered successfully!';
                    header('Location: membershipform.php');
                    exit();
                } else {
                    $_SESSION['action'] = 'error';
                    $_SESSION['message'] = 'Error: ' . $conn->error;
                    header('Location: membershipform.php');
                    exit();
                }
            } else {
                $_SESSION['action'] = 'error';
                $_SESSION['message'] = 'Error uploading image!';
                header('Location: membershipform.php');
                exit();
            }
        } else {
            $_SESSION['action'] = 'error';
            $_SESSION['message'] = 'Invalid image file type!';
            header('Location: membershipform.php');
            exit();
        }
        header('Location: confirmation.php'); // Redirect to the confirmation page
        exit();
    }
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

            <link href="css2/form.css" rel="stylesheet">

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
                            <a href="tel:+01234567890" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+01234567890</a>
                            <a href="mailto:example@gmail.com" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>Example@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a>
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
        <div class="container-fluid bg-breadcrumb text-white py-5">
            <div class="container text-center" style="max-width: 800px;">
                <h4 class="display-4 mb-3 text-white wow fadeInDown" data-wow-delay="0.1s">Become A Member</h4>
                <p class="lead wow fadeIn" data-wow-delay="0.2s">
                    Join Loyd’s Fitness Gym and unlock your fitness potential with expert guidance, personalized plans, and a community dedicated to health and well-being.
                </p>
        
                <p class="mt-4 wow fadeIn" data-wow-delay="0.7s">
                    At Loyd’s Fitness Gym, we're here to support you at every step. Join us today to enjoy exclusive member benefits and a welcoming community dedicated to helping you achieve your goals!
                </p>
            </div>
        </div>

        <!-- Header End -->

        
        <!-- Membership Form Section -->
        <!-- Membership Form Section -->

        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; max-width: 200%">
        <!-- Membership Registration Form Column -->
        <div class="col-md-6">
            <div class="card h-100">
                <?php
                // Display any session messages (success or error)
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-' . ($_SESSION['action'] === 'error' ? 'danger' : 'success') . '">';
                    echo $_SESSION['message'];
                    echo '</div>';
                    unset($_SESSION['message']);
                    unset($_SESSION['action']);
                }
                ?>
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Membership Registration</h4>
                    <form action="membershipform.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Personal Information Column -->
                            <div class="col-md-6">
                                <h5 class="mb-3">Personal Information</h5>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label for="contact" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="contact" name="member_contact">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" id="dob" name="dob">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="member_gender">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Membership Type Column -->
                            <div class="col-md-6">
                                <h5 class="mb-3">Membership Type</h5>
                                <div class="mb-3">
                                    <label for="membership" class="form-label">Membership Type</label>
                                    <select class="form-select" id="membership" name="membership">
                                        <option selected>Select membership type</option>
                                        <?php
                                        $qry = $conn->query("SELECT CONCAT(plan, ' - ', amount) AS plan_with_amount FROM plan ORDER BY plan ASC;");
                                        while ($plan = $qry->fetch_assoc()):
                                        ?>
                                        <option value="<?= $plan['plan_with_amount']; ?>">
                                            <?= ucwords($plan['plan_with_amount']); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Preferred Date</label>
                                    <input type="date" class="form-control" id="date" name="member_date">
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Membership Fee</label>
                                    <input class="form-control" id="amount" type="number" name="amount" placeholder="Enter your membership fee">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <!-- Address Information Column -->
                            <div class="col-md-6">
                                <h5 class="mb-3">Address Information</h5>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="member_address">
                                </div>
                                <div class="mb-3">
                                    <label for="municipality" class="form-label">Municipality</label>
                                    <input type="text" class="form-control" id="municipality" name="municipality" >
                                </div>
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="mb-3">
                                    <label for="zipCode" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zipCode" name="zip_code">
                                </div>
                            </div>

                            <!-- Account Information Column -->
                            <div class="col-md-6">
                                <h5 class="mb-3">Account Information</h5>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="profilePic" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" id="img" name="img">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input custom-checkbox" id="terms" name="terms" required onchange="toggleButton()">
                            <label class="form-check-label" for="terms">
                                I agree to the Membership <a href="termsandcondition.php" target="_blank">terms and conditions, Privacy and Policy</a>.
                            </label>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" name="add_member" class="btn btn-primary btn-lg" id="joinButton" disabled>Join Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


       
<script>
    function toggleButton() {
        const checkbox = document.getElementById('terms');
        const button = document.getElementById('joinButton');
        button.disabled = !checkbox.checked;
    }
</script>

<section class="section">
            <div class="container">
                <div class="row d-flex justify-content-center">
            
                    <!-- First Column: Intro Text -->
                    <div class="col-md-4 mb-4">
                        <h2 class="text-center" style="font-size: 2.5rem;">Frequently Asked Questions</h2>
                        <p class="text-center">Don't hesitate to reach out if you have any questions.</p>

                        <div class="text-center mt-3">
                            <a href="contact.php" class="btn btn-primary btn-lg">Contact Us</a>
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

        
        <!-- Team End -->

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