<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="css/inventory.css">
    </head>

    <body id="RegBody">
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
            <div class="RegHeader">
                <h3>SignUp</h3>
            </div>
            <div class="RegBody">
						<?php 
      include('dbconnect.php'); 
      if(isset($_POST['add'])){
        $u = $_POST['username'];
        $p = $_POST['password'];
        


        $query = mysqli_query($conn, "INSERT INTO users(username, password) VALUES ('$u','$p')");

        if($query) {
          echo "<script>alert('USER ADDED SUCCESSFULLY')</script>";
        } else {
          echo "<script>alert('there is an error')</script>";
        }
      } ?>
                <form method="POST">
                    <div class="RegInputsContainer">
                        <label for="">Username</label>
                        <input name=" username" type="text" required>
                    </div>
                    <div class="RegInputsContainer">
                        <label for="">Password</label>
                        <input name= "password" type="password" required>
                    </div>
                    <div class="RegButtonContainer">
                        <a href='/home.php'><button name= "add" type="submit">Submit</button></a>
                    </div>
                </form>
            </div>

    </body>
</html>
