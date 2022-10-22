<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Services';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generar Informe
                </a>
            </div>
            
            <?php
                $do = '';

                if(isset($_GET['do']) && in_array($_GET['do'], array('Add','Edit')))
                {
                    $do = htmlspecialchars($_GET['do']);
                }
                else
                {
                    $do = 'Manage';
                }

                if($do == 'Manage')
                {
                    $stmt = $con->prepare("SELECT * FROM servicios s, categoria_servicios sc where s.id_categoria = sc.id_categoria");
                    $stmt->execute();
                    $rows_services = $stmt->fetchAll();
                ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
                        </div>
                        <div class="card-body">

                            <!-- ADD NEW SERVICE BUTTON -->
                            
                            <a href="services.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                <i class="fa fa-plus"></i> 
                                Agregar Servicio
                            </a>

                            <!-- SERVICES TABLE -->

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Servicio Nombre</th>
                                        <th scope="col">Servicio Categoria</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Duración</th>
                                        <th scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($rows_services as $service)
                                        {
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $service['nombre_servicio'];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $service['nombre_categoria'];
                                                echo "</td>";
                                                echo "<td style = 'width:30%'>";
                                                    echo $service['descripcion_servicio'];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $service['precio_servicio'];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $service['duracion_servicio'];
                                                echo "</td>";
                                                echo "<td>";
                                                    $delete_data = "delete_".$service["servicio_id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0">
                                                                    <a href="services.php?do=Edit&servicio_id=<?php echo $service['servicio_id']; ?>" style="color: white;">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </button>
                                                            </li>

                                                            <!-- DELETE BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                                <!-- Delete Modal -->

                                                                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure you want to delete this Service "<?php echo $service['nombre_servicio']; ?>"?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" data-id = "<?php echo $service['servicio_id']; ?>" class="btn btn-danger delete_service_bttn">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    <?php
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                }
                elseif($do == 'Add')
                {
                    ?>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Service</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="services.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre_servicio">Service Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['nombre_servicio']))?htmlspecialchars($_POST['nombre_servicio']):'' ?>" placeholder="Service Name" name="nombre_servicio">
                                            <?php
                                                $flag_add_service_form = 0;
                                                if(isset($_POST['add_new_service']))
                                                {
                                                    if(empty(test_input($_POST['nombre_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Service name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                            $stmt = $con->prepare("SELECT * FROM categoria_servicios");
                                            $stmt->execute();
                                            $rows_categories = $stmt->fetchAll();
                                        ?>
                                        <div class="form-group">
                                            <label for="service_category">Service Category</label>
                                            <select class="custom-select" name="service_category">
                                                <?php
                                                    foreach($rows_categories as $category)
                                                    {
                                                        echo "<option value = '".$category['id_categoria']."'>";
                                                            echo $category['nombre_categoria'];
                                                        echo "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="duracion_servicio">Service Duration(min)</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['duracion_servicio']))?htmlspecialchars($_POST['duracion_servicio']):'' ?>" placeholder="Service Duration" name="duracion_servicio">
                                            <?php

                                                if(isset($_POST['add_new_service']))
                                                {
                                                    if(empty(test_input($_POST['duracion_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Service duration is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                    elseif(!ctype_digit(test_input($_POST['duracion_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Invalid duration.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_servicio">Service Price($)</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['precio_servicio']))?htmlspecialchars($_POST['precio_servicio']):'' ?>" placeholder="Service Price" name="precio_servicio">
                                            <?php

                                                if(isset($_POST['add_new_service']))
                                                {
                                                    if(empty(test_input($_POST['precio_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Service price is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                    elseif(!is_numeric(test_input($_POST['precio_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Invalid price.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_servicio">Service Description</label>
                                            <textarea class="form-control" name="descripcion_servicio" style="resize: none;"><?php echo (isset($_POST['descripcion_servicio']))?htmlspecialchars($_POST['descripcion_servicio']):''; ?></textarea>
                                            <?php

                                                if(isset($_POST['add_new_service']))
                                                {
                                                    if(empty(test_input($_POST['descripcion_servicio'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Service description is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                    elseif(strlen(test_input($_POST['descripcion_servicio'])) > 250)
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                The length of the description should be less than 250 letters.
                                                            </div>
                                                        <?php

                                                        $flag_add_service_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->

                                <button type="Submit" name="add_new_service" class="btn btn-primary">Add service</button>

                            </form>

                            <?php

                                /*** ADD NEW SERVICE ***/
                                if(isset($_POST['add_new_service']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_service_form == 0)
                                {
                                    $nombre_servicio = test_input($_POST['nombre_servicio']);
                                    $service_category = $_POST['service_category'];
                                    $duracion_servicio = test_input($_POST['duracion_servicio']);
                                    $precio_servicio = test_input($_POST['precio_servicio']);
                                    $descripcion_servicio = test_input($_POST['descripcion_servicio']);

                                    try
                                    {
                                        $stmt = $con->prepare("insert into servicios(nombre_servicio,descripcion_servicio,precio_servicio,duracion_servicio,id_categoria) values(?,?,?,?,?) ");
                                        $stmt->execute(array($nombre_servicio,$descripcion_servicio,$precio_servicio,$duracion_servicio,$service_category));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("New Service","The new service has been created successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("services.php");
                                                });
                                            </script>

                                        <?php

                                    }
                                    catch(Exception $e)
                                    {
                                        echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                            echo 'Error occurred: ' .$e->getMessage();
                                        echo "</div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>


                    <?php   
                }
                elseif($do == "Edit")
                {
                    $servicio_id = (isset($_GET['servicio_id']) && is_numeric($_GET['servicio_id']))?intval($_GET['servicio_id']):0;

                    if($servicio_id)
                    {
                        $stmt = $con->prepare("Select * from servicios where servicio_id = ?");
                        $stmt->execute(array($servicio_id));
                        $service = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="services.php?do=Edit&servicio_id=<?php echo $servicio_id; ?>">
                                        <!-- SERVICE ID -->
                                        <input type="hidden" name="servicio_id" value="<?php echo $service['servicio_id'];?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre_servicio">Service Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $service['nombre_servicio'] ?>" placeholder="Service Name" name="nombre_servicio">
                                                    <?php
                                                        $flag_edit_service_form = 0;

                                                        if(isset($_POST['edit_service_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['nombre_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Service name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                    $stmt = $con->prepare("SELECT * FROM categoria_servicios");
                                                    $stmt->execute();
                                                    $rows_categories = $stmt->fetchAll();
                                                ?>
                                                <div class="form-group">
                                                    <label for="service_category">Service Category</label>
                                                    <select class="custom-select" name="service_category">
                                                        <?php
                                                            foreach($rows_categories as $category)
                                                            {
                                                                if($category['id_categoria'] == $service['id_categoria'])
                                                                {
                                                                    echo "<option value = '".$category['id_categoria']."' selected>";
                                                                        echo $category['nombre_categoria'];
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option value = '".$category['id_categoria']."'>";
                                                                        echo $category['nombre_categoria'];
                                                                    echo "</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="duracion_servicio">Service Duration(min)</label>
                                                    <input type="text" class="form-control" value="<?php echo $service['duracion_servicio'] ?>" placeholder="Service Duration" name="duracion_servicio">
                                                    <?php

                                                        if(isset($_POST['edit_service_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['duracion_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Service duration is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                            elseif(!ctype_digit(test_input($_POST['duracion_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Invalid duration.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="precio_servicio">Service Price($)</label>
                                                    <input type="text" class="form-control" value="<?php echo $service['precio_servicio'] ?>" placeholder="Service Price" name="precio_servicio">
                                                    <?php

                                                        if(isset($_POST['edit_service_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['precio_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Service price is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                            elseif(!is_numeric(test_input($_POST['precio_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Invalid price.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="descripcion_servicio">Service Description</label>
                                                    <textarea class="form-control" name="descripcion_servicio" style="resize: none;"><?php echo $service['descripcion_servicio']; ?></textarea>
                                                    <?php

                                                        if(isset($_POST['edit_service_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['descripcion_servicio'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Service description is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                            elseif(strlen(test_input($_POST['descripcion_servicio'])) > 250)
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        The length of the description should be less than 250 letters.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_service_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SUBMIT BUTTON -->
                                        <button type="Submit" name="edit_service_sbmt" class="btn btn-primary">Save Edits</button>
                                    </form>
                                    
                                    <?php
                                        /*** EDIT SERVICE ***/
                                        if(isset($_POST['edit_service_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_service_form == 0)
                                        {
                                            $servicio_id = $_POST['servicio_id'];
                                            $nombre_servicio = test_input($_POST['nombre_servicio']);
                                            $service_category = $_POST['service_category'];
                                            $duracion_servicio = test_input($_POST['duracion_servicio']);
                                            $precio_servicio = test_input($_POST['precio_servicio']);
                                            $descripcion_servicio = test_input($_POST['descripcion_servicio']);

                                            try
                                            {
                                                $stmt = $con->prepare("update servicios set nombre_servicio = ?, descripcion_servicio = ?, precio_servicio = ?, duracion_servicio = ?, id_categoria = ? where servicio_id = ? ");
                                                $stmt->execute(array($nombre_servicio,$descripcion_servicio,$precio_servicio,$duracion_servicio,$service_category,$servicio_id));
                                                
                                                ?> 
                                                    <!-- SUCCESS MESSAGE -->

                                                    <script type="text/javascript">
                                                        swal("Service Updated","The service has been updated successfully", "success").then((value) => 
                                                        {
                                                            window.location.replace("services.php");
                                                        });
                                                    </script>

                                                <?php

                                            }
                                            catch(Exception $e)
                                            {
                                                echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                                    echo 'Error occurred: ' .$e->getMessage();
                                                echo "</div>";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            header('Location: services.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: services.php');
                        exit();
                    }
                }
            ?>
        </div>
  
<?php 
        
        //Include Footer
        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }

?>