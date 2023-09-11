
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .jumbotron {
            background-image: url('banner.jpg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .product-card {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
        }

        .product-card img {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'?>
    <div class="jumbotron">
        <h1 class="text-dark">Welcome to Your E-commerce Site</h1>
        <p class="text-dark">Discover Amazing Products</p>
    </div>

    <div class="container">
    <div class="row">
        <?php
        require_once('connection.php');

        $query = "SELECT * FROM products"; 
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-3">';
                echo '<div class="product-card">';
                echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" height="200" width="250">';
                echo '<h2>' . $row['name'] . '</h2>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p><strong>$' . $row['price'] . '</strong></p>';
                echo '<button class="btn btn-primary btn-add-to-cart" data-id="' . $row['id'] . '">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No products available.';
        }
        ?>
    </div>
</div>
    <?php include_once 'footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="your_custom.js"></script>
</body>
</html>
