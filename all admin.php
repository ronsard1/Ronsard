






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>all admin</title>
    <link rel="stylesheet" href="all books.css">
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

$sql = "SELECT * FROM admin WHERE role != 'super_admin'";
$result = mysqli_query($connection, $sql);

if (!$result) {
    die("Error: " . mysqli_error($connection));
}


if (isset($_GET['delete'])) {
    $adminid = $_GET['delete'];

    $deleteSql = "DELETE FROM admin WHERE admin_id = $adminid";
    $deleteResult = mysqli_query($connection, $deleteSql);

    if (!$deleteResult) {
        die("Error: " . mysqli_error($connection));
    }

    echo "admin with ID $adminid deleted!";
}


if (isset($_GET['edit'])) {
    $adminid = $_GET['edit'];

   
    header("Location: edit admin.php?id=$adminid");
    exit();
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

            <h2>Super Admin Dashboard</h2>
       <center>
<h3>All admins</h3>
 <table border="2" style=" border-collapse:collapse">
    <thead>
        <tr>
            <th>admin ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>role</th>
       <th>Action</th>
       </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['admin_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td> 
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td class="action-buttons">
                <a class="edit-button" href="edit admin.php?edit=<?php echo $row['admin_id']; ?>">
                    Edit
                </a>
                <button class="delete-button" onclick="deleteadmin(<?php echo $row['admin_id']; ?>)">
                    Delete
                </button>
            </td>
        </tr>
    <?php } ?>
</tbody>
</table>
<script>
        // Function to delete admin
        function deleteadmin(adminid) {
            const confirmDelete = confirm('Are you sure you want to delete this admin?');
            if (confirmDelete) {
                // Redirect to the delete page with the admin ID
                window.location.href = `all admin.php?delete=${adminid}`;
            }
        }

        // Function to edit a admin
        function editadmin(adminid) {
            // Redirect to the edit admin page with the admin ID
            window.location.href = `edit admin.php?edit=${adminid}`;
        }
    </script>    

         
                   
                
                </center>
























            
            </ul>
           
         
        </div>
       
    </div>
  </section>


  
</body>
</html>