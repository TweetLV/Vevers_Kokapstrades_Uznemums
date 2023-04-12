<?php
$page  = "sakums";
require "header.php";

if(isset($_SESSION['username'])){
?>
<div class="rinda">
  <a href="kokmateriali.php">
    <img src="../Atteli/sakums2.jpg" alt="Image 1">
  </a>
  <a href="zagmateriali.php">
    <img src="../Atteli/sakums3.jpg" alt="Image 2">
  </a>
  <a href="kurinamais.php">
    <img src="../Atteli/sakums1.jpg" alt="Image 3">
  </a>
</div>

<?php 
}else{
    
    header("Refresh:0; url=login.php");
}

include "footer.php";
?>