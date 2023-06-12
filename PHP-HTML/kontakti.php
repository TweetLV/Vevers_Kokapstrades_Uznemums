<?php
$page="parmums";
require "header.php";


if(isset($_SESSION['username'])){
    ?>
    <link rel="stylesheet" href="../CSS/main.css" media="screen">
    <div class="kontakti">
   <div class="header">Darba laiks:</div>

<div class="section">
  <h2>Pārdošanas daļas vadītājs</h2>
  <p>Tālrunis: </p>
</div>

<div class="section">
  <h2>SIA "Uzņēmuma nosaukums"</h2>
  <p>Reģ.Nr.</p>
  <p>PVN.reģ. Nr.</p>
  <p>Uzņēmuma Adrese</p>
  <p>Maksājuma banka</p>
  <p>SWIFT kods: </p>
  <p>Konta Nr. </p>
  <p>Tālrunis: (+371) , (+371) </p>
  <p>e-pasts: </p>
</div>

<div class="section">
  <h2>Ražotne</h2>
  <p>Ražotnes adrese:</p>
</div>
    </div>
    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
