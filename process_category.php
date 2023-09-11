<?php
include_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['category_name'];
    $categoryDescription = $_POST['category_description'];

    $duplicate = mysqli_query($conn,"select * from categories where name = '$categoryName'");
if (mysqli_num_rows($duplicate) > 0) {
    echo "<script> alert('Category Already Added!');
  window.location.href='./add_category.php';
  </script>";
} else {
    $insert = mysqli_query($conn,"insert into categories (name,description)values ('$categoryName','$categoryDescription')");
    if ($insert == 1) {

        echo "<script> alert('Category added successfully. Thank you.');
  window.location.href='./add_category.php';
  </script>";
    } else {
        echo "<script> alert('Something went wrong. Please Try Again.');
        window.location.href='./add_category.php';
  </script>";
    }
} 
}

?>