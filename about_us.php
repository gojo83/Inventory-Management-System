<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff9999, #66ccff);
            padding-top: 50px;
        }

        h1 {
            font-weight: 700;
            color: #fff;
            text-align: center;
            margin-bottom: 50px;
        }

        .staff {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
            position: relative;
            height: 200px;
        }

        .staff:hover {
            transform: translateY(-5px);
        }

        .staff img {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .staff-details {
            padding: 20px;
            padding-left: 200px;
        }

        .staff .name {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .staff .specialty {
            font-style: italic;
            color: #666;
        }

        .staff .position {
            font-size: 18px;
            color: #888;
        }

        .staff .id {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>

        <div class="row">
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password_server = "";
            $dbname = "login_register";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password_server, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Query to retrieve staff information
            $sql = "SELECT * FROM management_staff";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-6 mb-4'>";
                    echo "<div class='staff'>";
                    echo "<div class='staff-details'>";
                    echo "<p class='name'>" . $row['NAME'] . "</p>";
                    echo "<p class='specialty'>" . $row['SPECIALITY'] . "</p>";
                    echo "<p class='position'>" . $row['POSITION'] . "</p>";
                    if (isset($row['ID'])) {
                        echo "<p class='id'>ID: " . $row['ID'] . "</p>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No staff information available.</p>";
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>
</html>
