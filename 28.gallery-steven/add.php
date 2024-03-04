<!DOCTYPE html>
<html>
<head>
    <title>Add Image</title>
</head>
<body>
    <h2>Add Image</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="description" placeholder="Description"><br>
        <input type="file" name="image" required><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
