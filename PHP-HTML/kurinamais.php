<?php
$page="parmums";
require "header.php";


if(isset($_SESSION['username'])){
    ?>
   
    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
