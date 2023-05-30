<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
<link rel="stylesheet" href="../CSS/nicepage.css" media="screen">
    <link rel="stylesheet" href="../CSS/Sakums.css" media="screen">
</head>
<?php
$page  = "sakums";
require "header.php";

if(isset($_SESSION['username'])){
?>
<body>
 <section class="u-clearfix u-grey-10 u-section-1" id="sec-811d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-align-center u-text u-text-custom-color-4 u-text-default u-text-1"> SIA "Uzņē​muma nosaukums"</h2>
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <h3 class="u-text u-text-custom-color-3 u-text-2">Kokmateriāli</h3>
                <a href="kokmateriali.php"><img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="2000" data-image-height="1333" src="../Atteli/sakums3.jpg " ></a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <h3 class="u-text u-text-custom-color-3 u-text-3">Zāģmateriali</h3>
                <a href="zagmateriali.php"><img alt="" class="u-expanded-width u-image u-image-default u-image-2" data-image-width="2000" data-image-height="1333" src="../Atteli/sakums2.jpg"></a>
              </div>
            </div>
            <div class="u-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <h3 class="u-text u-text-custom-color-3 u-text-4">Kurināmais</h3>
                <a href="kurinamais.php"><img alt="" class="u-expanded-width u-image u-image-default u-image-3" data-image-width="2000" data-image-height="1333" src="../Atteli/sakums1.jpg"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
<?php 
}else{
    
}

include "footer.php";
?>
</html>