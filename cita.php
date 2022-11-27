<!-- PHP INCLUDES -->

<?php

    include "connect.php";
    include "Includes/functions/functions.php";
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";

?>
<!-- HOJA DE ESTILO DE PÁGINA DE CITAS -->
<link rel="stylesheet" href="Design/css/appointment-page-style.css">

<!--SECCION RESERVA -->

<section class="booking_section">
	<div class="container">

		<?php

            if(isset($_POST['submit_book_appointment_form']) && $_SERVER['REQUEST_METHOD'] === 'POST')
            {
            	// SERVICIOS seleccionados

                $selected_services = $_POST['selected_services'];

                // EMPLEADO selecccionado

                $selected_employee = $_POST['selected_employee'];

                // FECHA + HORA seleccionada

                $selected_date_time = explode(' ', $_POST['desired_date_time']);

                $date_selected = $selected_date_time[0];
                $hora_inicio = $date_selected." ".$selected_date_time[1];
                $end_time = $date_selected." ".$selected_date_time[2];


                //Detalle del cliente

                $client_first_name = test_input($_POST['client_first_name']);
                $client_last_name = test_input($_POST['client_last_name']);
                $client_phone_number = test_input($_POST['client_phone_number']);
                $client_email = test_input($_POST['client_email']);

                $con->beginTransaction();

                try
                {
					// Compruebe si el correo del cliente ya existe en la base de datos
					$stmtCheckClient = $con->prepare("SELECT * FROM clientes WHERE client_email = ?");
                    $stmtCheckClient->execute(array($client_email));
					$client_result = $stmtCheckClient->fetch();
					$client_count = $stmtCheckClient->rowCount();

					if($client_count > 0)
					{
						$cliente_id = $client_result["cliente_id"];
					}
					else
					{
						$stmtgetCurrentClientID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'sr_bigotes' AND TABLE_NAME = 'clientes'");
            
						$stmtgetCurrentClientID->execute();
						$cliente_id = $stmtgetCurrentClientID->fetch();

						$stmtClient = $con->prepare("insert into clientes(nombre,apellido,celular,client_email) 
									values(?,?,?,?)");
						$stmtClient->execute(array($client_first_name,$client_last_name,$client_phone_number,$client_email));
					}


                    

                    $stmtgetCurrentAppointmentID = $con->prepare("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'sr_bigotes' AND TABLE_NAME = 'citas'");
            
                    $stmtgetCurrentAppointmentID->execute();
                    $id_citas = $stmtgetCurrentAppointmentID->fetch();
                    
                    $stmt_appointment = $con->prepare("insert into citas(fecha_creado, cliente_id, empleado_id, hora_comienzo, hora_fin ) values(?, ?, ?, ?, ?)");
                    $stmt_appointment->execute(array(Date("Y-m-d H:i"),$cliente_id[0],$selected_employee,$hora_inicio,$end_time));

                    foreach($selected_services as $service)
                    {
                        $stmt = $con->prepare("insert into servicio_reservado(id_citas, servicio_id) values(?, ?)");
                        $stmt->execute(array($id_citas[0],$service));
                    }
                    
                    echo "<div class = 'alert alert-success'>";
                        echo "Genia! Su turno ha sido creado con exito!";
                    echo "</div>";

					mail($client_email,"Solicitud de cita","Cita","Muchas gracias por elegirnos ".$client_first_name.", su cita a sido agendada correctamente.");

                    $con->commit();
                }
                catch(Exception $e)
                {
                    $con->rollBack();
                    echo "<div class = 'alert alert-danger'>"; 
                        echo "Usted ya tiene un turno asignado!";
                    echo "</div>";
                }
            }

        ?>

		<!-- FORMULARIO DE RESERVA -->

		<form method="post" id="appointment_form" action="cita.php">
		
			<!-- SELECCIONE SERVICIO -->

			<div class="select_services_div tab_reservation" id="services_tab">

				<!-- MENSAJE DE ALERTA -->

				<div class="alert alert-danger" role="alert" style="display: none">
					¡Por favor, seleccione al menos un servicio!
				</div>

				<div class="text_header">
					<span>
						1. Seleccionar Servicio
					</span>
				</div>

				<!-- PESTAÑA DE SERVICIOS -->
				
				<div class="items_tab">
        			<?php
        				$stmt = $con->prepare("Select * from servicios");
                    	$stmt->execute();
                    	$rows = $stmt->fetchAll();

                    	foreach($rows as $row)
                    	{
                        	echo "<div class='itemListElement'>";
                            	echo "<div class = 'item_details'>";
                                	echo "<div>";
                                    	echo $row['nombre_servicio'];
                                	echo "</div>";
                                	echo "<div class = 'item_select_part'>";
                                		echo "<span class = 'service_duration_field'>";
                                    		echo $row['duracion_servicio']." min";
                                    	echo "</span>";
                                    	echo "<div class = 'service_price_field'>";
    										echo "<span style = 'font-weight: bold;'>";
                                    			echo "$".$row ['precio_servicio'];
                                    		echo "</span>";
                                    	echo "</div>";
                                    ?>
                                    	<div class="select_item_bttn">
                                    		<div class="btn-group-toggle" data-toggle="buttons">
												<label class="service_label item_label btn btn-secondary">
													<input type="checkbox"  name="selected_services[]" value="<?php echo $row['servicio_id'] ?>" autocomplete="off">Seleccionar
									
													
												</label>
											</div>
                                    	</div>
                                    <?php
                                	echo "</div>";
                            	echo "</div>";
                        	echo "</div>";
                    	}
            		?>
    			</div>
			</div>

			<!-- SELECCIONE EMPLEADO -->

			<div class="select_employee_div tab_reservation" id="employees_tab">

				<!-- MENSAJE DE ALERTA -->

				<div class="alert alert-danger" role="alert" style="display: none">
					¡Por favor, seleccione un empleado!
				</div>

				<div class="text_header">
					<span>
						2. Seleccionar empleado
					</span>
				</div>

				<!-- FICHA EMPLEADORES -->
				
				<div class="btn-group-toggle" data-toggle="buttons">
					<div class="items_tab">
        				<?php
        					$stmt = $con->prepare("Select * from empleados");
                    		$stmt->execute();
                    		$rows = $stmt->fetchAll();

                    		foreach($rows as $row)
                    		{
                        		echo "<div class='itemListElement'>";
                            		echo "<div class = 'item_details'>";
                                		echo "<div>";
                                    		echo $row['nombre']." ".$row['apellido'];
                                		echo "</div>";
                                		echo "<div class = 'item_select_part'>";
                                    ?>
                                    		<div class="select_item_bttn">
                                    			<label class="item_label btn btn-secondary active">
													<input type="radio" class="radio_employee_select" name="selected_employee" value="<?php echo $row['empleado_id'] ?>">Seleccionar
												</label>	
                                    		</div>
                                    <?php
                                		echo "</div>";
                            		echo "</div>";
                        		echo "</div>";
                    		}
            			?>
    				</div>
    			</div>
			</div>


			<!-- SELECCIONE FECHA HORA -->

			<div class="select_date_time_div tab_reservation" id="calendar_tab">

				<!-- MENSAJE DE ALERTA -->
				
		        <div class="alert alert-danger" role="alert" style="display: none">
		          ¡Por favor, seleccione la hora!
		        </div>

				<div class="text_header">
					<span>
						3. Seleccione fecha y hora
					</span>
				</div>
				
				<div class="calendar_tab" style="overflow-x: auto;overflow-y: visible;" id="calendar_tab_in">
					<div id="calendar_loading">
						<img src="Design/images/ajax_loader_gif.gif" style="display: block;margin-left: auto;margin-right: auto;">
					</div>
				</div>

			</div>


			<!-- DATOS DEL CLIENTE -->

			<div class="client_details_div tab_reservation" id="client_tab">

                <div class="text_header">
                    <span>
                        4. Detalles del cliente
                    </span>
                </div>

                <div>
                    <div class="form-group colum-row row">
                        <div class="col-sm-6">
                            <input type="text" name="client_first_name" id="client_first_name" class="form-control" placeholder="Nombre">
							<span class = "invalid-feedback">Este campo es obligatorio</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="client_last_name" id="client_last_name" class="form-control" placeholder="Apellido">
							<span class = "invalid-feedback">Este campo es obligatorio</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="email" name="client_email" id="client_email" class="form-control" placeholder="E-mail">
							<span class = "invalid-feedback">Email inválido</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text"  name="client_phone_number" id="client_phone_number" class="form-control" placeholder="Número de Teléfono">
							<span class = "invalid-feedback">Número de teléfono inválido</span>
						</div>
                    </div>
        
                </div>
            </div>


			

			<!--BOTONES SIGUIETE Y ANTERIOR -->

			<div style="overflow:auto;padding: 30px 0px;">
    			<div style="float:right;">
    				<input type="hidden" name="submit_book_appointment_form">
      				<button type="button" id="prevBtn"  class="next_prev_buttons" style="background-color: blue;"  onclick="nextPrev(-1)">Anterior</button>
      				<button type="button" id="nextBtn" class="next_prev_buttons" onclick="nextPrev(1)">Siguiente</button>
    			</div>
  			</div>

  			<!-- Círculos que indican los pasos del formulario: -->

  			<div style="text-align:center;margin-top:40px;">
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
    			<span class="step"></span>
  			</div>

		</form>
	</div>
</section>



<!-- BOTON DE FOOTER  -->

<?php include "Includes/templates/footer.php"; ?>