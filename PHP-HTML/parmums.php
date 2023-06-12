<?php
$page="parmums";
require "header.php";

if(isset($_SESSION['username'])){
    ?>
   <section>

<h3>Par mums lapa</h3>

<div>

<h4>"Uzņēmuma nosaukums"</h4>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi ullam exercitationem esse quisquam, deserunt, nihil doloremque placeat minus neque mollitia nemo dolorem sapiente reprehenderit deleniti porro sequi assumenda necessitatibus voluptas!</p>

</div>

</section>
    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
