
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="course.css">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
  
    <div class="firstpart">
   <div class="top">
      <div class="logo"><img src="logo1.png" alt=""> </div>  <div class="logo"><a href="index.php"><b>HOME</b></a>
         <a href="index.php"><b>COURSES</b></a> <a href="contact.php">CONTACT</a>
         <a href="sin_in.php">LOGIN</a> </div>
   </div>
   <div class="p"><P> <h2></h2></P></div>
   <div class="p"><P> <h2></h2></P></div>

      <div class="explain" > 
        <p  style=" margin-left: 100px; font-size: 2rem;">
        <h4>**</h4>
        <div class="content">
	<h1>Welcome to IgaSmart — <br>e-learning platform</h1>
	<P style="color: WHITE; font-size: 30px;"> imphasize better education with more different courses.</P>
	</div>
    
    

    </div>
    <marquee>
      <b>
        <h3>
          <div style="color: black; font-size: 25;" id="greeting"></div>
        </h3>
      </b>
    </marquee>
    <div class="other" style="color: rgb(0, 0, 0);"> <center><h2>New Courses:</h2></center></div>
 


     <div class="box-container">

   
  

<div class="gallery">
<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-learining";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the 'course' table
$sql = "SELECT * FROM course";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        // Generate HTML for each course card
        echo '<div class="">
        <a href="login_for_course.php?course_id=' . $row['course_id'] . '" class="card-link">
            <div class="card">
                <img src="' . $row["course_photo"] . '">
                <h3>' . $row["title"] . '</h3>
                <p>' . $row["description"] . '</p>
            </div>
        </a>
        </div>';
    }
    echo '</div>';
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>





 


    <div class="describe">

<p>Learning often happens through formal courses and educational institutions, <br>
but it doesn’t have to be limited to traditional classrooms. <br>
With the advent of online education and the increasing<br>
 accessibility of educational resources, <br>
learning can occur in various contexts and environments.</p> </div>
      </div>
</div><br><br>

    <center> <div style="font-size:30; color:black"> <b>Help Center</b></div><hr>
   

<div class="thirdpart">
  <div class="part0"><h3>EDUCATION</h3></div>
  <div class="part0"> <h3>SUPPORT</h3> </div>
  <div class="part0"> <h3>CONNECT</h3></div>
  <div class="part0"> <h3>About</h3></div>
  <div class="part0"> <h3>Address</h3></div>
  <div class="part0">
      <span>Learning Library</span><br>
      <span>Guided Lessons</span><br>
      <span></span><br>
   </div>
  <div class="part0"> 
      <span>Help Center</span><br>
      <span>Give Gift</span><br>
      <span>Contact Us</span><br>
      <span>FeedBack</span><br></div>
  <div class="part0">

      <span>Our Blog</span><br>
      <span>Tell us what you think</span><br>
      <span>Youtube</span><br>
      <span>Whatsapp</span><br>
      <span>Tweeter</span><br>
      <span>LinkedIn</span><br>
  </div>
  <div class="part0">
      <span>Company</span><br>
      <span>Privacy Policy</span><br>
      <span>Terms and Service</span><br>
  </div>
  <div class="part0">
      <span>Rwanda , Kigali city</span><br>
      <span>phoneNumber:+25781121528</span><br>
      <span>Email: TO IgaSmart@gmail.com</span><br>
  </div>

</div>
<div style="background-color:blue;width:950px;"> CopyRight &copy2023 , Developed By PROGRAMMER <b>RONSARD</b></div>
             </center>
</body>
</html>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  var greetingElement = document.getElementById("greeting");
  var date = new Date();
  var hours = date.getHours();
  var greeting;

  if (hours >= 5 && hours < 12) {
    greeting = "GOOD MORNING!";
  } else if (hours >= 12 && hours < 18) {
    greeting = "Good afternoon!";
  } else {
    greeting = "Good evening!";
  }

  greetingElement.textContent = greeting;
});
</script>