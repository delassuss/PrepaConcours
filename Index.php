<?php
	
	$erreur = ' ';
	// on teste si le visiteur a soumis le formulaire de connexion
	if (isset($_POST['Connexion']) && $_POST['Connexion'] == 'CONNEXION')
	{
		if ((isset($_POST['Login']) && !empty($_POST['Login'])) && (isset($_POST['Mdp']) && !empty($_POST['Mdp']))) 
		{
			$connect = mysql_connect ('localhost', 'root', 'root');
			mysql_select_db ('prepaconcours', $connect);
			
			// on teste si une entrée de la base contient ce couple login / pass
			$sql = 'SELECT Nom, IDClasse FROM Eleve WHERE Identifiant="'.mysql_real_escape_string($_POST['Login']).'" AND Mdp="'.mysql_real_escape_string(md5($_POST['Mdp'])).'"
			UNION SELECT Nom, "prof" FROM professeur WHERE Identifiant="'.mysql_real_escape_string($_POST['Login']).'" AND Mdp="'.mysql_real_escape_string(md5($_POST['Mdp'])).'"';
			$req = mysql_query($sql);
				
			// si on obtient une réponse, alors cet utilisateur est un membre
			if (mysql_fetch_array($req)[1] =='prof')
			{				
				if (mysql_num_rows($req) == 1)
				{
					session_start();
					$_SESSION['Login'] = $_POST['Login'];
					header('Location: IndexProf.php');
					exit();
				}
				
				// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
				else if (mysql_num_rows($req) == 0)
				{	
					$erreur = 'Identifiant ou mot de passe invalide.';
				}
				// sinon, alors la, il y a un gros problème :)
				else
					{
						$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
					}
			}
			else 
			{				
				if (mysql_num_rows($req) == 1)
				{
					session_start();
					$_SESSION['Login'] = $_POST['Login'];
					header('Location: IndexEleve.php');
					exit();
				}
				
				// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
				else if (mysql_num_rows($req) == 0)
				{
					$erreur = 'Identifiant ou mot de passe invalide.';
				}
				// sinon, alors la, il y a un gros problème :)
				else
				{
					$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
				}
			}
		}
		else 
		{
			$erreur = 'Au moins un des champs est vide.';
		}
		/* mysql_close(); */
	}
?>
<html>
	<head>
		<title>Connexion - QCM Prepa concours IFSI</title>	
		<link href="Styles/Style.css" media="screen" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->
	</head>
		
	<body>
		<div class="Titre">PREPA CONCOURS IFSI</br>CONNEXION</div>
		
		<div class="DivConnexion">
		<div id="locale" ></div>
        
			<script type="text/javascript">
				function afficher() 
				{
					var offsetUTC = +12,
					lD = new Date(),
					oD = new Date();
					oD.setHours(lD.getUTCHours()+offsetUTC);
					document.getElementById('locale').innerHTML = "Nous sommes le : "+lD.toLocaleString();
				}
				window.onload=function()
				{
					afficher();
					setInterval(afficher,1000);
				}
        </script>
			</div>
			
		
		<div class="Intro">
			Entrez votre identifiant et mot de passe pour vous connecter a votre session
		</div>
		<div class="DivConnexion">
			<form id="Index.php" action="" method="post">
			
				<div class="Erreur"><?php echo $erreur; ?></div>
				<p>
					<label for="txtLogin" accesskey="n">Identifiant : </label>
					<input type="text" id="Login" name="Login" maxlength="20" size="15" value="" title="Entrez votre identifiant" />
				</p>
				<p>
					<label for="txtMdp" accesskey="m">Mot de passe : </label>
					<input type="password" id="Mdp" name="Mdp" maxlength="8" size="15" value=""  title="Entrez votre mot de passe"/>
				</p>
				<p>
					<input type="submit" id="Connexion" name = "Connexion" style="outset" title="Cliquez ici pour vous connecter au site" value="CONNEXION" />
				</p>
			</form>
		</div>
	</body>
</html>