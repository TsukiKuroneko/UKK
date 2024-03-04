<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #111, #333, #000);
            color: #fff;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        p {
            text-align: center;
        }
        b {
            color: #ffc107;
        }
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            display: inline-block;
            margin: 0 10px;
        }
        a {
            text-decoration: none;
            color: #ffc107;
            transition: color 0.3s;
        }
        a:hover {
            color: #ff9800;
        }
    </style>
</head>
<body>
    <h1>Halaman Home</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
