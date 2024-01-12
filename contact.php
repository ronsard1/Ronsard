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
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate and sanitize the form data
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e-learining";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the database query
    $stmt = $conn->prepare("INSERT INTO messages (email, message_content) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $message);
    $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect the user back to the contact page or display a success message
    header("Location: contact.php");
    exit();
}
?>
    <div class="firstpart">
    <div class="top">
      <div class="logo"><img src="logo1.png" alt=""></div>
      <div class="logo"><a href="index.html">HOME</a> <a href="#">COURSES</a>  <a href="contact.php">CONTACT</a><a href="sin_in.php">LOGIN</a></div>
   </div>
    <div class="cont" style="">
        <center>
            <div class="CONTACT" style="background-color: rgb(15, 122, 136);color: whitesmoke; height: 30rem; width: 50rem; border-radius: 30px; margin-top: -3rem;">
                <div style="margin-top: 3rem;">
                    Any Suggestion or problem you can tell us:<br>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        Email:<input type="email" name="email" id="email" placeholder="myemail@gmail.com" style="padding: 0.3rem; margin: 1rem; border-radius: 10px;" required><br>
                        <textarea style="height: 12rem; width: 40rem; padding: 1rem; background-color: azure; border: 3px solid gray; border-radius: 20px;" name="message" id="message" placeholder="Enter Message...." required></textarea><br>
                        <button type="submit" style="height: 2rem; width: 10rem; background-color: gray; margin-top: 4px; border-radius: 9px;">Send Message!</button>
                    </form>
                    <div>
                        <p><u>OUR CONTACT :</u></p>
                        PHONENUMBER: 0781121528<br>
                        Email: igasmart@gmail.com<br>
                        tweeter: igasmart<br>
                    </div>
                </div>
            </div>
        </center>
    </div>

</div>
<center>
    <div class="other"> Help Center:</div>
    <hr>
    <div class="thirdpart">
        <div class="part0"><h3>EDUCATIONAL TOOLS</h3></div>
        <div class="part0"> <h3>SUPPORT</h3> </div>
        <div class="part0"> <h3>CONNECT</h3></div>
        <div class="part0"> <h3>About</h3></div>
        <div class="part0"> <h3>Address</h3></div>
        <div class="part0">
            <span>Learning Library</span><The remaining part of the HTML code you provided seems to be cut off. Please provide the complete code so that I can assist you further.