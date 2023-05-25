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
function display_item_list($items, $image_path) {
    echo "<ul class='item-list'>"; 
    $i = 0;
    foreach ($items as $item) {
        if ($i % 4 == 0) {
            
            echo "<li class='item item-first'>";
        } else {
            echo "<li class='item'>";
        }
        echo "<img src='" . $image_path . $item["image"] . "' alt='" . $item["title"] . "' />";
        echo "<div class='item-title'>" . $item["title"] . "</div>";
        echo "</li>";
        $i++;
    }
    echo "</ul>";
}

$items = array(
    array("image" => "sakums1.jpg", "title" => "Item 1"),
    array("image" => "sakums1.jpg", "title" => "Item 2"),
    array("image" => "sakums1.jpg", "title" => "Item 3"),
    array("image" => "sakums1.jpg", "title" => "Item 4"),
    array("image" => "sakums1.jpg", "title" => "Item 5"),
    array("image" => "sakums1.jpg", "title" => "Item 6"),
    array("image" => "sakums1.jpg", "title" => "Item 7"),
    array("image" => "sakums1.jpg", "title" => "Item 8"),
    array("image" => "sakums1.jpg", "title" => "Item 9"),
    array("image" => "sakums1.jpg", "title" => "Item 10"),
    array("image" => "sakums1.jpg", "title" => "Item 11"),
    array("image" => "sakums1.jpg", "title" => "Item 12")
);
 
$image_path = "../Atteli/";
display_item_list($items, $image_path);
?> 

    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>     
