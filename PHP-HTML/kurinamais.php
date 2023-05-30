<?php
$page="parmums";
require "header.php";


if(isset($_SESSION['username'])){
    ?>
     <section>
<div class="wrapper d-flex">
		<div class="sidebar">
			
			<ul>
				<li><a href="kokmateriali.php"><i class="fas fa-home"></i>Kokmateriāli</a></li>
				<li><a href="zagmateriali.php"><i class="fas fa-users"></i>Zāģmateriāli</a></li>
				<li><a href="kurinamais.php"><i class="fas fa-calendar-week"></i>Kurināmais</a></li>
			</ul>

	</div>
</div>
</section>

    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
