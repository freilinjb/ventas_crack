$(function () {
  $(document).ready(function () {
    //$(selector).inputmask("99-9999999");  //static mask
    $("#identificacion").inputmask({ mask: "999-9999999-9" });
    $("#telefono").inputmask({ mask: "(999) 999-9999" }); //specifying options
    $("#celular").inputmask({ mask: "(999) 999-9999" }); //specifying options
  });

  //VALIDACION
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert("Form successful submitted!");
      },
    });

    $("#formEmployee").validate({
      rules: {

        nombre: {
          required: true,
          minlength: 2,
        },
        apellido: {
          required: true,
        },
        apellido: {
          required: true,
        },
        sexo: {
          required: true,
        },
        identificacion: {
          required: true,
        },
        usuario: {
          required: true,
        },
        clave: {
          required: true,
        },
        tipoUsuario: {
          required: true,
        },
        telefono: {
          required: true,
        },
        correo: {
          required: true,
          email: true,
        },
        fechaNacimiento: {
          required: true,
        },
        estado: {
          required: true,
        },
      },
      messages: {
        terms: "Please accept our terms",
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },

      submitHandler: function (e) {
        console.log('evento: ', e);
        const dato = new FormData();

        if (Number($('#idEmpleado').val()) > 0) {
          dato.append("exec", 'actualizandoEmpleado');
          dato.append("idEmpleado", Number($('#idEmpleado').val()));
          console.log('actualizandoEmpleado');
        } else {
          dato.append("exec", 'registrarEmpleado');
          console.log('registrarEmpleado');
        }

        //return;
        // dato.append("exec", 'registrarEmpleado');
        dato.append("nombre", $("#nombre").val());
        dato.append("apellido", $("#apellido").val());
        dato.append("idSexo", $("#sexo").val());
        dato.append("identificacion", $("#identificacion").val());
        dato.append("user", $("#usuario").val());
        dato.append("clave", $("#clave").val());
        dato.append("idTipoUser", $("#tipoUsuario").val());
        dato.append("telefono", $("#telefono").val());
        dato.append("correo", $("#correo").val());
        dato.append("fechaNaci", $("#fechaNacimiento").val());
        dato.append("estado", $("#estado").val());

        console.log('daara: ', dato);
        $.ajax({
          url: "ajax/EmpleadoAjax.php",
          method: "POST",
          data: dato,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            if (Number(respuesta.status) == 200) {
              Swal.fire("Ok!", "Se ha guardado correctamente!", "success").then((result) => {
                location.reload();
              });
            } else {
              Swal.fire("Ok!", "Ah ocurrido un error!", "error").then((result) => {
                location.reload();
              });
            }

            // console.log(respuesta.status);
            $(".form-control").val("");
            $("#close").click();

            $("#idEmpleado").val("0");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#sexo").val(0);
            $("#identificacion").val("");
            $("#usuario").val("");
            $("#clave").val("");
            $("#tipoUsuario").val(0);
            $("#telefono").val("");
            $("#Correo").val("");
            $("#fechaNacimiento").val("");
            $("#estado").val(1);
          },
        });
      },
    });
  });

  //SETEA EL CAMPO DE idEmpleado que esta oculto
  $('#registroCliente').click(function () {
    $('#idEmpleado').val(0);
    $("#nombre").val("");
    $("#apellido").val("");
    $("#sexo").val(0);
    $("#identificacion").val("");
    $("#usuario").val("");
    $("#clave").val("");
    $("#tipoUsuario").val(0);
    $("#telefono").val("");
    $("#Correo").val("");
    $("#fechaNacimiento").val("");
    $("#estado").val(1);
    console.log('click');
  });

  //ELIMINAR EMPLEADO
  $("#empleados").on("click", ".btn-eliminar", function () {
    const idEmpleado = $(this).attr("idEmpleado");
    console.log('idEmpleado: ', idEmpleado);
    Swal.fire({
      title: 'Estas seguro?',
      text: "Desea eliminar este empleado!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminarlo !',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        const data = new FormData();
        data.append("exec", 'eliminarEmpleado');
        data.append("idEmpleado", idEmpleado);

        $.ajax({
          url: "ajax/EmpleadoAjax.php",
          method: "POST",
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            if (Number(respuesta.status) == 200) {
              Swal.fire(
                'Eliminado!',
                'El empleado ha sido eliminado de forma correcta.',
                'success'
              ).then((result) => {
                location.reload();
              })
            } else {
              Swal.fire("Ok!", "Ah ocurrido un error!", "error").then((result) => {
                location.reload();
              });
            }
          },
        });
      }
    });
  });



  //EDITAR EMPLEADOS
  $("#empleados").on("click", ".btn-editar", function () {
    console.log($(".form-control").val());

    const idEmpleado = $(this).attr("idEmpleado");
    console.log('idEmpleado: ', idEmpleado);
    $('#idEmpleado').val(idEmpleado);

    const data = new FormData();
    data.append("exec", 'getEmpleado');
    data.append("idEmpleado", idEmpleado);

    $.ajax({
      url: "ajax/EmpleadoAjax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log('editarRespuesta: ', respuesta);


        $("#idEmpleado").val(respuesta["idEmpleado"]);
        $("#nombre").val(respuesta["nombre"]);
        $("#apellido").val(respuesta["apellido"]);
        $("#sexo").val(Number(respuesta["idSexo"]));
        $("#identificacion").val(respuesta["identificacion"]);
        $("#usuario").val(respuesta["user"]);
        $("#clave").val(respuesta["clave"]);
        $("#tipoUsuario").val(Number(respuesta["idTipoUser"]));
        $("#telefono").val(respuesta["telefono"]);
        $("#correo").val(respuesta["correo"]);
        $("#fechaNacimiento").val(respuesta["fechaNaci"]);
        $("#estado").val(respuesta["estado"] == 'Activo' ? 1 : 0);
      },
    });
  });
});
