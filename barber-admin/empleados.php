<?php
    ob_start();
    session_start();

    //Título de la página
    $pageTitle = 'Empleado';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //ARCHIVOS JS adicionales
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Comprobar si el usuario ya ha iniciado sesión
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Contenido de la página inicial -->
        <div class="container-fluid">
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
                    $stmt = $con->prepare("SELECT * FROM empleados");
                    $stmt->execute();
                    $rows_employees = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Empleados</h6>
                            </div>
                            <div class="card-body">
                                
                            <!-- AÑADIR NUEVO BOTÓN DE EMPLEADO -->
                                <a href="empleados.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                    <i class="fa fa-plus"></i> 
                                    Agregar Empleado
                                </a>

                                <!-- Tabla de empleados -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Número de Teléfono</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Opción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rows_employees as $employee)
                                                {
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $employee['nombre'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $employee['apellido'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $employee['celular'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $employee['email'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            $delete_data = "_employee_".$employee["empleado_id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- BOTÓN EDITAR EMPLEADO-->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Editar">
                                                                <button class="btn btn-success btn-sm rounded-0">
                                                                    <a href="empleados.php?do=Edit&empleado_id=<?php echo $employee['empleado_id']; ?>" style="color: white;">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </button>
                                                            </li>

                                                            <!-- BOTÓN ELIMINAR EMPLEADO-->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Eliminar">
                                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                                <!-- Eliminar Modal  Empleado-->

                                                                <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Esta seguro que desea eliminar al empleado?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                                <button type="button" data-id = "<?php echo $employee['empleado_id']; ?>" class="btn btn-danger delete_employee_bttn">Eliminar</button>
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
                        </div>
                    <?php
                }
                elseif($do == 'Add')
                {
                    ?>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Agregar nuevo empleado</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="empleados.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="employee_fname">Nombre</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['employee_fname']))?htmlspecialchars($_POST['employee_fname']):'' ?>" placeholder="Nombre " name="employee_fname">
                                            <?php
                                                $flag_add_employee_form = 0;
                                                if(isset($_POST['add_new_employee']))
                                                {
                                                    if(empty(test_input($_POST['employee_fname'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Nombre es requerido.
                                                            </div>
                                                        <?php

                                                        $flag_add_employee_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="employee_lname">Apellido</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['employee_lname']))?htmlspecialchars($_POST['employee_lname']):'' ?>" placeholder="Apellido" name="employee_lname">
                                            <?php
                                                if(isset($_POST['add_new_employee']))
                                                {
                                                    if(empty(test_input($_POST['employee_lname'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                            Apellido es requerido.
                                                            </div>
                                                        <?php

                                                        $flag_add_employee_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="employee_phone">Número de Teléfono</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['employee_phone']))?htmlspecialchars($_POST['employee_phone']):'' ?>" placeholder="Teléfono" name="employee_phone">
                                            <?php
                                                if(isset($_POST['add_new_employee']))
                                                {
                                                    if(empty(test_input($_POST['employee_phone'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Número de Teléfono requerido.
                                                            </div>
                                                        <?php

                                                        $flag_add_employee_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="employee_email">E-mail</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['employee_email']))?htmlspecialchars($_POST['employee_email']):'' ?>" placeholder="E-mail" name="employee_email">
                                            <?php
                                                if(isset($_POST['add_new_employee']))
                                                {
                                                    if(empty(test_input($_POST['employee_email'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Email es requerido.
                                                            </div>
                                                        <?php

                                                        $flag_add_employee_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                               <!-- BOTÓN ENVIAR -->

                                <button type="Submit" name="add_new_employee" class="btn btn-primary">Agregar empleado</button>

                            </form>

                            <?php

                                /*** AÑADIR NUEVO EMPLEADO ***/

                                if(isset($_POST['add_new_employee']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_employee_form == 0)
                                {
                                    $employee_fname = test_input($_POST['employee_fname']);
                                    $employee_lname = $_POST['employee_lname'];
                                    $employee_phone = test_input($_POST['employee_phone']);
                                    $employee_email = test_input($_POST['employee_email']);

                                    try
                                    {
                                        $stmt = $con->prepare("insert into empleados(nombre,apellido,celular,email) values(?,?,?,?) ");
                                        $stmt->execute(array($employee_fname,$employee_lname,$employee_phone,$employee_email));
                                        
                                        ?> 
                                            <!-- MENSAJE DE ÉXITO -->

                                            <script type="text/javascript">
                                                swal("Nuevo empleado","Nuevo empleado insertado correctamente", "success").then((value) => 
                                                {
                                                    window.location.replace("empleados.php");
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
                elseif($do == 'Edit')
                {
                    $empleado_id = (isset($_GET['empleado_id']) && is_numeric($_GET['empleado_id']))?intval($_GET['empleado_id']):0;

                    if($empleado_id)
                    {
                        $stmt = $con->prepare("Select * from empleados where empleado_id = ?");
                        $stmt->execute(array($empleado_id));
                        $employee = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Editar Empleado</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="empleados.php?do=Edit&empleado_id=<?php echo $empleado_id; ?>">
                                        <!-- Empleado ID -->
                                        <input type="hidden" name="empleado_id" value="<?php echo $employee['empleado_id'];?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employee_fname">Nombre</label>
                                                    <input type="text" class="form-control" value="<?php echo $employee['nombre'] ?>" placeholder="Nombre" name="employee_fname">
                                                    <?php
                                                        $flag_edit_employee_form = 0;
                                                        if(isset($_POST['edit_employee_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['employee_fname'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Nombre es requerido.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_employee_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employee_lname">Apellido</label>
                                                    <input type="text" class="form-control" value="<?php echo $employee['apellido'] ?>" placeholder="Apellido" name="employee_lname">
                                                    <?php
                                                        if(isset($_POST['edit_employee_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['employee_lname'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                    Apellido es requerido.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_employee_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="employee_phone">Número de Teléfono</label>
                                                    <input type="text" class="form-control" value="<?php echo $employee['celular'] ?>"  placeholder="Teléfono" name="employee_phone">
                                                    <?php
                                                        if(isset($_POST['edit_employee_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['employee_phone'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                    Número de Teléfono es requerido.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_employee_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"> 
                                                    <label for="employee_email">E-mail</label>
                                                    <input type="text" class="form-control" value="<?php echo $employee['email'] ?>" placeholder="E-mail" name="employee_email">
                                                    <?php
                                                        if(isset($_POST['edit_employee_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['employee_email'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Email es requerido.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_employee_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BUTTON de enviar -->
                                        <button type="Submit" name="edit_employee_sbmt" class="btn btn-primary">
                                            Editar empleado
                                        </button>
                                    </form>
                                    <?php
                                        /*** Editar empleado ***/
                                        if(isset($_POST['edit_employee_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_employee_form == 0)
                                        {
                                            $employee_fname = test_input($_POST['employee_fname']);
                                            $employee_lname = $_POST['employee_lname'];
                                            $employee_phone = test_input($_POST['employee_phone']);
                                            $employee_email = test_input($_POST['employee_email']);
                                            $empleado_id = $_POST['empleado_id'];

                                            try
                                            {
                                                $stmt = $con->prepare("update empleados set nombre = ?, apellido = ?, celular = ?, email = ? where empleado_id = ? ");
                                                $stmt->execute(array($employee_fname,$employee_lname,$employee_phone,$employee_email,$empleado_id));
                                                
                                                ?> 
                                                    <!-- MENSAJE DE ÉXITO -->

                                                    <script type="text/javascript">
                                                        swal("Empleado actualizado","Se a actualizado correctamente", "success").then((value) => 
                                                        {
                                                            window.location.replace("empleados.php");
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
                            header('Location: empleados.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: empleados.php');
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