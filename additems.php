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
    $id = $_POST['id'];
    $itemname = $_POST['itemname'];
    $picture = $_POST['picture'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    // Insert staff information into the database
    $sql = "INSERT INTO inventory (id,itemname, picture, quantity, description) VALUES ('$id','$itemname', '$picture', '$quantity', '$description')";

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
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>IMS login-Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/inventory.css">
    </head>

    <body id="loginBody">
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
        <div class="container">
            <div class="LoginHeader">
                <h1>Add an item</h1>
            </div>
            <div class="LoginBody">
                <form action='additems.php' method='POST'>
                    <div class="LoginInputsContainer">
                        <label for="">Item ID</label>
                        <input name="id" type="text" />
                    </div>
                    <div class="LoginInputsContainer">
                        <label for="">Item name</label>
                        <input name="itemname" type="text" />
                    </div>
                    <div class="LoginInputsContainer">
                        <label for="">Quantity</label>
                        <input name="quantity" type="text" />
                    </div>
                    <div class="LoginInputsContainer">
                        <label for="">400x400 picture url link</label>
                        <input name="picture" type="text" />
                    </div>
                    <div class="LoginInputsContainer">
                        <label for="">Description</label>
                        <input name = "description" type="text" />
                    </div>
                    <div class="LoginButtonContainer">
                        <button type='submit'>Upload</button>
                    </div>
                </form>
            </div>
    </body>
</html>