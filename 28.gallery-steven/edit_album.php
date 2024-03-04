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
    <title>Halaman Edit Album</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #333, #000, #111);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            color: #fff;
            overflow: hidden;
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
            margin-bottom: 30px;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            text-align: center;
            margin-bottom: 20px;
        }
        ul li {
            display: inline-block;
            margin: 0 10px;
        }
        ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            transition: color 0.3s;
        }
        ul li a:hover {
            color: #ffc107;
        }
        form {
            text-align: center;
            margin-bottom: 30px;
        }
        form table {
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        form table td {
            padding: 10px;
        }
        form table input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-bottom: 2px solid #fff;
            transition: border-bottom-color 0.3s;
        }
        form table input[type="text"]:focus {
            outline: none;
            border-bottom-color: #ffc107;
        }
        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: #ffc107;
            color: #333;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form table input[type="submit"]:hover {
            background-color: #ff9800;
        }
    </style>
</head>
<body>
    <h1>Halaman Edit Album</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="update_album.php" method="post">
        <?php
            include "koneksi.php";
            $albumid=$_GET['albumid'];
            $sql=mysqli_query($conn,"select * from album where albumid='$albumid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" value="<?=$data['namaalbum']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
</body>
</html>
