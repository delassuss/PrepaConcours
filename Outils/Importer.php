<?php
	// Verification de connexion
	include("../Formulaires/Formulaires.php");
	include("../Formulaires/Verification.php");
	include("../Formulaires/ParametresBase.php");
	
	if (isset($_POST['Exporter']))
	{
		$tables=array(
				"type" => "ID,Libelle",
				"theme" => "ID,Libelle",
				"categorie" => "ID,Libelle,IDTheme",
				"sous_categorie" => "ID,Libelle,IDCategorie",
				"question" => "ID,Type,IDSousCategorie",
				"texte" => "ID,IDQuestion,Libelle",
				"image" => "ID,IDQuestion,Libelle",
				"reponses" => "ID,IDQuestion,Texte,Image,BonneReponse",
				"classe" => "IDClasse,Libelle",
				"professeur" => "IDProf,Nom,Prenom,Identifiant,Mdp,admin",
				"enseigne" => "IDProf,IDClasse",
				"eleve" => "IDEleve,Nom,Prenom,Identifiant,Mdp,IDClasse",
				"historique" => "ID,`Date/Heure`,IDQuestion,Resultat,IDEleve");
				
		foreach($tables as $table => $champs){
							
			$chemin = "Export_$table.csv";
			$delimiteur = ';';
			$row = 1;
			if (($handle = fopen($chemin, "r")) !== false) {
				while (($data = fgets($handle, 4096)) !== false) {
					$num = count($data);
					if ($num>0){
						
						$bdd = new PDO("mysql:host=$Serveur;dbname=$Base","$User","$MDPUser");
						$colonnes = explode(",",$champs);
						$NBColonnes = count($colonnes);
						$reponse = $bdd->query("INSERT INTO $table ($champs) VALUES (str_replace(\";\",\",\",$data))");
						
						
					}
					
				}
				fclose($handle);
			}
			
	 		/* 
			$colonnes = explode(",",$champs);
			$NBColonnes = count($colonnes);
			
			$reponse = $bdd->query("SELECT $champs FROM $table");
			echo "SELECT $champs FROM $table<br/>";
			while($donnees=$reponse->fetch()){
				$ligne=array();
				for($i=0;$i<$NBColonnes;$i++)
				{
					$ligne[] =$donnees[$i];
				}
				// chaque ligne en cours de lecture est insérée dans le fichier
				// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
				fputcsv($fichier_csv, $ligne, $delimiteur); 
			} */
		
		}


	}
	else
	{
?>
<html>
	<head>
		<title>Import des donn&Eacute;es - Prepa concours IFSI</title>
	</head>
		
		<link href="../Styles/StyleCreer.css" media="screen" rel="stylesheet" type="text/css"/>
	
	<body>
		
		<div class="Intro">
			Veuillez entrer les informations de l'&eacute;l&egrave;ve :</br></br></br>
		</div>
		
		<div class="Creation">
			<form method="POST" action="importer.php">
				
				<p><input type="submit" id="Exporter" name ="Exporter" title="Cliquez ici pour importer les données" value="Importer" /></p>
			</form>
		</div>
	</body>
<html>
<?php }?>