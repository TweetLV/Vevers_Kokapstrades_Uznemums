<?php
$page  = "sakums";
require "header.php";

if(isset($_SESSION['username'])){
?>
<section>
<div class="nosaukums">
  <h1>SIA "Uzņemuma nosaukums"<h1>
</div>
<div class="rinda">
 <a href="kokmateriali.php"> <img class="bilde" src="../Atteli/sakums2.jpg"></a>
 <a href="zagmateriali.php"> <img class="bilde" src="../Atteli/sakums3.jpg"></a>
 <a href="kurinamais.php"> <img class="bilde" src="../Atteli/sakums1.jpg"></a>
</div>
</section>
<?php 
}else{
    header("Refresh:0; url=login.php");
}

include "footer.php";
?>