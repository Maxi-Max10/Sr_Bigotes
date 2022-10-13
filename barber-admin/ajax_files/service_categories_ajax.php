<?php include '../connect.php'; ?>
<?php include '../Includes/functions/functions.php'; ?>


<?php
	
	if(isset($_POST['do']) && $_POST['do'] == "Add")
	{
        $nombre_categoria = test_input($_POST['nombre_categoria']);

        $checkItem = checkItem("nombre_categoria","categoria_servicios",$nombre_categoria);

        if($checkItem != 0)
        {
            $data['alert'] = "Warning";
            $data['message'] = "This category name already exists!";
            echo json_encode($data);
            exit();
        }
        elseif($checkItem == 0)
        {
        	//Insert into the database
            $stmt = $con->prepare("insert into categoria_servicios(nombre_categoria) values(?) ");
            $stmt->execute(array($nombre_categoria));

            $data['alert'] = "Success";
            $data['message'] = "The new category has been inserted successfully !";
            echo json_encode($data);
            exit();
        }
            
	}

    if(isset($_POST['action']) && $_POST['action'] == "Delete")
	{
        $id_categoria = $_POST['id_categoria'];
        
        try
        {
            $con->beginTransaction();

            $stmt_services = $con->prepare("select servicio_id from servicios where id_categoria = ?");
            $stmt_services->execute(array($id_categoria));
            $services = $stmt_services->fetchAll();
            $services_count = $stmt_services->rowCount();

            if($services_count > 0)
            {
                $stmt_service_uncategorized = $con->prepare("select id_categoria from categoria_servicios where LOWER(nombre_categoria) = ?");
                $stmt_service_uncategorized->execute(array("uncategorized"));
                $uncategorized_id = $stmt_service_uncategorized->fetch();

                foreach($services as $service)
                {
                    $stmt_update_service = $con->prepare("UPDATE servicios set id_categoria = ? where servicio_id = ?");
                    $stmt_update_service->execute(array($uncategorized_id["id_categoria"], $service["servicio_id"]));
                }
            }

            $stmt = $con->prepare("DELETE from categoria_servicios where id_categoria = ?");
            $stmt->execute(array($id_categoria));
            $con->commit();
            $data['alert'] = "Success";
            $data['message'] = "The new category has been inserted successfully !";
            echo json_encode($data);
            exit();

            
        }
        catch(Exception $exp)
        {
            echo $exp->getMessage() ;
            $con->rollBack();
            $data['alert'] = "Warning";
            $data['message'] =  $exp->getMessage() ;
            echo json_encode($data);
            exit();
        }

    }
    
    if(isset($_POST['action']) && $_POST['action'] == "Edit")
	{
        $id_categoria = $_POST['id_categoria'];
        $nombre_categoria = test_input($_POST['nombre_categoria']);

        $checkItem = checkItem("nombre_categoria","categoria_servicios",$nombre_categoria);

        if($checkItem != 0)
        {
            $data['alert'] = "Warning";
            $data['message'] = "This category name already exists!";
            echo json_encode($data);
            exit();
        }
        elseif($checkItem == 0)
        {

            try
            {
                $stmt = $con->prepare("UPDATE categoria_servicios set nombre_categoria = ? where id_categoria = ?");
                $stmt->execute(array($nombre_categoria, $id_categoria));

                $data['alert'] = "Success";
                $data['message'] = "Category name has been updated successfully!";
                echo json_encode($data);
                exit();
            }   
            catch(Exception $e)
            {
                $data['alert'] = "Warning";
                $data['message'] = $e->getMessage();
                echo json_encode($data);
                exit();
            }

            
        }
    }
	
?>