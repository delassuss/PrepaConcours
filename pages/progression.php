<?php
echo '<a href="NomFichier.php" onclick="return false">Progression des &eacute;l&egrave;ves</a>';
echo '<select name="ListeEleve">';
					
						$connect = mysql_connect ('localhost', 'root', 'root');
						mysql_select_db ('prepaconcours', $connect);
					
						$sql='SELECT Prenom, Nom, IDClasse FROM eleve';
						$list = mysql_query($sql);
						while ($data = mysql_fetch_array($list))
						{
							echo'<option value='.'>'.' '.$data['Nom'].' '.$data['Prenom'].' -> '.$data['IDClasse'].'</option>';
						}
	?>			