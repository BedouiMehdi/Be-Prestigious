

<?php
include "C:/wamp64/www/webprojettest/allfolders/controller/eventC.php";
include "C:/wamp64/www/webprojettest/allfolders/model/event.php";

if (!empty($_POST['id_event']) and 
    !empty($_POST['nom_event']) and 
    !empty($_POST['date_debut']) and 
    !empty($_POST['date_fin']) and
    !empty($_POST['img_event'])) 
{ 
     
$event1=new event($_POST['id_event'],$_POST['nom_event'],$_POST['date_debut'],$_POST['date_fin'],$_POST['img_event']);
    

    
$event1C=new eventC();

$event1C->ajouterevent($event1);
header('Location: listeEvent.php');
}
else echo("Verifier les Champs! ");




?>

