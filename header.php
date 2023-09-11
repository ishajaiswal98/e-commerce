<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-commerce Site</title>
    <style>
        header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .search-bar {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px;
            border: none;
            border-radius: 4px;
        }

        .search-button {
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .user-options {
            display: flex;
            align-items: center;
        }

        .user-options a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
          
            <a href="home.php" class="logo">YourLogo</a>
            
          
            <nav>
                <a href="home.php">Home</a>
                <a href="#">Shop</a>
                <a href="add_category.php">Categories</a>
                <a href="add_subcategory.php">Sub Categories</a>
                <a href="index.php">Cart</a>
            </nav>
            
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>
            
            <div class="user-options">
                <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>
                <a href="log_out.php">LogOut</a>
                <a href="index.php"><i class="fa fa-shopping-cart"></i></a>
                <a href="profile.php"><i class="fa fa-user"></i></a>
            </div>
        </div>
    </header>
<script src="https://kit.fontawesome.com/891cae6fb5.js" crossorigin="anonymous"></script>
</html>
