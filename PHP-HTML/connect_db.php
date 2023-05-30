<?php
    $servera_vards = "localhost";
    $lietotajvards = "root";
    $parole = "";
    $db_vards = "kokapstrade";

    $savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_vards);

    if(!$savienojums){
        die("Pieslēgties neizdevās: ".mysqli_connect_error());
    }else{
        # echo "Savienojums ar datubāzi ir veiksmīgi izveidots!";
    }
?>