<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infinity";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>alert("Login successful");</script>';
        header("Location: index.php?pass=1");
        exit();
    } else {
        echo '<script>alert("Invalid email or password");</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $existing = "SELECT * FROM users WHERE email='$email'";
    $exit_result = $conn->query($existing);

    if ($exit_result->num_rows > 0) {
        echo '<script>alert("User already exists");</script>';
    } else {
        $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insert) === TRUE) {
            echo '<script>alert("Registration successful");</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();


$loggedIn = false;
if ($_GET['pass'] == 1) {
    $loggedIn = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITY</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.11/dist/css/splide.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile-popup.css">

</head>


<body>
    <?php
    if ($loggedIn) {
        echo "<style>.profile-btn { display: block; }</style>";
    } else
        echo "<style>.login-btn { display: block; }</style>";

    ?>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn bx bx-menu"></span>
            <a href="#" class="logo">
                <img src="images/logo.jpg" alt="logo">
                <h2>Infinity</h2>
            </a>
            <div class="nav-search">

                <input type="text" class="nav-input" placeholder="What do you want to Learn">
                <i class="fa-solid fa-magnifying-glass"></i>

            </div>
            <ul class="links">
                <span class="close-btn bx bx-x"></span>
                <div class="dropdown">
                    <li class="dropbtn">
                        Explore Courses
                        <svg aria-hidden="true" fill="none" focusable="false" height="12" viewBox="0 0 16 16" width="12"
                            id="cds-react-aria-1" class="css-0">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 11.293L1.354 4.646l-.708.708L8 12.707l7.354-7.353-.707-.708L8 11.293z"
                                fill="currentColor"></path>
                        </svg>
                    </li>
                    <div class="dropdown-content">
                        <a href="#">Data Structure</a>
                        <a href="#">C program</a>
                        <a href="#">Algorithms</a>
                        <a href="#">Web Program</a>
                        <a href="#">Mathematics</a>
                        <a href="#">Computer Arch</a>
                    </div>
                </div>
                <li><a href="#course">Courses</a></li>
                <li><a href="#">Contact us</a></li>
                <li>
                    <a href="#" class="login-btn">LOG IN</a>
                    <a href="profile.php" class="profile-btn">Profile</a>
                    <div class="profile-popup-container">
                        <div class="box">
                            <button>Hackos: 2054</button>
                        </div>
                        <div class="box">Profile</div>
                        <div class="box boxs">
                            <div class="part">Dark Mode</div>
                            <label class="toggle-switch">
                                <input type="checkbox" id="darkModeToggle">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="box">Leaderboard</div>
                        <div class="box">Settings</div>
                        <div class="box">Bookmarks</div>
                        <div class="box">Submissions</div>
                        <div class="box">Logout</div>
                    </div>
                </li>

                <li>
                    <button class="switch theme-toggle" id="switch">
                        <i class="switch-light bx bx-sun"></i>
                        <i class="switch-dark bx bx-moon"></i>
                    </button>
                </li>

            </ul>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn bx bx-x"></span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay
                    connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="index.php" method="post">
                    <div class="input-field">
                        <input type="connection.php" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot
                        password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using
                    your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="index.php" method="post">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Enter username</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Create password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy" required>
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms &
                                Conditions</a>
                        </label>
                    </div>
                    <button type="submit" name="signup">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        <section class="section banner banner-section">
            <div class="container banner-column">
                <div class="banner-inner">
                    <h1 class="heading-xl">No application needed, ever―just
                        start learning and show us you’re ready</h1>
                    <p class="paragraph">You need to get a house when you go
                        to campus, you have to pay for food. If you do it
                        online, you can do it from your home. I was able to
                        complete the degree while working full-time as a
                        game designer.
                    </p>
                    <button class="btn btn-darken btn-inline">
                        Get Started<i class="bx bx-right-arrow-alt"></i>
                    </button>
                </div>
                <img class="banner-image"
                    src="https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="Illustration">

            </div>
        </section>
    </main>

    <section id="overview">
        <div class="overview-container">
            <h1>Invest in your varsity life with Infinity</h1>
            <p class="overview_first_para">Get access to videos in over 90%
                of courses, Specializations,
                and Professional Certificates taught by top instructors from
                leading universities and companies.</p>
            <div class="overview-inner-container">
                <div class="overview-wrapper">
                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/learn.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Learn anything</p>
                            <p>Explore any interest or trending topic, take
                                prerequisites, and advance your skills</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/money.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Save money</p>
                            <p>Spend less money on your learning if you plan
                                to take multiple courses this year</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/flexible.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Flexible learning</p>
                            <p>Learn at your own pace, move between multiple
                                courses, or switch to a different course</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/certificates.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Unlimited certificates</p>
                            <p>Earn a certificate for every learning program
                                that you complete at no additional cost</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="course-silde" id="course">
        <h2 class="slider-title">Personalized Specializations for You</h2>
        <div id="course-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Maryland Global Campus">
                            <div class="course-details">
                                <h3>University of Maryland Global Campus</h3>
                                <h4>Master of Science in Data Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://media.istockphoto.com/id/611189966/photo/study-studying-learn-learning-classroom-internet-concept.jpg?s=1024x1024&w=is&k=20&c=SzWWP87Inl6oN_5XTqRfxpTXRXtoJbVFtqODh87Q_44="
                                alt="University of Oklahoma">
                            <div class="course-details">
                                <h3>University of Oklahoma</h3>
                                <h4>Master of Data Science and Analytics</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>

                    <li class="splide__slide">
                        <div class="course-container">
                            <img src="https://images.unsplash.com/photo-1515168985652-8454bcc8fcaf?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="University of Pittsburgh">
                            <div class="course-details">
                                <h3>University of Pittsburgh</h3>
                                <h4>Master of Data Science</h4>
                                <p>🎓 Earn a degree<br>Degree</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

  
    <script src="script.js">
    </script>

</body>

</html>