<?PHP
include "C:/wamp64/www/webprojettest/allfolders/controller/eventC.php";
$eventC=new eventC();
if (isset($_POST["id_event"])){
	$eventC->supprimerEvent($_POST["id_event"]);
	header('Location: listeEvent.php');
}

?>