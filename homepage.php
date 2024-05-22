<?php
$servername = "localhost";
$username = "root";
$password_server = "";
$dbname = "login_register";

$conn = mysqli_connect($servername, $username, $password_server, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    mysqli_select_db($conn, $dbname);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Delete item from database
    $sql_delete = "DELETE FROM inventory WHERE id = '$id'";
    if (mysqli_query($conn, $sql_delete)) {
        echo "Item deleted successfully.";
        header("Refresh:0");
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM inventory";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>IMS Homepage - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="css/inventory.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  
        <div class="banner">
            <div class="homepageContainer">
                <div class="bannerHeader">
                    <h1>BRAC UNIVERSITY CAFETERIA</h1>
                    <p>Inventory</p>
                </div>
                <p class="bannerTagline">A dining experience worth sharing</p>
                <div class="bannerIcons">
                    <a href=""><i class="fa fa-apple"></i></a>
                    <a href=""><i class="fa fa-cutlery"></i></a>
                </div>
            </div>
        </div>
        <div class="homepageContainer">
            <div class="homepageFeature">
                <div class="homepageFeature">
                    <span class="featureIcon"><i class="fa fa-gear"></i></span>
                    <h3 class="featureTitle">Rely</h3>
                    <p class="featureDescription">Every Day</p>
                </div>
                <div class="homepageFeature">
                    <span class="featureIcon"><i class="fa fa-star"></i></span>
                    <h3 class="featureTitle">On</h3>
                    <p class="featureDescription">Every Week</p>
                </div>
                <div class="homepageFeature">
                    <span class="featureIcon"><i class="fa fa-globe"></i></span>
                    <h3 class="featureTitle">Us</h3>
                    <p class="featureDescription">Every Year</p>
                </div>

            <div class="">
                <div class="row">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-md-4 mb-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?php echo $row['picture']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php
                                                                echo $row['itemname']; ?></h5>
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                        <p class="card-text">Quantity: <?php echo $row['quantity']; ?></p>
                                        <form method="POST" action="">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-outline-danger">Delete item</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<h1>No inventory items found.</h1>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
                
    </body>

</html>