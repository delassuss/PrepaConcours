<?php
// Deconnexion
// On active les sessions :
	session_start();
 
// On detruit les sessions :
	unset($_SESSION['Login']);
 
// On redirige le visiteur vers la page désirée :
	header('Location: /PrepaConcours/Index.php');
	exit();
?>