<?php
    
/*
Función de título que repite el título de la página en caso de que la página tenga la variable $pageTitle y repite el título predeterminado para otras páginas
*/
	function getTitle()
	{
		global $pageTitle;
		if(isset($pageTitle))
			echo $pageTitle." | Sr. Bigotes";
		else
			echo "Sr. Bigotes";
	}

	/*
Esta función devuelve el número de elementos en una tabla dada
*/

    function countItems($item,$table)
	{
		global $con;
		$stat_ = $con->prepare("SELECT COUNT($item) FROM $table");
		$stat_->execute();
		
		return $stat_->fetchColumn();
	}

 
	function checkItem($select, $from, $value)
	{
		global $con;
		$statment = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");
		$statment->execute(array($value));
		$count = $statment->rowCount();
		
		return $count;
	}

/*
    ==============================================
    FUNCIÓN DE ENTRADA DE PRUEBA, SE UTILIZA PARA LA DESINFECCIÓN DE LAS ENTRADAS DEL USUARIO
    Y ELIMINAR CARACTERES SOSPECHOSOS y eliminar espacios adicionales
    ==============================================

*/
	
  	

  	function test_input($data) 
  	{
      	$data = trim($data);
      	$data = stripslashes($data);
      	$data = htmlspecialchars($data);
      	return $data;
  	}

?>

