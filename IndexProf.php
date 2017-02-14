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
        <link href="Styles/StyleMenu_Prof.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
		<link rel="icon" type="image/x-icon" href="/PrepaConcours/Images/favicon.ico" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="/PrepaConcours/Images/favicon.ico" /><![endif]-->
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
				<li class="violet"><a href="#">Gestion des &eacute;l&egrave;ve</a>
					<ul>
						<li><a href="#page1.php">Progression des &eacute;l&egrave;ves</a></li>
						<li><a href="#page2.php">Acc&eacute;der au profil d'une classe</a>
							<ul>
									<?php
										$connect = mysql_connect ('localhost', 'root', 'root');
										mysql_select_db ('prepaconcours', $connect);				
										$sql='SELECT IDClasse, Libelle FROM classe';
										$list = mysql_query($sql);
										while ($data = mysql_fetch_array($list))
										{
											echo'<li><a>'.$data['IDClasse'].' -> '.$data['Libelle'].'</a></li>';
										}
									?>	
							</ul>
						</li>
					</ul>
				</li><!--
				--><li class="bleu"><a href="#">Administration du site</a>
					<ul>
						<li><a href="#page3.php">Ajouter une question</a></li>
						<li><a href="#page4.php">Ajouter un Professeur</a></li>
						<li><a href="#page5.php">Ajouter un &eacute;l&egrave;ve</a></li>
						<li><a href="#page6.php">Ajouter une classe</a></li>
					</ul>
				</li><!--
				--><li class="orange"><a href="#">Administration de la base de donn&eacute;e</a>
					<ul>
						<li><a href="#page7.php">Exporter la base</a></li>
						<li><a href="#page8.php">Importer la base</a></li>
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
		<img src="Images/Infirmiere.png"  width="35%" height="20%"/>
			<div class="bonjour">
				<font size="5" color="black">Bienvenue !</font></br>
				Bienvenue à vous. Vous etes ici sur l'espace enseignant du site d'entrainement à l'examen I.F.S.I.</br>
				Cette application web appartenant à l'ensemble St Luc de Cambrai est faite pour les eleves.</br>
				Cet outil simple permet d'entrainer les eleves en fonction du temps que vous avez avec eux</br>
				et en fonction de leurs compétences. Ici vous pouvez gerer les classes, éléves ainsi que</br>
				les questions qui leurs seront poser.</br>
				</br>
				Bonne navigation à vous !
			
			</div>
            <div class="clear"></div>
    </body>
</html>
