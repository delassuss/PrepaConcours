<?php
	
	$Questions=array();
	// Connexion a la BDD
	$connect = mysql_connect ('localhost', 'root', 'root');
	mysql_select_db ('prepaconcours', $connect);
	
	if (isset($_POST['Commencer']))
	{
		
		for ($i = 1; $i <= $_POST['ListeTempQuestion']; $i++)
		{
			$sql = 'SELECT ID ,Libelle FROM texte ORDER BY rand() LIMIT 0,1';
			$req = mysql_query($sql);
			$temp = mysql_fetch_array($req)[1];
			$affiche = true;
			foreach ($Questions as $value)
			{
				if ($temp == $value)
				{
					$affiche = false;
				}
			}
			if ($affiche == true)
			{
				$Questions[] = $temp;
				// Afficher la question
				
			}
		}
	}
 

	echo '<head>
		<title>Effectuer un test - QCM Prepa concours IFSI</title>
		<link href="/PrepaConcours/Styles/StyleTest.css" media="screen" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
		
		<div class="Intro">
			Vous allez pouvoir commencer un test, s&eacute;lectionnez le type de QCM que vous voulez faire
		</div>
		
		<form method="POST" action="pages/Test_Personnaliser.php">
			<div class="Menu2">
				<label for="ListeTypeQuestion">Choisissez un type de test : </label>
				<select name="ListeTypeQuestion">
					<option value="1">Test al&eacute;atoire</option>
					<optgroup disabled="disabled" label="En fonction de mes acquis">
						<option value="2">Test pour valider mes acquis</option>
						<option value="3">Test pour am&eacute;liorer mes non-acquis</option>
					<optgroup disabled="disabled" label="En fonction de la difficult&eacute;">
						<option value="4">Test facile</option>
						<option value="5">Test moyen</option>
						<option value="6">Test difficile</option>
				</select>
				<br/>
				<br/>
				<label>S&eacute;lectionnez le temps disponible pour votre test :</label>
				<br/>
				<select name="ListeTempQuestion" multiple="multiple" style="height: 70pt">
					<option value="10">10 min</option>
					<option value="15">15 min</option>
					<option value="20">20 min</option>
					<option value="25">25 min</option>
					<option value="30">30 min</option>
					<option value="35">35 min</option>
					<option value="40">40 min</option>
					<option value="45">45 min</option>
					<option value="50">50 min</option>
					<option value="55">55 min</option>
					<option value="60">1 heure</option>
				</select>
				<br/>
				<br/>
				<input type="submit" id="Commencer" name="Commencer" value="COMMENCER LE QCM"/>
			</div>
		</form>		
	</body>';
?>