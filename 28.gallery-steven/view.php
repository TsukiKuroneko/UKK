<?php
include 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch image details from database
    $sql = "SELECT * FROM images WHERE id = $id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $description = $row['description'];
        $imagePath = $row['image_path'];
    } else {
        echo "Image not found.";
        exit;
    }
} else {
    echo "Image ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Image</title>
</head>
<body>
    <h2><?php echo $title; ?></h2>
    <img src="<?php echo $imagePath; ?>" alt="<?php echo $title; ?>">
    <p><?php echo $description; ?></p>
</body>
</html>
