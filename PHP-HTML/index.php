<?php
$page  = "sakums";
require "header.php";

session_start();

if(isset($_SESSION['username'])){
?>
<section id="adminSakums">
    <div class="kopsavilkums">
        <div class="informacija">
            
</div>   
</section>
<?php 
}else{
    
    header("Refresh:0; url=login.php");
}

include "footer.php";
?>