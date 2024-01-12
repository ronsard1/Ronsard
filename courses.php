<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Services Section</title>
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style1.css" />
</head>

<body>

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

    // Query to retrieve data from the 'course' table
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);

    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            // Generate HTML for each course card
            echo '<div class="column">
                    <div class="card">
                        
                        <img src="' . $row["course_photo"] . '">
                        <h3>' . $row["title"] . '</h3>
                        <p>' . $row["description"] . '</p>
                    </div>
                </div>';
        }
        echo '</div>';
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>

</html>
