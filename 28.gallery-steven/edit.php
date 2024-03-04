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
    <title>Edit Image</title>
</head>
<body>
    <h2>Edit Image</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title"><br>
        <input type="text" name="description" value="<?php echo $description; ?>" placeholder="Description"><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
