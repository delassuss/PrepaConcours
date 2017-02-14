<?php
	
	$MessageErreur = "";
	$MessageValider = "";
	
	if (isset($_POST['Creer']))
	{
		// Inc
	    include('../Formulaires/ParametresBase.php');
		//$admin = $_POST['admin'];
		$identifiant = $_POST['identifiant'];
		$mdp = md5($_POST['mdp']);
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		
		if($_POST['admin']=="1")
		{
			$admin=true;
		}	else
		{
			$admin=false;
		}			
		$bdd = new PDO("mysql:host=$Serveur;dbname=$Base","$User","$MDPUser");
		
		$req= $bdd->prepare("INSERT INTO professeur(Admin, Identifiant, Mdp, Nom, Prenom) VALUES(:adminis, :identifiant, :mdp, :nom, :prenom)");
		
		$admin = true;
		
		$req->bindParam(':identifiant',$identifiant);
		$req->bindParam(':mdp',$mdp);
		$req->bindParam(':nom',$nom);
		$req->bindParam(':prenom',$prenom);
		$req->bindParam(':adminis',$admin,PDO::PARAM_BOOL);
		$req->execute();
		
		$MessageValider = "Le professeur &agrave; bien &eacute;t&eacute; ajout&eacute; !";
	}
        
echo	'<head>
		<title>Ajout d\'un professeur - Prepa concours IFSI</title>
		<link href="Styles/Style_Gestion.css" media="screen" rel="stylesheet" type="text/css"/>
	</head>
             	
        	     
	    
				<div class="Intro">
			Veuillez entrer les informations du professeur :
			</br>
			</br>';
			echo' <div class="MessageErreur">'; echo $MessageErreur; echo'</div>
			<div class="MessageValider">'; echo $MessageValider; echo '</div>
			</br>
		</div>
		
		<div class="Creation">
			<form method="POST" action="pages/ajout_professeur.php">
				<div class="Question">
					<label for="Creer" accesskey="m">Pr&eacute;nom :</label>
					<input type="text" id="prenom" name="prenom" maxlength="35" size="15" value=""  title="Entrer le pr&eacute;nom de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>
					<label for="Creer" accesskey="m">Nom :</label>
					<input type="text" id="nom" name="nom" maxlength="35" size="15" value=""  title="Entrer le nom de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>
					<label for="Creer" accesskey="m">Identifiant :</label>
					<input type="text" id="identifiant" name="identifiant" maxlength="35" size="15" value=""  title="Entrer l\'identifiant de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>
					<label for="Creer" accesskey="m">Mot de passe :</label>
					<input type="text" id="mdp" name="mdp" maxlength="35" size="15" value=""  title="Entrer le mot de passe de l\'&eacute;l&egrave;ve"/>
					</br>
					</br>
					<label for="Creer" accesskey="m">Admin ?</label>
					<input type="radio" id="admin" name="admin" value="1" checked="checked" /> Oui
					<input type="radio" id="admin" name="admin" value="0" /> Non</br>
					
					<p><input type="submit" id="Creer" name ="Creer" title="Cliquez ici pour Cr&eacute;er un professeur" value="CR&Eacute;ER" onclick="alert(\'Le professeur &agrave; &eacute;t&eacute; ajout&eacute;\');" /></p>
				</div>
			</form>
		</div>';
?>