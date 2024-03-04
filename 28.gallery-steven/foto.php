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
    <title>Halaman Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #000;
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
        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 1;
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
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: left;
        }
        th {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: normal;
        }
        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: auto;
        }
        .button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #ffc107;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ff9800;
        }
        .button-delete {
            background-color: #f44336;
        }
        .button-edit {
            background-color: #4caf50;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <div class="container">
        <h1>Halaman Foto</h1>
        <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
        
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsifoto"></td>
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
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                            while($data=mysqli_fetch_array($sql)){
                        ?>
                                <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                        <?php
                            }
                        ?>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>

        <table border="1" cellpadding=5 cellspacing=0>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Unggah</th>
                <th>Lokasi File</th>
                <th>Album</th>
                <th>Disukai</th>
                <th>Aksi</th>
            </tr>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['userid'];
                $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
                while($data=mysqli_fetch_array($sql)){
            ?>
                    <tr>
                        <td><?=$data['fotoid']?></td>
                        <td><?=$data['judulfoto']?></td>
                        <td><?=$data['deskripsifoto']?></td>
                        <td><?=$data['tanggalunggah']?></td>
                        <td>
                            <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                        </td>
                        <td><?=$data['namaalbum']?></td>
                        <td>
                            <?php
                                $fotoid=$data['fotoid'];
                                $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($sql2);
                            ?>
                        </td>
                        <td>
                            <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" class="button button-delete">Hapus</a>
                            <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>" class="button button-edit">Edit</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
    
</body>
</html>
