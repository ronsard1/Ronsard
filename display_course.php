<!DOCTYPE html>
<html>
<head>
  <title>My Website</title>
  <link rel="stylesheet" href="display_course.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
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
  </style>
</head>
<body>
  <header>
    <h1>My Website</h1>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Courses</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <div class="search-bar">
      <input type="text" placeholder="Search...">
      <i class='bx bx-search'></i>
    </div>
    <div class="user-profile">
      <img src="user-profile.jpg" alt="User Profile">
      <span>John Doe</span>
    </div>
  </header>
  
  <main>
    <div class="right-div">
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
                        echo '<li><video src="' . $tutorialRow["video_path"] . '" controls></video></li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                } else {
                    echo '<p>No tutorials available for this course.</p>';
                }
            } else {
                echo "Course not found.";
            }
        } else {
            echo "Course ID not specified.";
        }

        // Close the database connection
        $conn->close();
        ?>
      </div>
    </div>
    <div class="left-div">
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
            echo '<h2>' . $courseRow["title"] . '</h2>';
        
          
            echo '</div>';

            // Display the embedded PDF
            echo '<div class="course-file">';
            echo '<iframe src="' . $courseRow["file_data"] . '" width="100%" height="600px" frameborder="0"></iframe>';
            echo '</div>';
        } else {
            echo "Course not found.";
        }
    } else {
        echo "Course ID not specified.";
    }

    // Close the database connection
    $conn->close();
    ?>
    </div>
  </main>
  
  <!-- Additional content goes here -->
  
</body>