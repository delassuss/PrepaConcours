<?php

session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/dark/config/connexion.php";
include $_SERVER["DOCUMENT_ROOT"] . "/dark/classes/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = addslashes($_POST['username']);
    $pwd = addslashes($_POST['pwd']);
    $mail = addslashes($_POST['mail']);

    if (!empty($username) || !empty($pwd) || !empty($mail)) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $user = new User($db, null, $username, $pwd, $username, $username, "", "", "", $mail, "", "", "", "1", $_SESSION['id_user'], "", "", "");
            $id_user_inserted = $user->AddUser();
            // $_SESSION['id_user'] = $id_user_inserted;
            // $_SESSION['nom_user'] = $user->getNomUser();
            header('Location: ../create_user.php');
        } else {
            //echo "tel";
			
$message='Veuillez remplir tous les champs';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        }
    }
}
?>