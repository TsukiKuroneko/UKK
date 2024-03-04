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
    <title>Halaman Edit Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1f1f1f;
            color: #fff;
            overflow: hidden;
        }
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(45deg, #333, #000, #111);
            background-size: 400% 400%;
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
        form table {
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        form table td {
            padding: 10px;
        }
        form table input[type="text"], form table input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        form table input[type="submit"] {
            padding: 8px 20px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #333;
            color: #fff;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #555;
            text-align: left;
        }
        th {
            background-color: #555;
        }
        tr:nth-child(even) {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <h1>Halaman Edit Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
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
