<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lietotaji</title>
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


<section class="adminSakums">
        <div class="row">
            <div class="info">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //savienojās ar datubāzi
                    require("connect_db.php");
                    if(isset($_POST['gatavs'])){
                        //datu ievade
                        $lietotajvards_ievade = $_POST['lietotajvards'];
                        $parole_ievade = $_POST['parole'];
                        $emails_ievade = $_POST['emails'];
                        $administrators_ievade = isset($_POST['admins']) ? 1 : 0;
                        $klients_ievade = isset($_POST['klients']) ? 1 : 0;
                        //pārbaude
                        $parbaude = "SELECT * FROM lietotaji WHERE lietotajvards='$lietotajvards_ievade'";
                        $parbaudes_rezultats = mysqli_query($savienojums, $parbaude) or die ("Nekorekts vaicājums!");
                        //pārbauda vai nav tukšas ailes kurām jābūt aizpildītām, ja ir kāda kļūda parāda paziņojumu un aizsūta uz tabulas lapu
                        if(!empty($lietotajvards_ievade) && !empty($parole_ievade) && !empty($emails_ievade)){
                            //Parolei tiek pievienota aizsardzība
                            $hashed_password = password_hash($parole_ievade, PASSWORD_DEFAULT);
                            //tiek pievienots lietotājs tabulā
                        $pievienot_lietotaji_SQL = "INSERT INTO lietotaji (lietotajvards, parole, emails, admins, klients)
                        VALUES ('$lietotajvards_ievade', '$hashed_password', '$emails_ievade', $administrators_ievade, $klients_ievade)";
                            // Tiek pārbaudīts vai lietotājs ir veiksmīgi pievienots un parāda paziņojumu vai ir izdevies, vai ir kļūda
                        if(mysqli_query($savienojums, $pievienot_lietotaji_SQL)){
                            echo "<div class='pazinojums zals'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh:2; url=lietotaji.php");
                        }else{
                            echo "<div class='pazinojums sarkans'>Pievienošana nav izdevusies! Kļūda sistēmā!</div>";
                            header("Refresh:2; url=lietotaji.php");
                        }

                    }else{
                        echo "<div class='pazinojums sarkans'>Reģistrācija nav izdevusies! Ievades lauku problēmas!</div>";
                        header("Refresh:2; url=lietotaji.php");
                    }

                }else{
                    ?>
                    <div class="head-info">Pievienot lietotājus</div>
                                <div class="row">
                                    <form method='post'>
                                        <input type="text" placeholder="Lietotājvards *" name="lietotajvards" class="box1"  required>
                                        <input type="password" placeholder="Parole *" name="parole" class="box1" required>
                                        <input type="email" placeholder="E-mails *" name="emails" class="box1" required>
                                        <label for="admins">Administrators</label>
                                        <input type="checkbox" name="admins" id="admins">
                                        <label for="klients">Klients</label>
                                        <input type="checkbox" name="klients" id="klients">
                                        <input type="submit" name="gatavs" value="Saglabāt!" class="btn">
                                    </form>
                                </div>
                            </div>
                            <?php 
                }
            }else{
                echo "<div class='pazinojums sarkans'>Kaut kas nogāja greizi! Atgriezies sākumlapā un mēģini vēlreiz!</div>";
                header("Refresh:2; url=lietotaji.php");
            }
        ?>
            </div>
        </div>
    </section>

</div>
    <?php include "footer.php"?>
</body>
