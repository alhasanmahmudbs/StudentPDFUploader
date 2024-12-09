<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name']; // Get the name from the form
    $pages = $_POST['pages']; // Get the number of pages
    $color = $_POST['color']; // Get the print type (color/bw)
    $file = $_FILES['file']; // Get the uploaded file details

    // Check for errors
    if ($file['error'] === 0) {
        // Define the folder to save uploads
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir); // Create uploads folder if it doesn't exist
        }

        // Save the uploaded file in the uploads folder
        $filePath = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            echo "File uploaded successfully! <br>";
            echo "Name: $name <br>";
            echo "Pages: $pages <br>";
            echo "Print Type: $color <br>";
            echo "File Path: $filePath <br>";
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Error: Unable to upload file.";
    }
}
?>
