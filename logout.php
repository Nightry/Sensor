<?php

session_start();				//wystartowanie nowej sesji

session_unset();				 //zwolnienie wszystkich zmiennych sesji
	
header('Location: index.php'); //przekierowanie przegladarki po wylogowaniu

?>

