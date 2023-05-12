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
// Define a function to display a list of items with images and titles
function display_item_list($items, $image_path) {
    echo "<ul class='item-list'>";
    $i = 0;
    foreach ($items as $item) {
        if ($i < 3) {
            // Display the first 3 items in one line
            echo "<li class='item item-left'>";
        } else {
            // Display the remaining 2 items in the next line
            echo "<li class='item item-right'>";
        }
        echo "<img src='" . $image_path . $item["image"] . "' alt='" . $item["title"] . "' />";
        echo "<div class='item-title'>" . $item["title"] . "</div>";
        echo "</li>";
        $i++;
    }
    echo "</ul>";
}

// Define an array of items with titles and images
$items = array(
    array("image" => "sakums1.jpg", "title" => "Item 1"),
    array("image" => "sakums1.jpg", "title" => "Item 2"),
    array("image" => "sakums1.jpg", "title" => "Item 3"),
    array("image" => "sakums1.jpg", "title" => "Item 4"),
    array("image" => "sakums1.jpg", "title" => "Item 5")
);

// Display the items with images from a specific path
$image_path = "../Atteli/";
display_item_list($items, $image_path);
?>

    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
