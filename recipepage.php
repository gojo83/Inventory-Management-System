<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Recipe Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .recipe-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .recipe-card:hover {
            transform: translateY(-5px);
        }

        .recipe-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .recipe-card-content {
            padding: 20px;
        }

        .recipe-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 22px;
            color: #333;
        }

        .recipe-card p {
            margin: 0;
            font-size: 16px;
            color: #777;
        }

        .recipe-card-ingredients {
            margin-top: 15px;
            font-weight: bold;
        }

        .recipe-card-ingredients ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .recipe-card-ingredients li {
            margin-bottom: 5px;
        }

        .recipe-card-nutrition {
            margin-top: 15px;
            font-style: italic;
            color: #555;
        }

        .recipe-card-tips {
            margin-top: 15px;
            color: #007bff;
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
    <div class="container">
        <h1>Some Recipes And Nutrition Facts</h1>
        <div class="recipe-grid">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password_server = "";
            $dbname = "login_register";

            $conn = new mysqli($servername, $username, $password_server, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch recipes from the database
            $sql = "SELECT * FROM recipes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="recipe-card">';
                    echo '<img src="' . $row["Image"] . '" alt="' . $row["Name"] . '">';
                    echo '<div class="recipe-card-content">';
                    echo '<h3>' . $row["Name"] . '</h3>';
                    echo '<p>' . nl2br($row["Instructions"]) . '</p>';
                    echo '<div class="recipe-card-ingredients">';
                    echo '<p><strong>Ingredients:</strong></p>';
                    echo '<ul>';
                    // Explode the ingredients string by newline character and display each ingredient as a list item
                    $ingredients = explode("\n", $row["Ingredients"]);
                    foreach ($ingredients as $ingredient) {
                        echo '<li>' . $ingredient . '</li>';
                    }
                    echo '</ul>';
                    echo '</div>'; // Close recipe-card-ingredients div
                    echo '<p class="recipe-card-nutrition"><em>Nutritional Information:</em><br>' . $row["Nutrition"] . '</p>';
                    echo '<p class="recipe-card-tips"><strong>Cooking Tips:</strong><br>' . nl2br($row["Tips"]) . '</p>';
                    echo '</div>'; // Close recipe-card-content div
                    echo '</div>'; // Close recipe-card div
                }
            } else {
                echo "0 results";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>