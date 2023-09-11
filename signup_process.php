<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo "Username is already taken. Please choose another.";
    } else {
       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_user_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($insert_user_query) === TRUE) {
            echo "<script>alert('Registration Successful!');
            window.location.href = 'login.php';
          </script>";
    
        } else {
            echo "<script>alert('Sorry! Something Went Wrong.');
            window.location.href = 'signup.php';
          </script>";
        }
    }
}

$conn->close();
?>
