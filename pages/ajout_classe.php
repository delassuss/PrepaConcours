<?php
	$MessageErreur = "";
	$MessageValider = "";
	
	if (isset($_POST['CreeClasse']))
	{
		// Inc
		include('../Formulaires/ParametresBase.php');
		$libelle = $_POST['libelle'];
		$idclasse = $_POST['idclasse'];
		
		try
		{
		$bdd = new PDO("mysql:host=$Serveur;dbname=$Base","$User","$MDPUser");
		
		$req = $bdd->prepare("INSERT INTO classe(Libelle, IDClasse) VALUES(:libelle,:idclasse)");
		$req->bindParam(':libelle',$libelle);
		$req->bindParam(':idclasse',$idclasse);
		$req->execute();
		$MessageValider = "La classe &agrave; bien &eacute;t&eacute; ajout&eacute;e !";
		}catch(Exception $e)
		{
				$MessageValider = $e->getMessage();
		}
	  	
	}                                                 
	echo '<head>
		<title>Ajout d\'une classe - Prepa concours IFSI</title>
		<link href="Styles/Style_Gestion.css" media="screen" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
	
		<div class="Intro">
			Veuillez entrer les informations de la classe :
			
			</br>';
			
			echo' <div class="MessageErreur">'; echo $MessageErreur; echo'</div>
			<div class="MessageValider">'; echo $MessageValider;  echo'</div>
			</br>
		</div>
		
		<div class="Creation">
			<form method="POST" action="pages/ajout_classe.php">
				<div class="Question">
					<label for="CreerClasse" accesskey="m">ID : </label>
					<input type="text" id="idclasse" name="idclasse" maxlength="35" size="15" value=""  title="Entrer l\'identifiant de la classe - ex : ABTSSIO1"/>
					</br>
					</br>
					<label for="CreerClasse" accesskey="m">Libell&eacute; : </label>
					<input type="text" id="libelle" name="libelle" maxlength="35" size="15" value=""  title="Entrer le libell&eacute; de la classe - ex : BTS_SIO_1"/>
					<br>
				
					<p><input type="submit" id="CreeClasse" name="CreeClasse" title="Cliquez ici pour Cr&eacute;er une classe" value="CR&Eacute;ER" onclick="alert(\'La classe &agrave; &eacute;t&eacute; ajout&eacute;\');" /></p>
				</div>
			</form>
		</div>
	</body>';
?>