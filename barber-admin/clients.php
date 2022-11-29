<?php
    session_start();

     //Page Title //Título de la página
    $pageTitle = 'Cliente';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Comprobar si el usuario ya ha iniciado sesión
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
    <!-- Contenido de la página inicial -->
        <div class="container-fluid">
    

            <!-- Tabla de Clientes -->
            <?php
                $stmt = $con->prepare("SELECT * FROM clientes");
                $stmt->execute();
                $rows_clients = $stmt->fetchAll(); 
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cliente</h6>
                </div>
                <div class="card-body">
                    
                    <!-- Tabla de Clientes -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Número Teléfono</th>
                                    <th scope="col">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($rows_clients as $client)
                                    {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo $client['cliente_id'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $client['nombre'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $client['apellido'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $client['celular'];
                                            echo "</td>";
                                            echo "<td>";
                                                echo $client['client_email'];
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