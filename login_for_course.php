<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("connection.php");
session_start();
$error = "";

// Check if a course ID is set in the query string
if (isset($_GET['course_id'])) {
    $_SESSION['redirect_course_id'] = $_GET['course_id'];
}

if (isset($_POST['login'])) {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($con, $_POST['email']);
    $mypassword = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM student WHERE email = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Wrong." . mysqli_error($con));
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$status = $row['status'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        
        // Check if a course ID is stored in the session
        if (isset($_SESSION['redirect_course_id'])) {
            $redirectCourseId = $_SESSION['redirect_course_id'];
            unset($_SESSION['redirect_course_id']); // Remove the stored course ID from the session
            header("location: view_course.php?course_id=$redirectCourseId");
        } else {
            header("location: course.php");
        }
        exit; // Add exit to stop further script execution
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<!-- Rest of your HTML code -->

<html>
    <head>
        <title>E-learning</title>
        <link rel="stylesheet" type="text/css" href="demo.css">
    </head>
    <body>
        <div class="p1">
            <nav>
                <div class="logo">
                    <p>IgaSmart</p>
                </div>
                <ul>
                    <li><a href="landingpage.php">Home</a></li>
                    <li><a href="landingpage.php">courses</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </nav>
            <div class="p2">
                <form action="" method="post"> <!-- Remove the extra form tag -->
                    <h1>LOGIN</h1>
                    <input type="text" class="label" placeholder="enter your" name="email" required>
                    <input type="password" class="label" placeholder="Password" name="password" required>
                   
                    <div style="font-size:25px;color:black; "> if you don't have account<a href="registration_form.php"> register </a></div>
                   
                    <p>
                        <!-- Remove the duplicate submit button -->
                        <button type="submit" name="login">Login</button>
                    </p>
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
        </div>
    </body>
</html>