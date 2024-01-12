
<?php
include ('sessions2.php');

?>
           

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="style.css">
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
      </div>

         
          <div class="dashboard">
            <div class="chart">
              <canvas id="studentLevelChart"></canvas>
            </div>
            <div class="chart">
              <canvas id="courseCountChart"></canvas>
            </div>
            <div class="venn-diagram">
              <canvas id="vennDiagram"></canvas>
            </div>
          </div>
        
          <script>
            // Dummy data for student levels
            const studentLevels = ['Beginner', 'Intermediate', 'Advanced'];
            const studentLevelData = [20, 30, 50];
        
            // Dummy data for course counts
            const courseCategories = ['C Programming', 'Java', 'HTML', 'Networking'];
            const courseCountData = [25, 40, 30, 20];
        
            // Initialize the student level chart
            const studentLevelChart = new Chart(document.getElementById('studentLevelChart'), {
              type: 'bar',
              data: {
                labels: studentLevels,
                datasets: [{
                  label: 'Student Levels',
                  data: studentLevelData,
                  backgroundColor: 'rgba(75, 192, 192, 0.8)'
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                    max: 100
                  }
                }
              }
            });
        
            // Initialize the course count chart
            const courseCountChart = new Chart(document.getElementById('courseCountChart'), {
              type: 'pie',
              data: {
                labels: courseCategories,
                datasets: [{
                  label: 'Course Count',
                  data: courseCountData,
                  backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)']
                }]
              }
            });
        
            // Initialize the Venn diagram
            const vennDiagramData = [
              { sets: ['Students'], size: 100 },
              { sets: ['Courses'], size: 80 },
              { sets: ['Students', 'Courses'], size: 40 }
            ];
        
            const vennDiagram = venn.VennDiagram()
              .width(300)
              .height(300);
        
            d3.select("#vennDiagram")
              .datum(vennDiagramData)
              .call(vennDiagram);
          </script>
         
      
         
          </section>
</body>
</html>