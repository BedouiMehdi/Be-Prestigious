<?php require_once 'header.php';
?>
<?php
session_start();
// Page was not reloaded via a button press
if (!isset($_POST['add1'])) {
    $_SESSION['attnum1'] = 0; // Reset counter
}
if (!isset($_POST['add2'])) {
    $_SESSION['attnum2'] = 0; // Reset counter
}

?>
<!-- header -->

<!-- //header -->
<!doctype html>
<html lang="en">
<head>
<?php
    
    class config {
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
  
    class commandec{
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
    }
        $commande1c=new commandec();
    $result=$commande1c->recuperercommande(1);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$adresse=$row['adresse'];
		$etat=$row['etat'];
        $total=$row['total'];
    }
	
        ?>
		 <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
</head>


<body>
  <section class="contact-section">
            <div class="container">
                


                <div class="row ">
                    <div class="col-12">
                        <h2 class="contact-title">Ajouter une commande</h2>
                    </div>
                    <div class="col-lg-8">
                         <form method="POST" action="ajoutcommande.php">
                           
						<div class="row ">
                                         <div class="col-sm-6">
                                        <div class="form-group">
                                             <input class="form-control valid btn btn-light float-rights" type="number" placeholder="id commande" name="id" max="99" required>
                                        </div>
                                    </div>
                                </div>
								 <div class="row space">
								<div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid btn btn-light float-rights" type="text" placeholder="NAME" name="nom" required>
							<br>
							<br>
							<div class="form-group">
                                    <input class="form-control btn btn-light float-rights" type="date" placeholder="date" name="date" min="<?php echo date("Y-m-d", strtotime("+2 day")); ?>" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
							<br>
									<br>
                                <div class="form-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <input class="form-control valid btn btn-light float-rights" type="text" placeholder="Adresse"  name="adresse" required>
                                    </div>
                                </div>
                           
                                </div>
							
                        </div>
						</div>
						</div>
						
                       
                       
                       
                        
                       
                        <div class="form-group ">
						 
                                <button type="submit" class=" valid btn btn-dark float-rights">COMMANDER</button>
                            </div>
                        </form>
                    </div>
                    
                       
                    </div>
                </div>
				 </div>
            </div>
        </section>
		 <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script type="text/javascript">
    function projet()
    {
        if(f1.name=='')
        alert('matnajjamch');

    }
    </script>
		</body>
		



<?php require_once 'footer.php';
?>