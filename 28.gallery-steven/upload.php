<?php
include 'config.php';

$title = $_POST['title'];
$description = $_POST['description'];

$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    // Allow certain file formats
    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully, insert details into database
            $sql = "INSERT INTO images (title, description, image_path) VALUES ('$title', '$description', '$targetFile')";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
} else {
    echo "File is not an image.";
}
?>
