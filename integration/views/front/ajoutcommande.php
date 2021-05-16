<?php
include "C:/wamp64/www/webprojettest/allfolders/model/commande.php";
include "C:/wamp64/www/webprojettest/allfolders/controller/commandec.php";
//if(isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['adresse']) and isset($_POST['date']))
$commande1=new commande($_POST['id'],$_POST['nom'],$_POST['adresse'],$_POST['date']);
$commande1c= new commandec();
$commande1c->ajoutercommande($commande1);
header('Location: affichercomm.php');

	
     
                                                        
																				
?>


