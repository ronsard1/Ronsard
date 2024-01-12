<?php


$host = 'localhost';
$username = 'root';
$password = '';
$database = 'e-learining';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Login form submission
    $loginIdentifier = $_POST['login_identifier'];
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if ($userType === 'admin') {
        $table = 'admin';
        $dashboardURL = 'dashboard.php';
    } elseif ($userType === 'student') {
        $table = 'student';
        $dashboardURL = 'course.php';
    } else {
        echo "Invalid user type selected.";
        exit;
    }

    $sql = "SELECT * FROM $table WHERE (email = '$loginIdentifier' OR user_name = '$loginIdentifier')";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $password) {
            // Successful login
            $_SESSION['student_id'] = $row['student_id']; // Assuming the user ID is stored in the 'id' column
            header("Location: $dashboardURL");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

// Check if the user is already logged in and redirect to the dashboard
if (isset($_SESSION['admin_id'])) {
    if ($userType === 'admin') {
        $dashboardURL = 'dashboard.php';
    } elseif ($userType === 'student') {
        $dashboardURL = 'landingpage.php';
    }
    header("Location: $dashboardURL");
    exit;
}
?>

<!-- HTML Login Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <title>Document</title>
</head>
<body>
    <div class="firstpart">
        <div class="top">
            <div class="logo"><img src="logo1.png" alt=""> </div>
            <div class="logo">
                <a href="landingpage.html">HOME</a>
                <a href="course.html">COURSES</a>
                <a href="question.html">QUESTIONS</a>
                <a href="contact.html">CONTACT</a>
            </div>
        </div>

        <center>
            <div class="container" style="margin-top: 5rem; background-color: rgb(15, 122, 136); width: 30rem;height: 30rem;border-radius: 10PX; ">
                <div class="grid1">

                    <p><h3>Welcome to Login Page.</h3></p>
                    <div class="grid2">
                        <form method="POST" action="login.php">
                            <!-- Login form fields -->
                            <label for="login_identifier">Email or Username:</label>
                            <input type="text" id="login_identifier" name="login_identifier" placeholder="Enter Your Email or username" required style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>

                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required placeholder="Enter Your password" required style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>

                            <label for="user_type">User Type:</label>
                            <select id="user_type" name="user_type" style=" margin-top: 2rem; height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;">

                                <option value="admin">Admin</option>
                                <option value="student">Student</option>
                            </select><br>

                            <input type="submit" value="Login" style="background-color: rgb(119, 117, 115);width: 6rem; height: 2rem; border-radius: 10px;color:black; font-weight: bold;">
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <p>Not registered yet? <a href="registration_form.php">Register here</a></p>
                </div>
            </div>
        </center>
    </div>
</body>
</html>