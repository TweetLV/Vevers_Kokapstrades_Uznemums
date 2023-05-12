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
   <div class="container-fluid mt-50">
                                
                              
                                <div class="row">
  
                                  <div class="col-md-4">
  
                                    <div class="product-card mb-30">
              <div class="product-badge bg-secondary border-default text-body">Out of stock</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/nXgI5iT.png" alt="Product"></a>
              <div class="product-card-body">
                <h3 class="product-title"><a href="#" data-abc="true">Microsoft Surface Pro 4</a></h3>
                <h4 class="product-price">$ 2020</h4>
              </div>
            </div>
                                    
                                  </div> 
                                   <div class="col-md-4">
                                    <div class="product-card mb-30">
              <div class="product-badge bg-success border-default text-body">10% OFF</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/ILEU18M.jpg" alt="Product"></a>
              <div class="product-card-body"> 
                <h3 class="product-title"><a href="#" data-abc="true">Dell Inspiration 4</a></h3>
                <h4 class="product-price">$ 1230</h4>
              </div>
            </div>          
                                  </div>
                                   <div class="col-md-4">
                                    <div class="product-card mb-30">
              <div class="product-badge bg-secondary border-default text-body">Out of stock</div><a class="product-thumb" href="#" data-abc="true"><img src="https://i.imgur.com/2kePJmX.jpg" alt="Product"></a>
              <div class="product-card-body">
                <h3 class="product-title"><a href="#" data-abc="true">Dell Xtreame 5</a></h3>
                <h4 class="product-price">$ 759</h4>
              </div>
            </div>                     
                                  </div>
                                </div>

    <?php 
    }else{
        
        header("Refresh:0; url=login.php");
    }
    
    include "footer.php";
    ?>
