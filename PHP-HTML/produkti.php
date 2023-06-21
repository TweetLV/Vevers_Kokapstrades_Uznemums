<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktu tabula</title>
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
                echo "<a href='logout.php'><span class='lietotajs'><i class='fas fa-user-tie'></i> ".$_SESSION['username']."</span></a>";
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
            <div class="head-info">Produktu saraksts: <form action="produktipievienot.php" method="post"><input type="submit" name="pievienot" value="Pievienot produktu" class="btn"></form></div><table><?php
                echo "<tr><th>Produktu_id</th><th>Nosaukums</th><th>Apraksts</th><th>Preces cena</th><th>Skaits</th></tr>";
            $produktiVaicajums = "SELECT * FROM produkti";
            $atlasaProduktus = mysqli_query($savienojums, $produktiVaicajums) or die("Nekorekts vaicājums!");
 
if (mysqli_num_rows( $atlasaProduktus) > 0) {
    while($row = mysqli_fetch_assoc( $atlasaProduktus)) {
        echo "<tr><td>" .$row["Produktu_id"]. "
        </td><td>" .$row["Nosaukums"] . " 
        </td><td>" .$row["Apraksts"]. "
        </td><td>" .$row["Preces_cena"]."
        </td><td>" .$row["skaits"]."
        </td><td><a href='produktirediget.php?Produktu_id=".$row['Produktu_id']." 'name='redigetprodukti''><span class='lietotajs'><i class='fas fa-edit'></i></a>
        <form action='produktidzest.php' method='POST'>
        <button type='submit' value='$row[Produktu_id] ' name='dzestprodukti' class='btn'>Dzēst</button>
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