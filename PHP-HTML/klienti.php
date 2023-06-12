<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klientu tabula</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/style_main.css">
    <link rel="shortcut icon" href="atteli/mail.png" type="image/x-icon">
</head>
<body>
<header>
<nav class="navbar">
        <a href="lietotaji.php" class=><i class="fas fa-user"></i> Lietotāji</a>
        <a href="produtki.php" ><i class="fas fa-envelope"></i> Produkti</a>
        <a href="klienti.php" ><i class="fas fa-user"></i> Klienti</a>
        <a href="maksajumi.php"><i class="fas fa-car"></i> Maksājumi</a>
        <a href="sutijumi.php" ><i class="fas fa-user"></i> Sūtijumi</a>
        <a href="sutijumi_info.php"><i class="fas fa-car"></i> Sūtijumu info</a>
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
            <div class="head-info">Klientu saraksts: <form action="klientipievienot.php" method="post"><input type="submit" name="pievienot" value="Pievienot klientu" class="btn"></form></div><table><?php
                echo "<tr><th>Klienta id</th><th>Vārds</th><th>Uzvārds</th><th>Tālrunis</th><th>Adrese</th></tr>";
            $klientiVaicajums = "SELECT * FROM klienti";
            $atlasaKlientus = mysqli_query($savienojums, $klientiVaicajums) or die("Nekorekts vaicājums!");

if (mysqli_num_rows($atlasaKlientus) > 0) {
    while($row = mysqli_fetch_assoc($atlasaKlientus)) {
        echo "<tr><td>" .$row["Klients_id"]. "
        <td>" .$row["Vards"]. "
        </td><td>" .$row["Uzvards"] . " 
        </td><td>" .$row["numurs"]. "
        </td><td>" .$row["Adrese"]."
        </td><td><a href='klientirediget.php?Klients_id=".$row['Klients_id']." 'name='redigetklienti''><span class='lietotajs'><i class='fas fa-edit'></i></a>
        <form action='klientidzest.php' method='POST'>
        <button type='submit' value='$row[Klients_id] ' name='dzestklienti' class='btn'>Dzēst</button>
        </form>";
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