






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>add student</title>
    <link rel="stylesheet" href="add student.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
</style>
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
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['user_type'];
    // Check if username already exists
    $checkQuery = "SELECT * FROM admin WHERE user_name = '$userName'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      
    } else {
        $sql = "INSERT INTO admin (first_name, last_name, email, user_name, password, role) VALUES ('$firstName', '$lastName', '$email', '$userName', '$password','$usertype')";

        if (mysqli_query($connection, $sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }
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
                        <h2>Regist Admin</h2>
                    
                        <form action="" method="POST">
        <div>
            <label for="firstname">First Name</label><br>
            <span class="icon"><i class='bx bxs-user'></i></span>
            <input type="text" id="firstname" name="firstname" placeholder="Enter first name" class="name" required>
        </div><br>
        <div>
            <label for="lastname">Last Name</label><br>
            <span class="icon"><i class='bx bxs-user'></i></span>
            <input type="text" id="lastname" name="lastname" placeholder="Enter last name" class="name" required>
        </div><br>
        <div>
            <label for="username">Username</label><br>
            <span class="icon"><i class='bx bxs-user'></i></span>
            <input type="text" id="username" name="username" placeholder="Enter username" class="name" required>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $firstName = $_POST['firstname'];
                $lastName = $_POST['lastname'];
                $email = $_POST['email'];
                $userName = $_POST['username'];
                $password = $_POST['password'];

                // Check if username already exists
                $checkQuery = "SELECT * FROM admin WHERE user_name = '$userName'";
                $checkResult = mysqli_query($connection, $checkQuery);

                if (mysqli_num_rows($checkResult) > 0) {
                    echo "<p class='error'>Username already exists. Please try another username.</p>";
                }
            }
            ?>
       
        </div><br>
        <div>
            <label for="email">Email</label><br>

            <span class="icon"><i class='bx bx-envelope'></i></span>
            <input type="text" id="email" name="email" placeholder="Enter valid email" class="name">
        </div><br>
        <div>
            <label for="role">role</label><br>
            <span class="icon"> <i class='bx bxs-user-circle'></i></span>
            <select id="user_type" name="user_type" class="name">
           
           <option value="admin">Admin</option>
           <option value="super_admin">super_admin</option>
       </select>
        </div><br>
        <div>
            <label for="password">Password</label><br>
            <i class='bx bx-lock'></i>
            <input type="password" id="password" name="password" placeholder="Enter password" class="name">
        </div><br>
        <div class="submit">
            <input type="submit" value="Add Admin" class="submit">
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