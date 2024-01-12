






<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>add book</title>
    <link rel="stylesheet" href="all books.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
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
        <img src="profile.jpg" alt="">
        <div class="dropdown1">
            <button class="dropbtn1">
             
              <span class="admin_name">Ronsard</span>
                
          <i class="bx bx-chevron-down"></i>
           </button>
            <div class="dropdown-content1">
              <a href="#">view profile</a>
              <a href="#">menu</a>
  
        </div>>
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
                    <h2>ALL Courses </h2> <a href="admin.html">back</a>
                    <table border="2" style=" border-collapse:collapse">
                      <tr>  <th>ID</th>  <th>Course Title</th>  <th>Description</th>   <th>Categories</th> <th>Action</th></tr>
                  <tr> <td>1</td> <td>JAVA DEVELOPMENT</td> <td>this is new for users so take this module to know more</td>   <td>Programming</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
                      <tr> <td>2</td> <td>WEB DESIGN</td> <td>this is new for users so take this module to know more</td>   <td>Programming</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
            <tr> <td>3</td> <td>BUSINESS MANAGEMENT</td> <td>this is new for users so take this module to know more</td>   <td>Business </td>   <td><button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
                  
                           <tr> <td>4</td> <td>C PROGRAMMING</td> <td>this is new for users so take this module to know more</td>   <td>Programming</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
                      <tr> <td>5</td> <td>DATABASE DESIGN</td> <td>this is new for users so take this module to know more</td>   <td>Database</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
            <tr> <td>6</td> <td>CYBER SECURITY</td> <td>this is new for users so take this module to know more</td>   <td>Security</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
            <tr> <td>7</td> <td>DATA ANALYSISY</td> <td>this is new for users so take this module to know more</td>   <td>Security</td> <td>   <button type="submit">Edit </button> | <button type="submit">Delete</button></td></tr>
                    </table>
                    <a href="add course.html">Add New course</a>
                </center>
























            
            </ul>
           
         
        </div>
       
    </div>
  </section>


  
</body>
</html>