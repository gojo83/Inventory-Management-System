<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Website</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Login Form -->
            <?php if(!isset($_SESSION['user_id'])): ?>
            <h2>Login</h2>
            <?php if(isset($login_error)): ?>
            <div class="alert alert-danger"><?php echo $login_error; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
            <?php endif; ?>

            <!-- Registration Form -->
            <?php if(!isset($_SESSION['user_id'])): ?>
            <h2 class="mt-4">Register</h2>
            <?php if(isset($register_error)): ?>
            <div class="alert alert-danger"><?php echo $register_error; ?></div>
            <?php endif; ?>
            <?php if(isset($register_success)): ?>
            <div class="alert alert-success"><?php echo $register_success; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
            </form>
            <?php endif; ?>

            <!-- Logout Button -->
            <?php if(isset($_SESSION['user_id'])): ?>
            <a href="index.php?logout=true" class="btn btn-danger mt-4">Logout</a>
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <!-- Display Items -->
            <h2>Items</h2>
            <!-- Placeholder for item cards -->
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>