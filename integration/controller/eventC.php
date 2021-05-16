<?php
include "C:/wamp64/www/webprojettest/allfolders/config.php";

class eventC
{

    public function afficherEvent()
    {
        $sql = "SELECT * From evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	 public function recupererevent($id_event)
    {
        $sql = "SELECT * from evenement where id_event=$id_event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	public function trouverEventdate($id_event)
    {
        $sql = "SELECT date_debut from evenement where id_event='" . $id_event . "'";
        $db = config::getConnection();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	public function afficherEvent2()
    {
        $sql = "SELECT * From evenement order by nom_event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	public function afficherEvent3()
    {
        $sql = "SELECT * From evenement order by img_event";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function supprimerEvent($id_event)
    {
        $sql = "DELETE FROM evenement where id_event= :id_event";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_event', $id_event);
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    

    public function rechercherNom($nom_event )
    {
        $sql = "SELECT * from commande where nom_event like'%$nom%' or id_event like '%$nom%' ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	

    public function modifierevent($event,$id_event)
    {
        $sql = "UPDATE evenement SET nom_event=:nom_event,date_debut=:date_debut,date_fin=:date_fin,img_event=:img_event WHERE id_event=:id_event";
        $db = config::getConnexion();

        try {
            $req = $db->prepare($sql);
            $id_event = $event->getid_event();
            $nom_event = $event->getnom_event();
           
            $date_debut = $event->getdate_debut();
            $date_fin = $event->getdate_fin();
            $img_event = $event->getimg_event();
            $datas = array(':nom_event' => $nom_event, ':id_event' => $id_event, ':date_debut' => $date_debut, ':date_fin' => $date_fin, ':img_event' => $img_event);
            $req->bindValue(':id_event', $id_event);
            $req->bindValue(':nom_event', $nom_event);
           
            $req->bindValue(':date_debut', $date_debut);
            $req->bindValue(':date_fin', $date_fin);
          
            $req->bindValue(':img_event', $img_event);

            $s = $req->execute();
            // header('Lodate_debution: index.php');
        }  catch (Exception $e){
			echo $query->rowCount() . " records UPDATED successfully <br>";
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
    }

    public function ajouterevent($event)
    {

        $sql = "INSERT into evenement (id_event,nom_event,date_debut,date_fin,img_event)
                values (:id_event,:nom_event,:date_debut,:date_fin,:img_event) ";

        $db = config::getConnexion();

        try {

            $req = $db->prepare($sql);

            $id_event = $event->getid_event();
            $nom_event = $event->getnom_event();
            
            $date_debut = $event->getdate_debut();
            $date_fin = $event->getdate_fin();
			
           
            $img_event = $event->getimg_event();

            $req->bindValue(':id_event', $id_event);
            $req->bindValue(':nom_event', $nom_event);
          
            $req->bindValue(':date_debut', $date_debut);
            $req->bindValue(':date_fin', $date_fin);
			 
            
            $req->bindValue(':img_event', $img_event);

            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
