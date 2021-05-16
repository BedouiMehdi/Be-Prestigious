<?PHP
class commande{

	private $id;
	private $nom;
	private $adresse;
	
    private $date;
    
    
	function __construct($id,$nom,$adresse,$date){
		$this->id=$id;
		$this->nom=$nom;
		$this->adresse=$adresse;
	
        $this->date=$date;
       
	}
	
	function getid(){
		return $this->id;
	}

	function getNom(){
		return $this->nom;
	}
	function getadresse(){
		return $this->adresse;
	}
	function getdate(){
		return $this->date;
    }

	function setnom($nom){
		$this->nom=$nom;
	}
	function setadresse($adresse){
		$this->prenom;
	}
	
	
}

?>