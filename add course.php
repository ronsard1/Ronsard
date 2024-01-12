






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>add book</title>
    <link rel="stylesheet" href="adding.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'e-learining';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $courseTitle = $_POST['name2'];
    $description = $_POST['discription'];
    $category = $_POST['name'];

    // Process the file upload (assuming it's stored in a directory named "downloads")
    $file = $_FILES['file']['name'];
    $targetDir = 'downloads';
    $fileDestination = $targetDir . basename($file);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $fileDestination)) {
        // Process the photo upload (assuming it's stored in a directory named "pictures")
        $photo = $_FILES['photo']['name'];
        $photoDir = 'pictures';
        $photoDestination = $photoDir . basename($photo);

        // Validating photo type
        $photoType = strtolower(pathinfo($photoDestination, PATHINFO_EXTENSION));
        if (!in_array($photoType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed for the photo.";
            exit;
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoDestination)) {
            // File and photo uploads succeeded, now insert the course details into the database
            $sql = "INSERT INTO course (title, description, category, file_data, course_photo) VALUES ('$courseTitle', '$description', '$category', '$fileDestination', '$photoDestination')";

            // Execute the SQL query
            if (mysqli_query($conn, $sql)) {
                echo "Course added successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Photo upload failed.";
        }
    } else {
        echo "File upload failed.";
    }

    // Close the database connection
    mysqli_close($conn);
}
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
      <div class="sales-boxes">

       
         
         
            <ul class="details">


               





            <div class="main">
   
              <form method="POST" enctype="multipart/form-data">
                <div>
                  <label class="lab" for="name2"><b>Course Title</b></label><br>
                  <input type="text" id="name2" name="name2" placeholder="Enter course title" required class="name">
                </div>
                <div>
                  <label class="lab" for="discription"><b>Description</b></label><br>
                  <textarea id="discription" name="discription" placeholder="Enter description" required class="name"></textarea>
                </div>
                <div>
                  <label class="lab" for="name"><b>Category</b></label><br>
                  <select id="name" name="name" required class="name">
                    <option value="" disabled selected>Select category</option>
                    <option value="programing">programing</option>
                    <option value="networking">networking</option>
                    <option value="computer security">computer security</option>
                    <!-- Add more categories as needed -->
                  </select>
                </div>
                <div>
                  <label class="lab" for="file"><b>Course File Upload</b></label><br>
                  <input type="file" id="file" name="file" required class="name">
                </div>
                <div>
                  <label class="lab" for="photo"><b>Course Photo Upload</b></label><br>
                  <input type="file" id="photo" name="photo" required class="name">
                </div>
                <div>
                  <button type="submit" class="submit">Add Course</button>
                </div>
              </form>
   
</div>
</ul>
    </div>
  </section>


  
</body>
</html>