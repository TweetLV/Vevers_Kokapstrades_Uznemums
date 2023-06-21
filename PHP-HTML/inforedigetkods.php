<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sutijumu Info</title>
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
                    if(isset($_POST['inforediget'])){
                        $Sutijumu_info_id = $_POST['Sutijumu_info_id'];
                        $skaits_ievade = $_POST["Skaits"];
                        $PrecesCena_ievade = $_POST["Preces_cena"];
                        $ProduktaId_ievade = $_POST["id_produkti"];

                            $parbaude = "SELECT * FROM Sutijumu_info WHERE Sutijumu_info_id='$Sutijumu_info_id'";
                            $parbaudes_rezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");

                            if(!empty($Sutijumu_info_id) && !empty($skaits_ievade) && !empty($PrecesCena_ievade) && !empty($ProduktaId_ievade)){
                            $rediget_info_SQL = 
                            "UPDATE Sutijumu_info SET 
                            `Sutijumu_info_id` = '$Sutijumu_info_id',
                            `Skaits` = '$skaits_ievade', 
                            `Preces_cena` = '$PrecesCena_ievade', 
                            `id_produkti` = '$ProduktaId_ievade'
                            WHERE `Sutijumu_info_id` = '$Sutijumu_info_id'";

                            if(mysqli_query($savienojums, $rediget_info_SQL)){
                            echo "<div class='pazinojums zals'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh:2; url=info.php");
                        }else{
                            echo "<div class='pazinojums sarkans'>Pievienošana nav izdevusies! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=info.php");
                        }

                    }else{
                        echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Ievades lauku problēmas!</div>";
                        header("Refresh:2; url=info.php");
                    }
                }else{
                    echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=info.php");
                }
                ?>