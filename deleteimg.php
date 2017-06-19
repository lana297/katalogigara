<?php

$path = $_SESSION['slika'];
if(!unlink($path)) 
{
	echo "Greška";
}
else 
{
	echo "uspjeh";
}

?>