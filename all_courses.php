






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>all courses</title>
    <link rel="stylesheet" href="all book.css">
    <link rel="stylesheet" href="style1.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>




  
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
              <i class='bx bx-box' ></i>
              <span class="links_name">Manage Users</span>
           </button>
            <div class="dropdown-content">
              <a href="all student.php">All student</a>
              <a href="all admin.php">All Admin</a>
              <a href="add admin.php">Add Admin</a>
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
            <a href="add course.hphp">Add course</a>
          
          </div>
        </div>
          
        </li>
      
        
     

     
     
     
        <li>
          <a href="">
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
       






        <img src="profile.jpg" alt="">



        <div class="dropdown1">
          <button class="dropbtn1">
           
            <span class="admin_name">Ronsard</span>
              
        <i class="bx bx-chevron-down"></i>
         </button>
          <div class="dropdown-content1">
            <a href="profile.php">view profile</a>
            <a href="login.php">Log out</a>

     
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
            
              <span class="text"></span>
            </div>
          </div>
         
        </div>
      </div>

   

       
         
         
          

      
       <center>
<h3>All courses</h3>
 
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

                // Handle Delete Course
                if (isset($_GET['delete_course_id'])) {
                    $deleteCourseId = $_GET['delete_course_id'];

                    // Query to delete the course from the database
                    $deleteSql = "DELETE FROM course WHERE course_id = $deleteCourseId";
                    if ($conn->query($deleteSql) === TRUE) {
                        echo "Course deleted successfully.";
                    } else {
                        echo "Error deleting course: " . $conn->error;
                    }
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
                        <a href="course_details.php?course_id=' . $row['course_id'] . '" class="card-link">
                                <div class="card">
                                    <img src="' . $row["course_photo"] . '">
                                   
                                      <h3>' . $row["title"] . '</h3>
                                    <p>' . $row["description"] . '</p>
                                    <div class="buttons">
                                        <a href="edit course.php?course_id=' . $row['course_id'] . '" class="edit-button">Edit</a>
                                        <a href="?delete_course_id=' . $row['course_id'] . '" class="delete-button" onclick="return confirm(\'Are you sure you want to delete this course?\')">disactive</a>
                                    </div>
                                </div></a>
                            </div>';
                    }
                    echo '</div>';
                } else {
                    echo "0 results";
                }

                // Close the database connection
                $conn->close();
                ?>


       
              
                 

  
<script>
        // Function to delete a student
        function deletecourse(courseId) {
            const confirmDelete = confirm('Are you sure you want to delete this student?');
            if (confirmDelete) {
                // Redirect to the delete page with the student ID
                window.location.href = `all course.php?delete=${courseId}`;
            }
        }

        // Function to edit a student
        function editcourse(courseId) {
            // Redirect to the edit student page with the student ID
            window.location.href = `edit course.php?edit=${courseId}`;
        }
    </script>    

         
                   
                
                </center>
























            
         
           
         
   
       
   
  </section>


  
</body>
</html>