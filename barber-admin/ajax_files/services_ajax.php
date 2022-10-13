<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>


<?php
	

	if(isset($_POST['do']) && $_POST['do'] == "Delete")
	{
		$servicio_id = $_POST['servicio_id'];

        $stmt = $con->prepare("DELETE from servicios where servicio_id = ?");
        $stmt->execute(array($servicio_id));    
	}
	
?>