<?php
    session_start();

  
    $pageTitle = 'Categoría';

 
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Comprueba si el usuario ya ha iniciado sesión
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        
        <div class="container-fluid">
    
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Categorías de servicios</h1>
               
            </div>

            <!-- Servicio Categorias Tabla -->
            <?php
                $stmt = $con->prepare("SELECT * FROM categoria_servicios");
                $stmt->execute();
                $rows_categories = $stmt->fetchAll(); 
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Categorías de servicios</h6>
                </div>
                <div class="card-body">

                    <!-- Agregar nueva catedoria modal -->
                    <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_category" data-placement="top">
                        <i class="fa fa-plus"></i> 
                       Agregar categoría
                    </button>

                    <!-- Agregar nueva categoria -->
                    <div class="modal fade" id="add_new_category" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Añadir Nueva Categoría</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre_categoria">Categoría Nombre</label>
                                        <input type="text" id="category_name_input" class="form-control" placeholder="Categoría nombre" name="nombre_categoria">
                                        <div class="invalid-feedback" id="required_category_name" style="display: none;">
                                            Categoría nombre es requerido!
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-info" id="add_category_bttn">Agregar Categoría</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categorias-->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Categoría ID</th>
                                    <th>Nombre de categoría</th>
                                    <th>Opción</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <?php
                                foreach($rows_categories as $category)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo $category['id_categoria'];
                                        echo "</td>";
                                        echo "<td>";
                                            echo $category['nombre_categoria'];
                                        echo "</td>";
                                        echo "<td>";
                                            if(strtolower($category["nombre_categoria"]) != "uncategorized")
                                            {
                                                $delete_data = "delete_".$category["id_categoria"];
                                                $edit_data = "edit_".$category["id_categoria"];
                                            ?>
                                            <!-- ELIMINAR Y EDITAR  SERVICIO CATEGORIA-->
                                            <ul>
                                                <li class="list-inline-item" data-toggle="tooltip" title="Editar">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $edit_data; ?>" data-placement="top"><i class="fa fa-edit"></i></button>

                                                    <!-- EDITAR Modal -->

                                                    <div class="modal fade" id="<?php echo $edit_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $edit_data; ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="nombre_categoria">Nombre de categoría</label>
                                                                        <input type="text" class="form-control" id="<?php echo "input_category_name_".$category["id_categoria"]; ?>" value="<?php echo $category["nombre_categoria"]; ?>">
                                                                        <div class="invalid-feedback" id = "<?php echo "invalid_input_".$category["id_categoria"]; ?>">
                                                                            Nombre de categoría requerido.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" data-id = "<?php echo $category['id_categoria']; ?>" class="btn btn-success edit_category_bttn">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!---->
                                                <li class="list-inline-item" data-toggle="tooltip" title="Eliminar">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="modal" data-target="#<?php echo $delete_data; ?>" data-placement="top"><i class="fa fa-trash"></i></button>

                                                    <!-- Eliminar Modal -->

                                                    <div class="modal fade" id="<?php echo $delete_data; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $delete_data; ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Seguro desea eliminar categoría "<?php echo $category['nombre_categoria']; ?>"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" data-id = "<?php echo $category['id_categoria']; ?>" class="btn btn-danger delete_category_bttn">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php
                                            }
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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