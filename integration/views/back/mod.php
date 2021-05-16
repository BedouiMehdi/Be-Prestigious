<?php
include "C:/wamp64/www/webprojettest/allfolders/controller/eventC.php";
include "C:/wamp64/www/webprojettest/allfolders/model/event.php";

$event1C=new eventC();

if (isset($_POST['modifier1'])){
    $event=new event($_POST['id_event'],$_POST['nom_event'],$_POST['date_debut'],$_POST['date_fin'],$_POST['img_event']);
    $event1C->modifierevent($event);
    header('Location: listeEvent.php');
    }
?>