<?php
echo '<a href="NomFichier.php" onclick="return false">Acc&eacute;der au profil d\'une classe</a>';
echo '<select name="ListeClasse">';
					
						$connect = mysql_connect ('localhost', 'root', 'root');
						mysql_select_db ('prepaconcours', $connect);
					
						$sql='SELECT IDClasse, Libelle FROM classe';
						$list = mysql_query($sql);
						while ($data = mysql_fetch_array($list))
						{
							echo'<option value='.'>'.$data['IDClasse'].' -> '.$data['Libelle'].'</option>';
						}
						 /*< div align="center">
  <p>Résultat du sondage : </p>
<?php
$serveur     = "db418074366.db.1and1.com";
$utilisateur = "dbo418074366";
$motDePasse  = "serveftp.net";
$base        = "db418074366";
$db_link = mysql_connect($serveur, $utilisateur, $motDePasse)  or exit('Could not connect: ' . mysql_error());
$db = mysql_select_db($base, $db_link)  or exit('Could not select database: ' . mysql_error());
$rows = mysql_query('SELECT COUNT(*) FROM sondage');
$dbrows = 0;
while ($row = mysql_fetch_array($rows))
$query = 'SELECT COUNT(*) FROM sondage';
$result = mysql_query($query);
$nombre = mysql_fetch_array($result);
echo $nombre[0];
echo ' personnes ont votées depuis le 07 Août 2012.<br />';
?>
    Fin du sondage le 31 Août 2012
  </p>
<table width="738" border="1" align="center">
    <tr>
      <td width="172" height="23"><strong>FAI </strong></td>
      <td width="150"><strong>Satisfait ? </strong></td>
      <td width="128"><strong>Prêt à changer ? </strong></td>
      <td width="260"><b>Date</b></td>
    </tr>
    <?php
function reponse($texte) {
    switch ($texte) {
       case "Oui"  : return "Oui"; break;
       case "Non": return "Non"; break;
       case "Oui_1": return "Oui_1"; break;
       case "Non_1": return "Non_1"; break;

    } 
}
$requete = mysql_query("SELECT * FROM sondage");
while ($ligne = mysql_fetch_array($requete)) {
   print "<tr>
   <td>".$ligne["fai"]."</td>
   <td>".reponse($ligne["resultat"])."</td>
   <td>".$ligne["changer"]."</td>
   <td>".$ligne["date"]."</td>
   </tr>";  
}
?>
</table> */
					?>
					