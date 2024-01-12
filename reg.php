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
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $userName = $_POST['user_name'];
    $password = $_POST['password'];
   

   

    $sql = "INSERT INTO student (first_name, last_name, email, user_name, password) VALUES ('$firstName', '$lastName', '$email', '$userName', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
<html>
    <head>
        <title>registration</title>
        <link rel="stylesheet" type="text/css" href="demo.css">
    </head>
    <body>
        <div class="p1">
            <nav>
                <div class="logo">
                    <p>IgaSmart</p>
                </div>
              
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">courses</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>

            </nav>        <div class="p2">
            <form method="POST" action="course.php">
                    <h1>Register</h1>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter Your Firstname" class="label" required>
                    
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Your Lastname" class="label" required>
              
                        <!-- <h4>please check your email to make sure it's correct.</h4> -->
                        <input type="text" name="email" id="email" placeholder="Enter Your Email"class="label" required>
                     
                        <input type="text" name="user_name" id="user_name" placeholder="Enter Your username..."class="label" required>
                        
                       
                        <input type="text" name="password" id="password" placeholder="Enter Your Password..."class="label" required>
                      
                     
                     
                        <form method="POST" action="course.php">
   

                       <button type="submit" name="login">Login</button>
                      </form> <div style="font-size:25px;color:black; "> Already have account<a href="login.php"> LOGIN </a></div></form>
</div>
                <div style="font-size:11px; color:#cc0000; margin-top:10px"></div>
            </div>
     
    </body>
</html>