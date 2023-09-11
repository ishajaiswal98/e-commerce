<?php
session_start();
require_once('connection.php');
require_once('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-commerce Site</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <style>
        /* Custom CSS for profile page */
        
        

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .profile-picture {
            max-width: 200px;
            height: auto;
            margin: 20px 0;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-update-profile {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-update-profile:hover {
            background-color: #0056b3;
        }
    </style>

<body>
<?php
// session_start();
// // Include your database connection and user data retrieval here

// // Check for success message
if (isset($_SESSION['success_message'])) {
    echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']); // Remove the message from session
}

// Check for error message
if (isset($_SESSION['error_message'])) {
    echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Remove the message from session
}

$query = mysqli_query($conn,"select * from users where id = '".$_SESSION['id']."'");
while ($userData = mysqli_fetch_assoc($query)) {


?>
    <h1>Welcome, <?php echo $userData['username']; ?>!</h1>
    <img src="<?php echo $userData['profile_picture']; ?>" alt="Profile Picture" class="profile-picture">
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name" class="form-label">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo $userData['username']; ?>" class="form-control" required>
            </div>
            
            <!-- Existing form fields (full name, bio, etc.) -->
            <div class="form-group">
                <label for="profile_picture" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-update-profile" name="update_profile">Update Profile</button>
        </form>
<?php }?>
    <!-- Other profile information -->

    <!-- Include JavaScript for client-side validation and AJAX (if needed) -->

 <?php include_once 'footer.php'?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
