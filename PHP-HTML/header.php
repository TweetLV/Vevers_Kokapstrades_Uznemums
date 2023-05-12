<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../CSS/main.css">
        <link rel="shortcut icon" href="../Atteli/icon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Kokapstrādes uzņēmums</title>
    </head>
    <body>
        <section>
        <header>
        <nav class="navbar">
            <a href="index.php" class="<?php echo ($page == "sakums" ? "active" : ""); ?>"><img src="../Atteli/logo.png" alt="Logo"></a>
            <a href="index.php" class="<?php echo ($page == "sakums" ? "active" : ""); ?>"><i class="fas fa-home"></i> Sākumlapa</a>
            <a href="parmums.php" class="<?php echo ($page == "parmums" ? "active" : ""); ?>" ><i class="fa-solid fa-circle-info"></i> Par mums</a>
            <a href="produkcija.php" class="<?php echo ($page == "produkcija" ? "active" : ""); ?>"><i class="fa-solid fa-cart-shopping"></i> Produkcija</a> 
            <a href="kontakti.php" class="<?php echo ($page == "kontakti" ? "active" : ""); ?>"><i class="fa-solid fa-address-book"></i> Kontakti</a>
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