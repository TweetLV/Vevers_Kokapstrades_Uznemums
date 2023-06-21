<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkti</title>
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

<?php
                    require("connect_db.php");
                    if(isset($_POST['produktirediget'])){
                        $id_produktu = $_POST['Produktu_id'];
                        $Nosaukums_ievade = $_POST["Nosaukums"];
                        $Apraksts_ievade = $_POST["Apraksts"];
                        $PrecesCena_ievade = $_POST["Preces_cena"];
                        $skaits_ievade = $_POST["skaits"];

                            $parbaude = "SELECT * FROM produkti WHERE Produktu_id='$id_produktu'";
                            $parbaudes_rezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");

                            if(!empty($Nosaukums_ievade) && !empty($Apraksts_ievade) && !empty($PrecesCena_ievade) && !empty($skaits_ievade)){
                            $rediget_produkti_SQL = 
                            "UPDATE produkti SET 
                            `Produktu_id` = '$id_produktu',
                            `Nosaukums` = '$Nosaukums_ievade', 
                            `Apraksts` = '$Apraksts_ievade', 
                            `Preces_cena` = '$PrecesCena_ievade', 
                            `skaits` = '$skaits_ievade'
                            WHERE `Produktu_id` = '$id_produktu'";

                            if(mysqli_query($savienojums, $rediget_produkti_SQL)){
                            echo "<div class='pazinojums zals'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh:2; url=produkti.php");
                        }else{
                            echo "<div class='pazinojums sarkans'>Pievienošana nav izdevusies! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=produkti.php");
                        }

                    }else{
                        echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Ievades lauku problēmas!</div>";
                        header("Refresh:2; url=produkti.php");
                    }
                }else{
                    echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=produkti.php");
                }
                ?>