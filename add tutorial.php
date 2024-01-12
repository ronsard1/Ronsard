






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>add tutorial</title>
    <link rel="stylesheet" href="adding.css">
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


      <div class="sales-boxes">

       
         
         
            <ul class="details">


               





<div class="main">
<div>
	<h2>Add Tutorial</h2>
    <?php if (!empty($uploadMessage)) : ?>
        <p><?php echo $uploadMessage; ?></p>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">

	<div>
		<label class="lab" for="name2"><b>Tutorial title</b></label><br>
		
		<input type="text" id="title" name="title" placeholder="enter course title" class="name">
	</div><br>
	
	
    <div>
	
		
		

        <label for="course_id" class="lab"><b>course Id</b></label><br>
        <input type="text" name="course_id" id="course_id" placeholder="enter course id" class="name" required>
        <br><br>
	</div><br>
  <div>
 
  <label for="video"  class="lab">Video File (MP4):</label><br>
        <input type="file" name="video" id="video" accept="video/mp4" class="name" required >
</div>

	



	
	
<br>
<div> <input type="submit"  value="add video"  id="Add tutorial" class="submit"></div>
	
</div>
</form>
</div>

            
            </ul>
           
         
        </div>
       
    </div>
  </section>


  
</body>
</html>
<?php
$uploadMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'e-learining';

    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $courseId = mysqli_real_escape_string($connection, $_POST['course_id']);
    $title = mysqli_real_escape_string($connection, $_POST['title']);

    // Upload video file
    $targetDir = "videos";
    $videoName = basename($_FILES["video"]["name"]);
    $videoPath = $targetDir . $videoName;
    $videoFileType = strtolower(pathinfo($videoPath, PATHINFO_EXTENSION));

    if ($videoFileType !== "mp4") {
        $uploadMessage = "Only MP4 files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath)) {
            // Insert tutorial into database
            $sql = "INSERT INTO tutorial (video_path, course_id, title) VALUES (?, ?, ?)";
            $statement = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($statement, "sss", $videoPath, $courseId, $title);

            if (mysqli_stmt_execute($statement)) {
                $uploadMessage = "Tutorial uploaded successfully.";
            } else {
                $uploadMessage = "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_stmt_close($statement);
        } else {
            $uploadMessage = "Error uploading the video.";
        }
    }

    mysqli_close($connection);
}
?>