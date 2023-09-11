<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update_profile'])) {
    require_once('connection.php');

    $user_id = $_SESSION['id'];
    $full_name = $_POST['full_name'];

    if ($_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
       
        $upload_dir = '';
        $file_name = uniqid() . '_' . $_FILES['profile_picture']['name'];
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_dir . $file_name)) {
            $profile_picture = $upload_dir . $file_name;
        } else {
            $_SESSION['error_message'] = "Error uploading profile picture.";
            header("Location: profile.php");
            exit();
        }
    } else {
        $profile_picture = $_SESSION['profile_picture'];
    }

    $updateQuery = "UPDATE users SET username=?, profile_picture=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssi", $full_name, $profile_picture, $user_id);

    if ($stmt->execute()) {
       
        $_SESSION['username'] = $full_name;
        $_SESSION['profile_picture'] = $profile_picture;
        $_SESSION['success_message'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit();
    } else {
     
        $_SESSION['error_message'] = "Error updating profile.";
        header("Location: profile.php");
        exit();
    }
}
?>
