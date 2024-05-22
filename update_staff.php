<?php
$servername = "localhost";
$username = "root";
$password_server = "";
$dbname = "login_register";

// Create connection
$conn = mysqli_connect($servername, $username, $password_server, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    mysqli_select_db($conn, $dbname);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $picture = $_POST['picture'];
    $name = $_POST['name'];
    $speciality = $_POST['speciality'];
    $position = $_POST['position'];
    $m_id = $_POST['m_id'];

    // Insert staff information into the database
    $sql = "INSERT INTO management_staff (PICTURE, NAME, SPECIALITY, POSITION, M_ID) VALUES ('$picture', '$name', '$speciality', '$position', '$m_id')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>About Us</title>
    <style>
        .bodyM {
            background-color: azure;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding-top: 50px;
        }

        .form-group {
            margin-bottom: 30px; /* Increased spacing between form groups */
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px; /* Increased spacing between label and input */
        }

        .form-group input[type="text"] {
            width: calc(100% - 20px); /* Adjusted input width */
            padding: 15px; /* Increased input padding */
            border-radius: 10px; /* Increased border radius */
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 20px; /* Increased spacing between inputs */
        }

        .form-group button {
            padding: 15px 30px; /* Increased button padding */
            background-color: #f685a1;
            color: black;
            border: none;
            border-radius: 10px; /* Increased border radius */
            cursor: pointer;
            font-weight: bold;
            font-size: 16px; /* Increased font size */
            transition: background-color 0.3s; /* Added transition effect */
        }

        .form-group button:hover {
            background-color: pink;
        }
    </style>
</head>

<body>
      <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BRACU Cafeteria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
          </li>  
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="signin.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registration.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="additems.php">Add items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="recipepage.php">Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="aboutus.php">About us</a>
          </li>
      </div>
    </div>
  </nav>
    <div class='bodyM'>
    <div class="container">
        <h1>Update Management staff</h1>

        <!-- Form to input staff information -->
        <form action="update_staff.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="picture">Picture URL:</label>
                <input type="text" id="picture" name="picture" placeholder="Enter picture URL">
            </div>
            <div class="form-group">
                <label for="speciality">Speciality:</label>
                <input type="text" id="speciality" name="speciality" placeholder="Enter speciality">
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" placeholder="Enter position">
            </div>
            <div class="form-group">
                <label for="m_id">M_ID:</label>
                <input type="text" id="m_id" name="m_id" placeholder="Enter M_ID">
            </div>
            <button class='btn btn-outline-danger' type="submit">Add Staff</button>
        </form>
    </div>
    </div>
    <br>
</body>

</html>

