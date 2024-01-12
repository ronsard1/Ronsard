

<?php
include ('sessions2.php');

?>





<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>add student</title>
    <link rel="stylesheet" href="add student.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

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
    // Retrieve form data
    $courseTitle = $_POST['name2'];
    $description = $_POST['discription'];
    $category = $_POST['name'];
    $file = $_FILES['file']['name'];
    $photo = $_FILES['photo']['name'];
    $courseId= $_POST['course_id'];
    // Retrieve the existing student data from the database
   

       
        // Update the student data in the database
        $sql = "UPDATE course SET title = '$courseTitle', description = '$description', category = '$category', file_data = '$file', course_photo = '$photo' WHERE course_id = $courseId";
        if ($connection->query($sql) === TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    } 

     
   // Close the database connection
   // $connection->close();
    ?>



<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'e-learining';

 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

try {
    // Count students
    $stmtStudents = $pdo->query('SELECT COUNT(*) AS student_count FROM student');
    $rowStudents = $stmtStudents->fetch(PDO::FETCH_ASSOC);
    $studentCount = $rowStudents['student_count'];

    // Count admins
    $stmtAdmins = $pdo->query('SELECT COUNT(*) AS admin_count FROM admin');
    $rowAdmins = $stmtAdmins->fetch(PDO::FETCH_ASSOC);
    $adminCount = $rowAdmins['admin_count'];
    $stmtAdmins = $pdo->query('SELECT last_name from admin');
    $rowAdmins = $stmtAdmins->fetch(PDO::FETCH_ASSOC);
    $lastname = $rowAdmins['last_name'];


    // Count courses
    $stmtCourses = $pdo->query('SELECT COUNT(*) AS course_count FROM course');
    $rowCourses = $stmtCourses->fetch(PDO::FETCH_ASSOC);
    $courseCount = $rowCourses['course_count'];
} catch (PDOException $e) {
    die("Error retrieving counts: " . $e->getMessage());
}
?>

  <div class="sidebar">
    <div class="logo-details">
      <div class=".sidebar .logo-details img">
      <img src="logo1.png">
     </div>

      <span class="logo_name">IgaSmart Website</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user'></i>
            <span class="links_name">Admin panel</span>
          </a>
        </li>
        <li>
        <div class="dropdown">
          <button class="dropbtn">
            <i class='bx bx-box'></i>
            <span class="links_name">Manage Users</span>
          </button>
          <div class="dropdown-content">
            <a href="all student.php">All student</a>
            <?php
            if ($role === 'supper_admin') {
              echo '<a href="all admin.php">All Admin</a>';
              echo '<a href="add admin.php">Add Admin</a>';
            }
            ?>
          </div>
        </div>
      </li>
        <li><div class="dropdown">
          <button class="dropbtn">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Courses</span>
         </button>
          <div class="dropdown-content">
            <a href="all_courses.php">All courses</a>
            <a href="add course.php">Add course</a>
          
          </div>
        </div>
          
        </li>
      
        <li>
          <div class="dropdown">
            <button class="dropbtn">
              <i class='bx bx-video' ></i>
            <span class="links_name">tutorials</span>
           </button>
            <div class="dropdown-content">
              <a href="all tutarials.php">All tutorials</a>
              <a href="add tutorial.php">Add tutorial</a>
             
            </div>
          </div>
</li>
     
        <li>
          <a href="all message.php">
            <i class='bx bx-message' ></i>
            <span class="links_name"> Messages</span></a>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span><br>
          </a>
        </li>

       
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
       


      <?php
		     $q = "SELECT last_name FROM admin"; 
			$results = mysqli_query($con,$q); 
			if($results){ 
				 echo $rowcount=mysqli_num_rows($results); 
			}else{
				echo "0";
			}
		   ?>



        <img src="profile.jpg" alt="">



        <div class="dropdown1">
          <button class="dropbtn1">

            <span class="admin_name"><?php echo $login_session; ?></span>
              
        <i class="bx bx-chevron-down"></i>
         </button>
          <div class="dropdown-content1">
          <a href="admin_user_profile.php">View Profile</a>
            <a href="logout.php">Log out</a>

     
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Registed student</div>
            <div class="number"><?php echo $studentCount; ?></div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
         
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">  courses</div>
            <div class="number"><?php echo $courseCount; ?></div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
         
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">admin</div>
            <div class="number"><?php echo $adminCount; ?></div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
                 </div>
                 <div class="box">
  <div class="right-side">
    <div class="box-topic">Active users</div>
    <div class="number">8</div>
    <div class="indicator">
      <span class="text">
      
      </span>
    </div>
  </div>
</div>
      </div>

      <div class="sales-boxes">

       
         
         
            <ul class="details">


               
                <div class="main">
       

                    <div>
                    <h2>edit course</h2>
                <?php
                
                $courseId = $_GET['course_id'];
                //echo $courseId;
                $sql = "SELECT course_id,title,description,category,file_data,course_photo FROM course WHERE course_id = $courseId";

                //echo $sql;
                $result = $connection->query($sql);
                //if ($result->num_rows > 0) {
                  // Output data of each row
                  //echo '<div class="row">';
                  $row = $result->fetch_assoc();
                      // Generate HTML for each course card
                     //echo  $row["title"] ; 
              

                ?>
              <form method="POST" enctype="multipart/form-data">
                <div>
                  
                <input type="hidden" id="name2" name="course_id"  value="<?php echo $row['course_id']; ?>" required class="name">
                  <label class="lab" for="name2"><b>Course Title</b></label><br>
                  <input type="text" id="name2" name="name2"  value="<?php echo $row['title']; ?>" required class="name">
               
                </div>
                <div>
                  <label class="lab" for="discription"><b>Description</b></label><br>
                  <textarea id="discription" name="discription"  value="" required class="name"> <?php echo   $row['description']; ?></textarea>
                </div>
                <div>
                  <label class="lab" for="name"><b>Category</b></label><br>
                  <select id="name" name="name" required class="name">
                    <option value=" <?php echo   $row['category']; ?>" disabled selected>Selct category</option>
                    <option value="programing">programing</option>
                    <option value="networking ">networking</option>
                    <option value="cyber security">computer security</option>
                    <!-- Add more categories as needed -->
                  </select>
                </div>
                <div>
                  <label class="lab" for="file"><b>Course File Upload</b></label><br>
                  <input type="file" id="file" name="file"  value="" required class="name">
                </div>
                <div>
                  <label class="lab" for="photo"><b>Course Photo Upload</b></label><br>
                  <input type="file" id="photo" name="photo" class="name">

                </div>
                <div>
                  <button type="submit" class="submit">save Course</button>
                </div>
              </form>

                    
    
                    </div>
                    





</div>

            
            </ul>
           
         
        </div>
       
    </div>
  </section>


  
</body>
</html>