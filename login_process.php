<?php
session_start();
require_once('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows == 1) {
      
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];
        $_SESSION['name'] = $row['username'];
        $_SESSION['id'] = $row['id'];

        if (password_verify($password, $storedPassword)) {
          
            echo "<script>alert('Login Successful!');
                  window.location.href = 'home.php';
                  </script>";
        } else {
          
            echo "<script>alert('Invalid username or password.');
                  window.location.href = 'login.php';
                  </script>";
        }
    } else {
     
        echo "<script>alert('User not found.');
              window.location.href = 'login.php';
              </script>";
    }
}

$conn->close();
?>
