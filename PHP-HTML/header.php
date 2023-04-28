<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="shortcut icon" href="../Atteli/icon.png" type="image/x-icon">
        <title>Kokapstrādes uzņēmums</title>
    </head>
    <body>
        <section>
        <header>
        <nav class="navbar">
            <a href="index.php" class="<?php echo ($page == "sakums" ? "active" : ""); ?>"><img src="../Atteli/logo.png" alt="Logo"></a>
            <a href="index.php" class="<?php echo ($page == "sakums" ? "active" : ""); ?>"><i class="fas fa-home"></i> Sākumlapa</a>
            <a href="parmums.php" class="<?php echo ($page == "parmums" ? "active" : ""); ?>" >Par mums</a>
            <a href="produkcija.php" class="<?php echo ($page == "produkcija" ? "active" : ""); ?>">Produkcija</a> 
            <a href="kontakti.php" class="<?php echo ($page == "kontakti" ? "active" : ""); ?>"> Kontakti</a>
        <?php
        require ("connect_db.php"); 
     
     session_start();
        
        $Admins = $savienojums->query("SELECT * FROM lietotaji WHERE admins = true and lietotajvards = '".$_SESSION['username']."' ");
        if($Admins) 
            if($Admins->num_rows >0){
                 
               echo "<a href='admins.php' ><i class='fas fa-cog'></i> Admins</a>";
            }

            if($page == "admins"){
                echo "active";
            }else{
                echo "";
            }
        ?>
        </nav>
    <nav class="navbar">
        <a href="logout.php"><b><?php
        echo "User: ",$_SESSION['username'];
        ?>
        </b> <i class="fas fa-power-off"></i></a>
    </nav>
   
             </header>
        </section>