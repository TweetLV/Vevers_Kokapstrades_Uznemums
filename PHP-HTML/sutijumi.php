<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sūtijumu tabula</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/style_main.css">
    <link rel="shortcut icon" href="atteli/mail.png" type="image/x-icon">
</head>
<body>
<header>
<nav class="navbar">
        <a href="lietotaji.php" class=><i class="fas fa-user"></i> Lietotāji</a>
        <a href="produkti.php" ><i class="fas fa-envelope"></i> Produkti</a>
        <a href="klienti.php" ><i class="fas fa-user"></i> Klienti</a>
        <a href="maksajumi.php"><i class="fas fa-car"></i> Maksājumi</a>
        <a href="sutijumi.php" ><i class="fas fa-user"></i> Sūtijumi</a>
        <a href="info.php"><i class="fas fa-car"></i> Sūtijumu info</a>
    </nav>
    <nav class="navbar">
        <?php
            session_start();
            if((isset($_SESSION['username']))){
                echo "<a href='login.php'><span class='lietotajs'><i class='fas fa-user-tie'></i> ".$_SESSION['username']."</span></a>";
            }else{
                echo 'kļūda!';
            }
            ?>
    </nav>
    <?php
    if(isset($_SESSION['username'])){
    }else{
        echo "Nav pieejas!";
        header("location:login.php");
    }
    ?>
</header>
<section id="adminSakums">
    <div class="kopsavilkums">
    <div class="row">
        <div class="info">
        <?php require("connect_db.php")?>
            <div class="head-info">Sūtijumu saraksts:</div><table><?php
                echo "<tr><th>Sutijuma ID</th><th>Datums</th><th>Cena</th><th>Klienta ID</th><th>Info id</th></tr>";
            $sutijumiVaicajums = "SELECT * FROM sutijumi";
            $atlasaSutijumus = mysqli_query($savienojums, $sutijumiVaicajums) or die("Nekorekts vaicājums!");

if (mysqli_num_rows($atlasaSutijumus) > 0) {
    while($row = mysqli_fetch_assoc($atlasaSutijumus)) {
        echo "<tr><td>" .$row["Sutijumi_id"]. "
        <td>" .$row["Datums"]. "
        </td><td>" .$row["Cena"] . " 
        </td><td>" .$row["id_klients"]. "
        </td><td>" .$row["info_id"]."
        </td><td><a href='sutijumirediget.php?Sutijumi_id=".$row['Sutijumi_id']." 'name='redigetsutijumi''><span class='lietotajs'><i class='fas fa-edit'></i></a>";
    }
}
?>
</table>
            </div>
        </div>
</section>

<?php include "footer.php"?>
</body>
</html>