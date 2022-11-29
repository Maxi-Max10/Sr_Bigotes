

	
$(function () 
{
	$('[data-toggle="tooltip"]').tooltip();
});


/*
	============================

	VALIDAR LOGIN 
	
	============================
*/

function validateLogInForm() 
{
	var username_input = document.forms["login-form"]["usuario"].value;
	var password_input = document.forms["login-form"]["password"].value;

	if (username_input == "" && password_input == "") 
    {
    	document.getElementById('required_username').style.display = 'initial';
    	document.getElementById('required_password').style.display = 'initial';
    	return false;
    }
    
    if (username_input == "") 
   	{
    	document.getElementById('required_username').style.display = 'initial';
    	return false;
    }
    if(password_input == "")
    {
    	document.getElementById('required_password').style.display = 'initial';
        return false;
    }
}


/*
    ======================================
    
    DASHBOARD PAGINA ==== > CAMBIAR PESTAÑAS DE RESERVAS EN LA PÁGINA DEL TABLERO

    ========================================
*/

function openTab(evt, tabName) 
{
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    
    for (i = 0; i < tabcontent.length; i++) 
    {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) 
    {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    
    document.getElementById(tabName).style.display = "table";
    evt.currentTarget.className += " active";
}

/*
    ======================================
    
    DASHBOARD PAGE ==== > CANCELAR CITA CUANDO SE HAGA CLIC EN EL BOTÓN CANCELAR

    ========================================
*/

$('.cancel_appointment_button').click(function()
{

    var id_citas = $(this).data('id');
    var razon_cancelacion = $('#appointment_cancellation_reason_'+id_citas).val();
    var do_ = 'Cancel Appointment';


    $.ajax({
        url: "ajax_files/appointments_ajax.php",
        type: "POST",
        data:{do:do_,id_citas:id_citas,razon_cancelacion:razon_cancelacion},
        success: function (data) 
        {
            
            $('#cancel_appointment_'+id_citas).modal('hide');
            
            
            swal("Cancelar cita","La cita a sido cancelada!", "success").then((value) => 
            {
                window.location.replace("index.php");
            });
            
        },
        error: function(xhr, status, error) 
        {
            alert('A OCURRIDO UN ERROR AL TRATAR DE PROCESAR LA SOLICITUD!');
        }
      });
});


/*
    ======================================
    
    SERVICE CATEGORIES PAGE ==== > SE HACE CLIC EN EL BOTÓN AÑADIR CATEGORÍA DE SERVICIO

    ========================================
*/


$('#add_category_bttn').click(function()
{
    var nombre_categoria = $("#category_name_input").val();
    var do_ = "Add";

    if($.trim(nombre_categoria) == "")
    {
        $('#required_category_name').css('display','block');
    }
    else
    {
        $.ajax(
        {
            url:"ajax_files/service_categories_ajax.php",
            method:"POST",
            data:{nombre_categoria:nombre_categoria,do:do_},
            dataType:"JSON",
            success: function (data) 
            {
                if(data['alert'] == "Warning")
                {
                    swal("Advertencia",data['message'], "warning").then((value) => {});
                }
                if(data['alert'] == "Success")
                {
                    $('#add_new_category').modal('hide');
                    swal("Nueva categoria",data['message'], "success").then((value) => 
                    {
                        window.location.replace("servic-categoria.php");
                    });
                }
                
            },
            error: function(xhr, status, error) 
            {
                alert('A OCURRIDO UN ERROR AL TRATAR DE PROCESAR SU SOLICITUD.');
            }
        });
    }
});


/*
    ======================================
    
    SERVICIO CATEGORIAS PAGINA ==== > SE HACE CLIC EN EL BOTÓN ELIMINAR CATEGORÍA DE SERVICIO

    ========================================
*/



$('.delete_category_bttn').click(function()
{
    var id_categoria = $(this).data('id');
    var action = "Delete";

    $.ajax(
    {
        url:"ajax_files/service_categories_ajax.php",
        method:"POST",
        data:{id_categoria:id_categoria,action:action},
        dataType:"JSON",
        success: function (data) 
        {
            if(data['alert'] == "Warning")
                {
                    swal("Advertencia",data['message'], "warning").then((value) => {});
                }
                if(data['alert'] == "Success")
                {
                    swal("Nueva Categoria",data['message'], "success").then((value) => 
                    {
                        window.location.replace("servic-categoria.php");
                    });
                }     
        },
        error: function(xhr, status, error) 
        {
            alert('A OCURRIDO UN ERROR AL PROCESAR LA SOLICITUD.');
            alert(error);
        }
      });
});

/*
    ======================================
    
    SERVICIO CATEGORIAS PAGINA ==== > SE HACE CLIC EN EL BOTÓN EDITAR CATEGORÍA DE SERVICIO

    ========================================
*/


$('.edit_category_bttn').click(function()
{
    var id_categoria = $(this).data('id');
    var nombre_categoria = $("#input_category_name_"+id_categoria).val();

    var action = "Edit";

    if($.trim(nombre_categoria) == "")
    {
        $('#invalid_input_'+id_categoria).css('display','block');
    }
    else
    {
        $.ajax(
        {
            url:"ajax_files/service_categories_ajax.php",
            method:"POST",
            data:{id_categoria:id_categoria,nombre_categoria:nombre_categoria,action:action},
            dataType:"JSON",
            success: function (data) 
            {
                if(data['alert'] == "Warning")
                {
                    swal("Advertencia","Esta seguro que desea editar categoria?", "warning").then((value) => {});
                }
                if(data['alert'] == "Success")
                {
                    swal("Nueva Categoria","Editada correctamente", "success").then((value) => 
                    {
                        window.location.replace("servic-categoria.php");
                    });
                }     
            },
            error: function(xhr, status, error) 
            {
                alert('A OCURRIDO UN ERROR AL PROCESAR LA SOLICITUD');
                alert(error);
            }
        });
    }
});


/*
    ======================================
    
    SERVICIOS PAGINA ==== > SE HACE CLIC EN EL BOTÓN ELIMINAR CATEGORÍA DE SERVICIO

    ========================================
*/


$('.delete_service_bttn').click(function()
{
    var servicio_id = $(this).data('id');
    var do_ = "Delete";

    $.ajax(
    {
        url:"ajax_files/services_ajax.php",
        method:"POST",
        data:{servicio_id:servicio_id,do:do_},
        success: function (data) 
        {
            swal("Eliminar Servicio","El servicio a sido eliminado!", "success").then((value) => {
                window.location.replace("services.php");
            });     
        },
        error: function(xhr, status, error) 
        {
            alert('A OCURRIDO UN ERROR AL PROCESAR LA SOLICITUD');
        }
      });
});


/*
    ======================================
    
    HORARIO DE EMPLEADOS ==== >  SE HACE CLIC EN EL BOTÓN MOSTRAR DÍA DESDE HASTA HORAS

    ========================================
*/


$(".sb-worktime-day-switch").click(function()
{
    if(!$(this).prop('checked'))
    {
        $(this).closest('div.worktime-day').children(".time_").css('display','none');
    }
    else
        $(this).closest('div.worktime-day').children(".time_").css('display','flex');
});


/*
    ======================================
    
    EMPLADOS PAGINA ==== > ELIMINA EMPLEADO

    ========================================
*/


 $('.delete_employee_bttn').click(function()
{
    var empleado_id = $(this).data('id');
    var do_ = "Delete";

    $.ajax(
    {
        url:"ajax_files/employees_ajax.php",
        method:"POST",
        data:{empleado_id:empleado_id,do:do_},
        success: function (data) 
        {
            swal("Eliminar empleado","El empleado a sido elimiando!", "success").then((value) => {
                window.location.replace("empleados.php");
            });     
        },
        error: function(xhr, status, error) 
        {
            alert('A OCURRIDO UN ERROR AL PROCESAR LA SOLICITUD');
        }
    });
});