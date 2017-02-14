<?php
	//Verification de connexion
	// On active les sessions :
	session_start();
	
	//	Si le visiteur n'est pas connecté on le renvoie vers l'index:
	if (isset($_SESSION['Login']) == "")
	{
		header('Location: Index.php');
		$erreur ='Veuillez vous connecter pour accéder au site !';
	}
?>