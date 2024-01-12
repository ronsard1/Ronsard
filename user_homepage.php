
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <link rel="stylesheet" href="course.css">
   <style> 
.column {
    width: 100%;
    padding: 0 1em 1em 1em;
    text-align: center;
}

.card {
    width: 200;
    height: 200;
    padding: 2em 1.5em;
   
    background-size: 100% 200%;
    background-position: 0 2.5%;
    border-radius: 5px;
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    transition: 0.5s;
}
</style>
   
   
   
</head>
<body>
  
    <div class="firstpart">
   <div class="top">
      <div class="logo"><img src="logo1.png" alt=""> </div>  <div class="logo"><a href="landingpage.html"><b>HOME</b></a>
         <a href="course.html"><b>COURSES</b></a> <a href="question.html">QUESTIONS</a>  <a href="contact.html">CONTACT</a>
         <a href="registerr.html">REGISTER</a> </div>
   </div>
   <div class="p"><P> <h2></h2></P></div>

      <div class="explain" > 
        <p  style=" margin-left: 100px; font-size: 2rem;">
        <h4>Welcome to TO IgaSmart</h4>
        <div class="content">
	<h1>Welcome to IgaSmart — <br>e-learning plattform</h1>
	<P>We imphasize better education with more different courses.</P>
	</div>
    
    

    </div>
    <marquee>
      <b>
        <h3>
          <div class="great" id="greeting"></div>
        </h3>
      </b>
    </marquee>
    <div class="other" style="color: rgb(0, 0, 0);"> <center><h2>New Courses:</h2></center></div>
 


   
    <div class="describe">

<p>Learning often happens through formal courses and educational institutions, <br>
but it doesn’t have to be limited to traditional classrooms. <br>
With the advent of online education and the increasing<br>
 accessibility of educational resources, <br>
learning can occur in various contexts and environments.</p> </div>
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-learining";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT name FROM course";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="style.css">

<div class="row">
    <?php
    // Check if there are rows returned from the database
    if ($result->num_rows > 0) {
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            $name = $row["title"];
           


            ?>
            <div class="column">
                
                    <div class="card hover=bluel">
                        <div class="icon-wrapper">
                        <i class="fa fa-bus"></i>
                        </div>
                        <div class="card-content">
                            <p><?php echo $row['course_photo']; ?></p>
                        
                        </div>
                        <div class="card-content">
                            <p> <?php echo $name; ?></p>
                        
                        </div>
                        <div class="card-content">
                            <p> <?php echo $row['description']; ?></p>
                        
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
    } else {
        echo "No data available.";
    }
    ?>
</div></a>

<?php
// Close the connection
$conn->close();
?>

  </div>
    <center> <div class="other"> Help Center:</div><hr>
   

<div class="thirdpart">
  <div class="part0"><h3>EDUCATIONAL TOOLS</h3></div>
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
  <div class="partcopy"> CopyRight &copy2023 , Developed By PROGRAMMER <b>RONSARD</b></div>
</div>
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