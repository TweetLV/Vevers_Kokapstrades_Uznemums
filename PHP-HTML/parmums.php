<?php
$page="parmums";
require "header.php";

session_start();
if(isset($_SESSION['username'])){
    ?>
   
    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
