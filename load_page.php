<?php
$Mapage="";

if(!$_POST['page']) die("0");

$page = (int)$_POST['page'];

 switch ($page) {
	case 1:
		$Mapage="pages/progression.php";
		
		break;
    case 2:
        $Mapage= "pages/profil_classe.php";
		
		break;
    case 3:
        $Mapage= "pages/ajout_question.php";
		
		break;
	case 4:
        $Mapage= "pages/ajout_professeur.php";
		break;
    case 5:
        $Mapage= "pages/ajout_eleve.php";
		break;
    case 6:
        $Mapage= "pages/ajout_classe.php";
		break;
	case 7:
        $Mapage= "pages/exporter.php";
		break;
    case 8:
        $Mapage= "pages/importer.php";
		break;
    case 9:
        $Mapage= "pages/Test_Personnaliser.php";
		break;
	case 10:
        $Mapage= "pages/page/html";
		break;
	case 11:
        $Mapage= "pages/page/html";
		break;
	case 12:
        $Mapage= "pages/page/html";
		break;
	case 13:
        $Mapage= "pages/page/html";
		break;
} 
	$Content = file_get_contents($Mapage); 
	$Content = str_replace('<?php','',$Content);
	$Content = str_replace('?>','',$Content);
	$Content = "<?php ".$Content;
	$Content = "?> ".$Content; 
	eval($Content);


/*$Content = file_get_contents('pages/page_'.$page.'.php'); 
$Content = str_replace('<?php','',$Content); 
$Content = str_replace('?>','',$Content);
$Content = "<?php ".$Content;
$Content = "?> ".$Content; 
eval($Content);  */

?>
