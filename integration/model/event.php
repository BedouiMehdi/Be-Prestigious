<?php

class event{

private $id_event;
private $nom_event;

private $date_debut;
private $date_fin;

private $img_event;
function __construct($id_event, $nom_event, $date_debut,$date_fin,$img_event) {

     $this->id_event=$id_event;
     $this->nom_event=$nom_event;
    
     $this->date_debut=$date_debut;
     $this->date_fin=$date_fin;
     
     $this->img_event=$img_event;
}


function getid_event(){
    return $this->id_event;
}
function getnom_event(){
    return $this->nom_event;
}

function getdate_debut(){
    return $this->date_debut;
}
function getdate_fin(){
    return $this->date_fin;
}


function getimg_event(){
    return $this->img_event;
}




function setid_event($id_event){
    $this->id_event;
}
function setnom_event($nom_event){
    $this->nom_event;
}

function setdate_debut($date_debut){
    $this->date_debut=$date_debut;
}
function setdate_fin($date_fin){
    $this->date_fin=$date_fin;
}
function setid_prod($id_prod){
    $this->id_prod;
}
function setimg_event($img_event){
    $this->img_event;
}





}




?>