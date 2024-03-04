<?php
include 'config.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Get image path from database
    $sql = "SELECT image_path FROM images WHERE id = $id";
    $result = $conn->query($sql);
    
    if($result) {
        // Check if any rows are returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['image_path'];
            
            // Delete image file from server
            if (unlink($imagePath)) {
                // Delete image record from database
                $sql_delete = "DELETE FROM images WHERE id = $id";
                if ($conn->query($sql_delete) === TRUE) {
                    echo "Image deleted successfully.";
                } else {
                    echo "Error deleting image: " . $conn->error;
                }
            } else {
                echo "Error deleting image file.";
            }
        } else {
            echo "Image not found.";
        }
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Image ID not provided.";
}

$conn->close();
?>
