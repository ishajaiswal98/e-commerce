<?php include_once 'connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subcategory</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<?php include_once 'header.php'?>
    <div class="container mt-5">
        <h1>Add Subcategory</h1>
        <form action="process_subcategory.php" method="POST">
            <div class="mb-3">
                <label for="subcategory_name" class="form-label">Subcategory Name:</label>
                <input type="text" id="subcategory_name" name="subcategory_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="subcategory_description" class="form-label">Subcategory Description:</label>
                <textarea id="subcategory_description" name="subcategory_description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-select">
                    <!-- Replace this with dynamically generated options -->
                    <?php 
                    $query = mysqli_query($conn,"select * from categories");
                    while($row = mysqli_fetch_assoc($query)){
                        $category = $row['name'];
                        $category_id = $row['id'];
                    
                    
                    ?>
                    <option value="<?php echo $category_id ; ?>"><?php echo $category ; ?></option>
                    <!-- Add more options as needed -->
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>
    </div>
    <?php include_once 'footer.php'?>
    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
