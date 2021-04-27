<?PHP
include "C:/wamp64/www/allfolders/controller/commandec.php";
$commande1c=new commandec();
if (isset($_POST["id"])){
	$commande1c->supprimercommande($_POST["id"]);
	header('Location: affichercomm.php');
}

?>