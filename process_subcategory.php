<?php
include_once 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subcategoryName = $_POST['subcategory_name'];
    $subcategoryDescription = $_POST['subcategory_description'];
    $categoryId = $_POST['category_id'];

$duplicate = mysqli_query($conn,"select * from subcategories where name = '$subcategoryName'");
if (mysqli_num_rows($duplicate) > 0) {
    echo "<script> alert('Sub category Already Added!');
  window.location.href='./add_subcategory.php';
  </script>";
} else {
    $insert = mysqli_query($conn,"insert into subcategories (name,description,category_id)values ('$subcategoryName','$subcategoryDescription','$categoryId')");
    if ($insert == 1) {

        echo "<script> alert('Subcategory added successfully. Thank you.');
  window.location.href='./add_subcategory.php';
  </script>";
    } else {
        echo "<script> alert('Something went wrong. Please Try Again.');
        window.location.href='./add_subcategory.php';
  </script>";
    }
} 
}

?>
