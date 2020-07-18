<?php

// with config files into config folder you have only to include the config file (init.php) .

include_once 'Loader.php';	
?>


<?php


$Templete = new Templete('Home.php');
$Templete->title="OFA";

echo $Templete;

?>