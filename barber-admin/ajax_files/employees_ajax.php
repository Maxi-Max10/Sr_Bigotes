<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>


<?php
	

	if(isset($_POST['do']) && $_POST['do'] == "Delete")
	{
		$empleado_id = $_POST['empleado_id'];

        $stmt = $con->prepare("DELETE from empleados where empleado_id = ?");
        $stmt->execute(array($empleado_id));    
	}
	
?>