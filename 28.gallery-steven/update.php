<?php
include 'config.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Update image details in database
    $sql = "UPDATE images SET title='$title', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Image ID not provided.";
}

$conn->close();
?>
