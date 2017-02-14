<?php
    $MessageErreur = "";
	$MessageValider = "";
	
	if (isset($_POST['Creer']))
	{
		// Inc
	    include('../Formulaires/ParametresBase.php');
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$identifiant = $_POST['identifiant'];
		$mdp = md5($_POST['mdp']);
		$idclasse = $_POST['idclasse'];
		
		try
		{
		$bdd = new PDO("mysql:host=$Serveur;dbname=$Base","$User","$MDPUser");
		
		$req= $bdd->prepare("INSERT INTO eleve(Nom, Prenom, Identifiant, Mdp, IDClasse) VALUES(:nom, :prenom, :identifiant, :mdp, :idclasse)");
		$req->bindParam(':nom',$nom);
		$req->bindParam(':prenom',$prenom);
		$req->bindParam(':identifiant',$identifiant);
		$req->bindParam(':mdp',$mdp);
		$req->bindParam(':idclasse',$idclasse);
		$req->execute();
		$MessageValider = "L'eleve &agrave; bien &eacute;t&eacute; ajout&eacute;e !";
		}catch(Exception $e)
		{
				$MessageValider = $e->getMessage();
		}
	}

	echo '<head> 
		<title>Ajout d\'un eleve - Prepa concours IFSI</title>
		<link href="Styles/Style_Gestion.css" media="screen" rel="stylesheet" type="text/css"/>
	</head>	
	
		<div class="Intro">
			Veuillez entrer les informations de l\'&eacute;l&egrave;ve :
			</br>
			</br>';
			echo' <div class="MessageErreur">';  echo $MessageErreur;  echo'</div>
			<div class="MessageValider">';  echo $MessageValider;  echo'</div>
			</br>
		</div>
		
		<div class="Creation">
			<form method="POST" action="pages/ajout_eleve.php">
				<div class="Question">
					<label for="CreerEleve" accesskey="m">Pr&eacute;nom :</label>
					<input type="text" id="prenom" name="prenom" maxlength="35" size="15" value=""  title="Entrer le pr&eacute;nom de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>				
					<label for="CreerEleve" accesskey="m">Nom :</label>
					<input type="text" id="nom" name="nom" maxlength="35" size="15" value=""  title="Entrer le nom de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>				
					<label for="CreerEleve" accesskey="m">ID de la classe :</label>
					<input type="text" id="idclasse" name="idclasse" maxlength="35" size="15" value=""  title="Entrer l\'identifiant de la classe de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>				
					<label for="CreerEleve" accesskey="m">Identifiant :</label>
					<input type="text" id="identifiant" name="identifiant" maxlength="35" size="15" value=""  title="Entrer l\'identifiant de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>
					<label for="CreerEleve" accesskey="m">Mot de passe :</label>
					<input type="text" id="mdp" name="mdp" maxlength="35" size="15" value=""  title="Entrer le mot de passe de l\'&eacute;l&egrave;ve"/>
					<br>
					
					<p><input type="submit" id="Creer" name ="Creer" title="Cliquez ici pour Cr&eacute;er une classe" value="CR&Eacute;ER" onclick="alert(\'L\'&eacute;l&egrave;ve &agrave; &eacute;t&eacute; ajout&eacute;\');" /></p>
				</div>
			</form>
		</div>';
	?>
