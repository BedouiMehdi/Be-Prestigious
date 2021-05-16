
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

		<?php require_once 'maincolum.php';
		?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php require_once 'topbar.php';
				?>


				<!-- Begin Page Content -->
				<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Liste des Evenements </li>
							<div class="animated fadeIn">
                <div class="row">
				

                    <div class="col-md-12">
                        <div class="card">
                          
                            <div class="card-body">
                            <?PHP
                               include "C:/wamp64/www/webprojettest/allfolders/controller/eventC.php";
$event1C=new eventC();
$listeEvent=$event1C->afficherEvent2();
								
if(isset($_POST['nom_event']))
{
  if(($_POST['nom_event'] == ""))
  {
  $listeEvent=$event1C->afficherEvent();
  }
  else
  {
    $listeEvent=$event1C->rechercherNom($_POST['nom_event']);
  }
 
}




                                //var_dump($listeEmployes->fetchAll());
                                ?>
					<table>
					<td>
								<li class="active">TRIER : </li>
								</td>
									<td>		
 <a href="afficherevent.php">
                  <input type="submit" class="btn btn-danger"  value="nom" </a>
				  </td>
				  <td>		
 <a href="afficherevent2.php">
                  <input type="submit" class="btn btn-dark"  value="Type" </a>
				  </td>
				 
  </table>
    </div>
								<div class="container">
        <div class="jumbotron">
       
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Commandes</th>
                        <th>Nom </th>
                       
                        <th>Date debut</th>
                        <th>Type</th>
                        
                        <th>Description De La Reclamation</th>
                        
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?PHP
    foreach($listeEvent as $row){
        ?>
        <tr>
            <td>
                            <?PHP echo $row['id_event']; ?>
                        </td>
                        <td>
                            <?PHP echo $row['nom_event']; ?>
                        </td>
                      
                        <td>
                            <?PHP echo $row['date_debut']; ?>
                        </td>
                        <td>
                            <?PHP echo $row['date_fin']; ?>
                        </td>
                        
                        <td>
                       <?PHP echo $row['img_event']; ?>
                        </td>
            <td><form method="POST" action="supprimerEvent.php">
			 <FONT face=”Arial”>  
                     <input type="image" src="bouton/supprimer.png" name="supprimer" value="supprimer" width="40"
                                    height="40">
					
                    <input type="hidden" value="<?PHP echo $row['id_event']; ?>" name="id_event">
                </form>
            </td>
			
           
		  
        </tr>
        <?PHP
    }
    ?>
                                        
                                        
                                    </tbody>
                                </table>
								<table>
                <tr>
                    
                    <td>            <a class="nav-item nav-link " style="display:inline;" href="pd.php"><img src="bouton/pdf.png" class="img_ajouter"> </a>
</td>
                </tr>
            </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

                        </ol>
                    </div>
                </div>
            </div>
        </div>

      
            

    </div><!-- /#right-panel -->

				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->



		</div>
		<!-- End of Content Wrapper -->

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

</html>