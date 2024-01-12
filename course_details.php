

           

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="display_course.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/venn.js"></script>
     <style>
       .dashboard {
         display: flex;
         justify-content: space-between;
     width: 600px;
     height: 400px;
       }
   
       .chart {
         width: 400px;
         height: 300px;
       }
   
       .venn-diagram {
         width: 300px;
         height: 300px;
       }
       
    .course-details {
      margin-bottom: 20px;
    }

    .course-details h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .course-details p {
      margin-bottom: 5px;
    }

    .course-details a {
      display: inline-block;
      margin-top: 10px;
    }

    .course-details img {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
    }

    .tutorial-list {
      margin-top: 20px;
      display:flex;
    }

    .tutorial-list h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .tutorial-list ul {
  list-style-type: none;
  padding-left: 0;
  display: flex;
  flex-wrap: wrap;
}


    .tutorial-list li {
      margin-bottom: 10px;
    }

    .tutorial-list video {
      width: 250px;
      display:flex;
      height:250px;
    }
    .delete-button,
.edit-button {
  padding: 8px 16px;
  background-color: #f44336; /* Red color for delete button */
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 14px;
  margin-right: 8px;
}

.edit-button {
  background-color: #4CAF50; /* Green color for edit button */
}

/* Button Hover Styles */
.delete-button:hover,
.edit-button:hover {
  opacity: 0.8;
}
  
     </style>
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
       






        <img src="profile.jpg" alt="">



        <div class="dropdown1">
          <button class="dropbtn1">

            <span class="admin_name"><?php echo $lastname; ?></span>
              
        <i class="bx bx-chevron-down"></i>
         </button>
          <div class="dropdown-content1">
            <a href="admin_user_profile.php">view profile</a>
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
    <span class="text"></span>
            </div>
          </div>
         
        </div>
      </div>
         
        
      <main>
    <div class="left">
        <div class="title-course">
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

            // Check if a course ID is provided in the URL
            if (isset($_GET['course_id'])) {
                $courseId = $_GET['course_id'];

                // Query to retrieve data for the specified course ID
                $courseSql = "SELECT * FROM course WHERE course_id = $courseId";
                $courseResult = $conn->query($courseSql);

                // Check if there are rows in the result
                if ($courseResult->num_rows > 0) {
                    $courseRow = $courseResult->fetch_assoc();

                    // Display course details
                    echo '<div class="course-details">
                            <h2>' . $courseRow["title"] . '</h2>
                            <p>' . $courseRow["description"] . '</p>
                            <p>' . $courseRow["category"] . '</p>
                            <img src="' . $courseRow["course_photo"] . '" alt="Course Photo">
                          </div>';

                    // Query to retrieve tutorials related to the course
                    $tutorialSql = "SELECT * FROM tutorial WHERE course_id = $courseId";
                    $tutorialResult = $conn->query($tutorialSql);

                    // Check if there are tutorials
                    if ($tutorialResult->num_rows > 0) {
                        echo '<div class="tutorial-list">';
                        echo '<h3>Tutorials</h3><br>';
                        echo '<ul>';
                        while ($tutorialRow = $tutorialResult->fetch_assoc()) {
                            echo '<li>';
                            echo '<video src="' . $tutorialRow["video_path"] . '" controls></video>';
                            echo '<div class="buttons">';
                            echo '<button class="delete-button" onclick="deleteTutorial(' . $tutorialRow["tutorial_id"] . ')">Delete</button>';
                            echo '<button class="edit-button" onclick="editVideo(' . $tutorialRow["tutorial_id"] . ')">Edit</button>';
                            echo '</div>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo '<p>No tutorials available for this course.</p>';
                    }
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <div class="right">
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

        // Check if a course ID is provided in the URL
        if (isset($_GET['course_id'])) {
            $courseId = $_GET['course_id'];

            // Query to retrieve data for the specified course ID
            $courseSql = "SELECT * FROM course WHERE course_id = $courseId";
            $courseResult = $conn->query($courseSql);

            // Check if there are rows in the result
            if ($courseResult->num_rows > 0) {
                $courseRow = $courseResult->fetch_assoc();

                // Display the course details
                echo '<div class="course-details">';
                
                echo '</div>';

                // Display the embedded PDF
                echo '<div class="course-file">';
                echo '<iframe src="' . $courseRow["file_data"] . '" width="100%" height="600px" frameborder="0"></iframe>';
                echo '</div>';
                echo '<div class="buttons">';
                echo '<button class="delete-button" onclick="deleteCourse(' . $courseRow["course_id"] . ')">Delete</button>';
                echo '<button class="edit-button" onclick="editCourse(' . $courseRow["course_id"] . ')">Edit</button>';
                echo '</div>';
            }
        } else {
            echo "Course not found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</main>

<script>
    function editCertainly! Here's an updated version of the code:


<script>
    function editVideo(tutorialId) {
        // Redirect to the edit video page with the tutorial ID
        window.location.href = 'edit-video.php?tutorial_id=' + tutorialId;
    }

    function deleteTutorial(tutorialId) {
        // Send an AJAX request to disable the tutorial
        var request = new XMLHttpRequest();
        request.open('POST', 'disable-tutorial.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status === 200) {
                // If the request is successful, disable the tutorial's content
                var tutorialElement = document.getElementById('tutorial-' + tutorialId);
                tutorialElement.classList.add('disabled');
                tutorialElement.innerHTML = '<span class="disabled-text">This tutorial has been disabled.</span>';
            }
        };
        request.send('tutorial_id=' + tutorialId);
    }

    function deleteCourse(courseId) {
        // Send an AJAX request to disable the course
        var request = new XMLHttpRequest();
        request.open('POST', 'disable-course.php', true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status === 200) {
                // If the request is successful, disable the course's content
                var courseElement = document.getElementById('course-' + courseId);
                courseElement.classList.add('disabled');
                courseElement.innerHTML = '<span class="disabled-text">This course has been disabled.</span>';
            }
        };
        request.send('course_id=' + courseId);
    }
</script>

         
      
         
          </section>
</body>
</html>