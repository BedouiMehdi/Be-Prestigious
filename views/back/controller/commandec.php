<?PHP
include "C:/wamp64/www/allfolders/config.php";

  class confi {
    private static $instance = NULL;

    public static function getConnexion() {
    	 //self fonction/ variable static:self::$
        // public private ... $this->
      if (!isset(self::$instance)) {
		try{
		//Php Data Object:relation avec objet et bd
        self::$instance = new PDO('mysql:host=localhost;dbname=projet',
            'root', '');
        //pour afficher les erreurs
		self::$instance->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }

class commandec {

	
	function ajoutercommande($commande){
		$sql="insert into commande(id,nom,adresse,date) values 
(:id, :nom,:adresse,:date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$commande->getid();
        $nom=$commande->getNom();
        $adresse=$commande->getadresse();
        $date=$commande->getdate();
        //lier variable => paramètre
        $req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':adresse',$adresse);
		
                                    $req->bindValue(':date',$date);
       // $req->bindValue(':date',$classe);
     //   $req->bindValue(':etat',$class);
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
    }
    function affichercommande(){
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercommande($id){
		$sql="DELETE FROM commande where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
	function modifiercommande($commande,$id){
		$sql="UPDATE commande SET  nom=:nom,adresse=:adresse,date=:date WHERE id=:id";
		$db = config::getConnexion();
try{

    $req=$db->prepare($sql);
    $id=$commande->getid();
    $nom=$commande->getNom();
    $prenom=$commande->getadresse();
    $date=$commande->getdate();
		$datas = array(':id'=>$id, ':nom'=>$nom,':adresse'=>$prenom,':date'=>$date,);
		//lier variable => paramètre
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':adresse',$prenom);
		
        
        $req->bindValue(':date',$date);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercommande($id){
		$sql="SELECT * from commande where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	/*function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }*/
		
		 function recherche($valeur){
		$sql="SElECT * From commande where id like '$valeur' or  nom like '%$valeur%' or date like '%$valeur%' or adresse like '%valeur%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	}

    

    
    
    ?>