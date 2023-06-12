<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maksajumi</title>
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
                    if(isset($_POST['lietotajirediget'])){
                        $id_lietotaji = $_POST['lietotaji_id'];
                        $lietotajvards_ievade = $_POST["lietotajvards"];
                        $parole_ievade = $_POST["parole"];
                        //parolei tiek uzlikta aizsardzība
                        $hashed_password = password_hash($parole_ievade, PASSWORD_DEFAULT);
                        $emails_ievade = $_POST["emails"];
                        $admins_ievade = $_POST["admins"];
                        $admins_ievade = ($admins_ievade == 'true') ? 1 : 0;
                        $klients_ievade = $_POST["klients"];
                        $klients_ievade = ($klients_ievade == 'true') ? 1 : 0;

                            $parbaude = "SELECT * FROM lietotaji WHERE lietotaji_id='$id_lietotaji'";
                            $parbaudes_rezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");
                            //tiek veikta pārbaude, lai nebūtu tukši lauki.
                            if(!empty($lietotajvards_ievade) && !empty($parole_ievade) && !empty($emails_ievade)){
                            // tiek rediģēti faili
                            $rediget_lietotaji_SQL = 
                            "UPDATE lietotaji SET 
                            `lietotaji_id` = '$id_lietotaji',
                            `lietotajvards` = '$lietotajvards_ievade', 
                            `parole` = '$hashed_password', 
                            `emails` = '$emails_ievade', 
                            `admins` = '$admins_ievade', 
                            `klients` = '$klients_ievade' 
                            WHERE `lietotaji_id` = '$id_lietotaji'";
                            // Ja viss ir izdarīts pareizi parāda ziņojumu, kad ir izdevusies
                            if(mysqli_query($savienojums, $rediget_lietotaji_SQL)){
                            echo "<div class='pazinojums zals'>Rediģēšana ir noritējusi veiksmīgi!</div>";
                            header("Refresh:2; url=maksajumi.php");
                        }else{
                            echo "<div class='pazinojums sarkans'>Rediģēšana nav izdevusies! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=maksajumi.php");
                        }

                    }else{
                        echo "<div class='pazinojums sarkans'>Rediģēšana nav izdevusies! Ievades lauku problēmas!</div>";
                        header("Refresh:2; url=maksajumi.php");
                    }
                }else{
                    echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                    header("Refresh:2; url=maksajumi.php");
                }
                ?>