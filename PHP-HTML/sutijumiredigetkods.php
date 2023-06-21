<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sutijumu </title>
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
            if(isset($_SESSION['username'])){
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
        header("location:logout.php");
    }
    ?>
</header>
<?php
                    require("connect_db.php");
                    if(isset($_POST['sutijumirediget'])){
                        $Sutijumi_id = $_POST['Sutijumi_id'];
                        $datums_ievade = $_POST["Datums"];
                        $cena_ievade = $_POST["Cena"];
                        $KlientaID_ievade = $_POST["id_klients"];
                        $SutijumaInfoID_ievade = $_POST["info_id"];

                            $parbaude = "SELECT * FROM sutijumi WHERE Sutijumi_id='$Sutijumi_id'";
                            $parbaudes_rezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");

                            if(!empty($datums_ievade) && !empty($cena_ievade) && !empty($KlientaID_ievade) && !empty($SutijumaInfoID_ievade)){
                            $rediget_sutijumu_SQL = 
                            "UPDATE sutijumi SET 
                            `Sutijumi_id` = '$Sutijumi_id',
                            `Datums` = '$datums_ievade', 
                            `Cena` = '$cena_ievade', 
                            `id_klients` = '$KlientaID_ievade', 
                            `info_id` = '$SutijumaInfoID_ievade'
                            WHERE `Sutijumi_id` = '$Sutijumi_id'";

                            if(mysqli_query($savienojums, $rediget_sutijumu_SQL)){
                            echo "<div class='pazinojums zals'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh:2; url=sutijumi.php");
                        }else{
                            echo "<div class='pazinojums sarkans'>Pievienošana nav izdevusies! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=sutijumi.php");
                        }

                    }else{
                        echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Ievades lauku problēmas!</div>";
                        header("Refresh:2; url=sutijumi.php");
                    }
                }else{
                    echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=sutijumi.php");
                }
                ?>