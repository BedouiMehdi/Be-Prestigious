<?PHP
include "C:/wamp64/www/allfolders/controller/commandec.php";
$commande1c=new commandec();
if (isset($_POST["recherche"])){
	$commande1c->recherche($value); 
	header('Location: affichercomm.php');
	
}

?>
<?PHP
include "C:/wamp64/www/allfolders/controller/commandec.php";
$commande1c=new commandec();
$listeEmployes=$commande1c->affichercommande();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
    <tr>
        <td>id</td>
        <td>Nom</td>
        <td>adresse</td>
        
        <td>date</td>
       
        
    </tr>

    <?PHP
    foreach($listeEmployes as $row){
        ?>
        <tr>
            <td><?PHP echo $row['id']; ?></td>
            <td><?PHP echo $row['nom']; ?></td>
            <td><?PHP echo $row['adresse']; ?></td>
           
            <td><?PHP echo $row['date']; ?></td>
           
            <td><form method="POST" action="supprimercommande.php">
                    <input type="submit" name="supprimer" value="supprimer">
                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                </form>
            </td>
            <td><a href="modifiercommande.php?id=<?PHP echo $row['id']; ?>">
                    Modifier</a></td>
        </tr>
        <?PHP
    }
    ?>
</table>


