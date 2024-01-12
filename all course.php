






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>all courses</title>
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

  $sql = "SELECT * FROM course";
  $result = mysqli_query($connection, $sql);

  if (!$result) {
    die("Error: " . mysqli_error($connection));
  }

  // Delete student
  if (isset($_GET['delete'])) {
    $courseId = $_GET['delete'];

    $deleteSql = "DELETE FROM course WHERE course_id = $courseId";
    $deleteResult = mysqli_query($connection, $deleteSql);

    if (!$deleteResult) {
      die("Error: " . mysqli_error($connection));
    }

    echo "course with ID $courseId deleted!";
  }

  // Edit student
  if (isset($_GET['edit'])) {
    $courseId = $_GET['edit'];

    // Redirect to the edit student page with the student ID
    header("Location: edit course.php?id=$courseId");
    exit();
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
          <a href="dashboard.html" class="active">
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
              <span class="links_name">Manage student</span>
           </button>
            <div class="dropdown-content">
              <a href="all student.html">All student</a>
              <a href="add student.html">Add student</a>
            
            </div>
          </div>
          
          
        </li>
        <li><div class="dropdown">
          <button class="dropbtn">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Courses</span>
         </button>
          <div class="dropdown-content">
            <a href="all courses.html">All courses</a>
            <a href="add courses.html">Add course</a>
          
          </div>
        </div>
          
        </li>
        <li>
          <div class="dropdown">
            <button class="dropbtn">
              <i class='bx bx-book-alt' ></i>
            <span class="links_name">Books</span>
           </button>
            <div class="dropdown-content">
              <a href="all books.html">All books</a>
              <a href="add books.html">Add book</a>
            
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
              <a href="all tutorials.html">All tutorials</a>
              <a href="add tutorials.htm">Add tutorial</a>
             
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

        <li>
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
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
        <img src="#" alt="">
        <span class="admin_name">Ronsard</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Registed student</div>
            <div class="number">00</div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
         
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">courses</div>
            <div class="number">15</div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
         
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">books</div>
            <div class="number">15</div>
            <div class="indicator">
              
              <span class="text"></span>
            </div>
          </div>
                 </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">tutorials</div>
            <div class="number">50</div>
            <div class="indicator">
            
              <span class="text"></span>

            </div>
          </div>
         
        </div>
      </div>

      <div class="sales-boxes">

       
         
         
            <ul class="details">

      
       <center>
<h3>All courses</h3>
 <table border="2" style=" border-collapse:collapse">
    <thead>
        <tr>
            <th>course ID</th>
            <th>title</th>
            <th>decription</th>
            <th>categoty</th>
            <th>course photo</th>
            <th>course file</th>
       <th>Action</th>
       </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['course_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td> 
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['course_photo']; ?></td>
                <td><?php echo $row['file_data']; ?></td>
                
                <td class="action-buttons">
                        <button class="edit-button" onclick="editcourse(<?php echo $row['course_id']; ?>)">Edit</button>
                        <button class="delete-button" onclick="deletecourse(<?php echo $row['course_id']; ?>)">Delete</button>
                    </td>
                </tr>
          
            <?php } ?>
    </tbody>
</table>
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
























            
            </ul>
           
         
        </div>
       
    </div>
  </section>


  
</body>
</html>