<!DOCTYPE html>
<html lang="en">
<head>
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
<script src="http://code.jquery.com/jquery-latest.js"> </script>
  <script type="text/javascript">
    setInterval("my_function();",1000); 
    function my_function(){
      $('#demo').load(location.href );
    }
  </script>
<?PHP
include "C:/wamp64/www/webprojettest/allfolders/model/event.php";
include "C:/wamp64/www/webprojettest/allfolders/controller/eventC.php";
		if (isset($_GET['id_event'])){
			$event1C=new eventC();
			$result=$event1C->trouverEventdate($_GET['id_event']);
		
			
			foreach($result as $row){
				$date_debut=$row['date_debut'];

				$date = strtotime($date_debut);
				$remaining = $date - time();

				$days_remaining = floor($remaining / 86400);
				$hours_remaining = floor(($remaining % 86400) / 3600);
				$minute_remaining = floor((($remaining % 86400) % 3600) / 60)+1;
				$seconds_remaining = floor((($remaining % 86400) % 3600) % 60);
				if($remaining < 0 ) {
					$days_remaining = 0; 
					$hours_remaining = 0;
					$minute_remaining = 0;
					$seconds_remaining = 0;
				}
			
			}
		}
		
?>
	<title>Coming Soon 1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	
	



			<p id="demo"></p>
		
			<script>

 document.getElementById("demo").innerHTML = <?PHP echo $days_remaining; ?> + "d " + <?PHP echo $hours_remaining; ?> + "h "
  + <?PHP echo $minute_remaining; ?> + "m " +<?PHP echo $seconds_remaining; ?>+ "s ";

</script>

</body>
</html>