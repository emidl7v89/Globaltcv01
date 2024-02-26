$(document).ready(function() {
    // Función para guardar un nuevo empleado
    $("#guardarEmpleado").click(function() {
        var nombre = $("#nombre").val();
        var apellido_paterno = $("#apellido_paterno").val();
        var apellido_materno = $("#apellido_materno").val();
        var correo = $("#correo").val();
        var contrasena = $("#contrasena").val();
        var repetir_contrasena = $("#repetir_contrasena").val();

        // Verificar que las contraseñas coincidan
        if (contrasena !== repetir_contrasena) {
            alert("Las contraseñas no coinciden");
            return;
        }

        // Realizar la petición AJAX para guardar el empleado
        $.ajax({
            url: "/app/backend/empleados.php",
            type: "POST",
            data: {
                nombre: nombre,
                apellido_paterno: apellido_paterno,
                apellido_materno: apellido_materno,
                correo: correo,
                contrasena: contrasena
            },
            success: function(response) {
                alert(response);
                // Recargar la página para mostrar el nuevo empleado en la tabla
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("Error al guardar el empleado: " + error);
            }
        });
    });

    // Otras funciones CRUD (Actualizar, Eliminar, etc.) se pueden agregar aquí
});
