<?php
	// Inc
	include('Formulaires/Verification.php');
?>
<html>
	<head>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<title>&Eacute;l&egrave;ve - QCM Prepa concours IFSI</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="Styles/StyleMenu_Eleve.css" media="screen" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->
	</head>
	
	<body>
		<div class="Titre">PREPA CONCOURS IFSI</br>MENU PRINCIPAL</div>
		<div class="BandeauSup">
			<div class="bar" id="loading" alt="loading">
				<div class="percentage has-tip" data-perc="50%" style="width: 50%">
					<script>
						(function()
						{
							var $bar, perc, start, update;
							$bar = $('.percentage');
							perc = 0;
							update = function()
							{
								$bar.css("width", perc + '%');
								$bar.attr("perc", Math.floor(perc) + '%');
								perc += 0.2;
								if (Math.floor(perc) === 5)
								{
									$bar.addClass('active');
								}
								if (Math.floor(perc) === 95)
								{
									$bar.removeClass('active');
								}
								if (perc >= 100)
								{
									return perc = 0;
								}
							};
							start = function()
							{
								var run;
								return run = setInterval(update, 10);
							};
							start();
						}).call(this);
					</script>
				</div>
			</div>
			
			<ul id="menu">
				<li class="violet"><a href="#">Entrainement</a>
					<ul>
						<li><a href="#page9.php">Effectuer un test avec des parapètres personalisés</a></li>
						<li><a href="#page10.php" onclick="return false">Effectuer un test en conditions d'examens</a></li>
					</ul>
				</li><!--
				--><li class="bleu"><a href="#">Mon profil</a>
					<ul>
						<li><a href="#page11.php" onclick="return false">Ma progression</a></li>
						<li><a href="#page12.php" onclick="return false">Cours</a></li>
					</ul>
				</li>
			</ul>
			
			<div class="Deconnexion">
				<a href="Formulaires/Deconnexion.php" ID="deconnexion" name="deconnexion" title="Cliquez ici pour vous d&eacute;connecter du site"><img width="290" height="55" src="/PrepaConcours/Images/BTdeconnexion.png"></a></br>
				<div id="locale"></div>
 
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
		</div>
		
		<div class="clear"></div>
		
		<div id="pageContent">
			<img src="Images/Infirmiere.png"  width="400px" height="200px">
			<div class="bonjour">
				<font size="5" color="black">Bienvenue !</font></br>
				Bienvenue à vous. Vous avez pour projet de passer l'examen I.F.S.I et vous souhaitez vous entrainer ?</br>
				Cette application web appartenant à l'ensemble St Luc de Cambrai est faite pour vous.</br>
				Cet outil simple permet de s'entrainer en fonction du temps que vous avez avec votre</br>
				professeur et en fonction de vos compétences, mais aussi de simuler un examen ou</br>
				tout simplement de revoir vos cours.</br>
				</br>
				Bonne navigation et bonne chance !
			</div>
		</div>

		<div class="clear"></div>
	</body>
</html>