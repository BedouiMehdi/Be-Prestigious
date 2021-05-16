<?php require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php
    
    class conf{
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
  
    class commandes{
    	 function recherche($id)
    {
        $sql = "SELECT * FROM commande where  id like '$search_value' ";

        //global $db;
        $db = Config::getConnexion();

        try {
            $result = $db->query($sql);

            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	
        }
    
       
		
        ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Afficher Commandes</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
   


	<!-- Page Wrapper -->
	<div id="wrapper">

	

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				

 <div class="col-lg-8">
				 <form method="POST" action="AjouterEvent.php" name="form" onsubmit="return saisie()"  >

															<div class="row ">
                                         <div class="col-sm-6">
                                        <div class="form-group">
                                             <input class="form-control valid btn btn-light float-rights" type="number" placeholder="id Commande" name="id_event" max="9999" required>
                                        </div>
                                    </div>
                                </div>
								 <div class="row space">
								<div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid btn btn-light float-rights" type="text" placeholder="NAME" name="nom_event" required>
							
							<div class="form-group">
							<br>
                                    <input class="form-control btn btn-light float-rights" type="date" placeholder="Date " name="date_debut" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>"required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
							
									
                                <div class="form-group">
								<br>
                                    <div class="rs-select2 js-select-simple select--no-search">
									 <label for="texte"><b>Type de  La reclamation </b></label>
                                        <select name="date_fin"  class="form-control valid btn btn-light float-rights" >
								<option value="supprimer">Annuler Commande </option>
								<option value="Modifier">Modifier Commande </option>
								
								
								</select>
                                    </div>
                                </div>
								
									
                              <div class="form-group">
                                <label for="texte"><b>Description de  La reclamation </b></label>
                                <textarea class="form-control valid btn btn-light float-rights" name="img_event" rows="10" ></textarea>
                            </div>
								
                           
                                </div>
							
                        </div>
						</div>
						</div>
						
                       
                       
                       
                        
                       
                        <div class="form-group ">
						 
                                <button type="submit" class=" valid btn btn-dark float-rights">Envoyer</button>
                            </div>
                                </div>
                            </div>    
                        </form>
						</div>
	
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>
	
	
	
	 <!-- Jquery JS-->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor2/select2/select2.min.js"></script>
    <script src="vendor2/datepicker/moment.min.js"></script>
    <script src="vendor2/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js2/global.js"></script>
    <script type="text/javascript">
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>
<?php require_once 'footer.php';
?>
</html>