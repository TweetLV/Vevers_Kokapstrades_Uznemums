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
                <div class="head-info2">Rediģēt lietotaju</div>
                            <div class="row">
                                <form method='post' action='lietotajiredigetkods.php'>
                                    <input type="text" placeholder="Lietotajs ID *" name="lietotaji_id" class="box1"  required>
                                    <input type="text" placeholder="Lietotājvards *" name="lietotajvards" class="box1"  required>
                                    <input type="password" placeholder="Parole *" name="parole" class="box1" required>
                                    <input type="email" placeholder="emails *" name="emails" class="box1" required>
                                    <label for="admins">Administrators</label>
                                        <input type="checkbox" name="admins" id="admins">
                                        <label for="klients">Klients</label>
                                        <input type="checkbox" name="klients" id="klients">
                                    <input type="submit" name="lietotajirediget" value="Saglabāt!" class="btn">
                                </form>
                            </div>
                        </div>
    </section>
    
    <?php include ("footer.php");
    
    ?>