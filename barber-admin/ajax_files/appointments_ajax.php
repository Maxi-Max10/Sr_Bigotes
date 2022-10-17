<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>


<?php
	

	if(isset($_POST['do']) && $_POST['do'] == "Cancel Appointment")
	{
		$id_citas = $_POST['id_citas'];
		$razon_cancelacion =  test_input($_POST['razon_cancelacion']);

        $stmt = $con->prepare("UPDATE citas set cancelado = 1, razon_cancelacion = ? where id_citas = ?");
        $stmt->execute(array($razon_cancelacion, $id_citas));    
	}
	
?>