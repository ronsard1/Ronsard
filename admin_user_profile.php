
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        body{
            margin : 0;
            padding : 0;
            font-family : 'Montserrat', sans-serif;
            background-color: #ddd;
            align-items: center;
            justify-content: center;
        }
        *{
            box-sizing: border-box;
        }

        .container{
            display: flex;
            width: 100%;
            padding: 20px 20px;
            background-color: black;
        }

        .box{
            flex: 30%;
            display: table;
            align-items: center;
            text-align: center;
            font-size: 20px;
            background-color: #0d1425;
            color: #fff;
            padding: 30px 30px;
            border-radius: 20px;
        }

        .box img{
            width: 250px;
            height: 100px;
            border-radius: 50%;
           border: 2px solid #fff;
        }

        .box ul{
            margin-top: 30px;
            font-size: 30px;
            text-align: center;
        }

        .box ul li{
            list-style: none;
            margin-top: 50px;
            font-weight: 100;
        }

        .box ul li i{
            cursor: pointer;
            margin: 10px;
        }

        .box ul li i:hover{
            opacity: 0.6;
        }

        .About{
            margin-left: 20px;
            flex: 50%;
            display: table;
            padding: 30px 30px;
            font-size: 20px;
            background-color: #fff;
            border-radius: 20px;
            background-image: url("userbg.jpg");
            color: #ddd;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .styled-form {
    max-width: 400px;
    margin: 0 auto;
}

.About h1 {
    text-align: center;
    color: #fff;
    text-shadow: 3px  3px 6px#ff0055;
    font-size: 50px;
    margin-left: 1%;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

.input-container {
    position: relative;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}




button.changepass {
    background-color: #b700ff;
    color: white;
    border: none;
    font-size: large;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 2px 2px 5px#acaf01;
    margin-left: 32%;
    transition: background-color 0.3s;
}

button.changepass:hover {
    background-color: #0056b3;
}
.profile-box {
    max-width: 300px;
    margin: 20px auto;
    text-align: center;
    height: 650px;
    background-color: #0d1425;
    border-radius: 10px;
}

.change-profile-btn {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 10px;
    transition: background-color 0.3s;
    margin-top: 30px;
}
.back-btn{
    background-color: #ff0000;
    color: white;
    border: none;
    font-size: 1.3em;
    box-shadow: 3px 3px 5px#970101;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 10px;
    transition: background-color 0.3s;
    margin-top: 30px;
}
.back-btn:hover{
        background-color: #ff00008e;
}

.change-profile-btn:hover {
    background-color: #0056b3;
}

#profile-image {
    width: 100%;
    max-width: 200px;
    border-radius: 50%;
    margin-bottom: 10px;
}

ul {
    list-style: none;
    padding: 0;
}

ul li {
    color: #ddd;
    font-size: 1.1em;
    font-weight: bold;
    padding-top: 15px;
}
ul li i{
    padding-inline: 10px;
}


    </style>
</head>

<body>
    <?php
    // Include your database connection code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "e-learining";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch admin data from the database
    $admin_id = 1; // Assuming you have a specific admin ID
    $query = "SELECT * FROM admin WHERE admin_id = $admin_id";
    $result = $conn->query($query);

    // Check if the data exists
    if ($result->num_rows > 0) {
        $admin_data = $result->fetch_assoc();
        $first_name = $admin_data['first_name'];
        $last_name = $admin_data['last_name'];
        $email = $admin_data['email'];
        $username = $admin_data['user_name'];
        $password = $admin_data['password'];
    } else {
        // Handle the case when admin data is not found
    }

    $conn->close();
    ?>

    <div class="container">
        <div class="profile-box">
            <img id="profile-image" src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar">
            <button class="change-profile-btn">Change Profile</button>

            <ul>
                <li><?php echo $first_name . ' ' . $last_name; ?></li>
                <li><?php echo $email; ?></li>
                <li><?php echo $username; ?></li>
                   
                <button onclick="redirectToDash()" class="back-btn">Go Back</button>
                <li>
                    <i style="font-size: 24px" class="fa">&#xf230;</i>
                    <i style="font-size: 24px" class="fa">&#xf0d5;</i>
                    <i style="font-size: 24px" class="fa">&#xf0e1;</i>
                </li>
            </ul>s
        </div>
            
        <div class="About">
            <ul>
                <h1>General Information</h1>
                <div class="userinfo">
                    <form class="styled-form">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <div class="input-container">
                                <input type="text" name="first_name" id="firstnameInput" placeholder="Enter your first name" value="<?php echo $first_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <div class="input-container">
                                <input type="text" name="last_name" id="lastnameInput" placeholder="Enter your last name" value="<?php echo $last_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-container">
                                <input type="email" name="email" id="emailInput" placeholder="Enter your email" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-container">
                                <input type="text" name="username" id="usernameInput" placeholder="Enter your username" value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-container">
                                <input type="password" name="password" id="passwordInput" placeholder="Enter your password" value="<?php echo $password; ?>">
                            </div>
                        </div>
                        <button class="changepass">Save changes</button>
                    </form>
                </div>
            </ul>
        </div>
    </div> 

    <script>
        function redirectToDash() {
            window.location.href = "dashboard.php";
        }
    </script>
</body>
</html>