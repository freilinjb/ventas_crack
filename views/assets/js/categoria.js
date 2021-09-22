$(function () {

  //VALIDACION
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert("Form successful submitted!");
      },
    });

    $("#formCategoria").validate({
      rules: {

        nombre: {
          required: true,
          minlength: 2,
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
        // console.log('evento: ', e);
        const dato = new FormData();
        let idCategoria = 0;
        idCategoria = Number($('#idCategoria').val());

        if (idCategoria > 0) {
          dato.append("exec", 'actualizandoCategoria');
          dato.append("idCategoria", Number($('#idCategoria').val()));
          console.log('actualizandoEmpleado');
        } else {
          dato.append("exec", 'registrarCategoria');
          console.log('registrarCategoria');
        }

        //return;
        // dato.append("exec", 'registrarEmpleado');
        dato.append("nombre", $("#nombre").val());
        dato.append("estado", $("#estado").val());

        console.log('daara: ', dato);
        $.ajax({
          url: "ajax/CategoriaAjax.php",
          method: "POST",
          data: dato,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            console.log('respuesta: ', respuesta);
            // return;
            if (respuesta == true) {
              Swal.fire("Ok!", `${idCategoria > 0 ? 'Se ha actualizado correctamente!' : 'Se ha guardado correctamente!'}`, "success").then((result) => {
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

            $("#idCategoria").val("0");
            $("#nombre").val("");
            $("#estado").val(1);
          },
        });
      },
    });
  });

  //SETEA EL CAMPO DE idEmpleado que esta oculto
  $('#registrarCategoria').click(function () {
    $('#idCategoria').val(0);
    $("#nombre").val("");
    $("#estado").val(1);
    console.log('click');
  });

  //ELIMINAR EMPLEADO
  $("#categoria").on("click", ".btn-eliminar", function () {
    const idCategoria = $(this).attr("idCategoria");
    console.log('idCategoria: ', idCategoria);
    Swal.fire({
      title: 'Estas seguro?',
      text: "Desea eliminar !",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminarlo !',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        const data = new FormData();
        data.append("exec", 'eliminarCategoria');
        data.append("idCategoria", idCategoria);

        $.ajax({
          url: "ajax/CategoriaAjax.php",
          method: "POST",
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function (respuesta) {
            console.log(respuesta);
            if (respuesta.success) {
              Swal.fire(
                'Eliminado!',
                `${respuesta.msg}.`,
                'success'
              ).then((result) => {
                location.reload();
              })
            } else {
              Swal.fire("Ok!", `${respuesta.msg}.`, "warning").then((result) => {
                location.reload();
              });
            }
          },
          error: function () {
            Swal.fire("Ok!", "Ah ocurrido un error", "error").then((result) => {
              location.reload();
            });
          }
        });
      }
    });
  });



  //EDITAR categoria
  $("#categoria").on("click", ".btn-editar", function () {
    console.log($(".form-control").val());

    const idCategoria = $(this).attr("idCategoria");
    console.log('idCategoria: ', idCategoria);
    $('#idCategoria').val(idCategoria);

    const data = new FormData();
    data.append("exec", 'getCategoria');
    data.append("idCategoria", idCategoria);

    $.ajax({
      url: "ajax/CategoriaAjax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log('editarRespuesta: ', respuesta);


        $("#idCategoria").val(respuesta["idCategoria"]);
        $("#nombre").val(respuesta["categoria"]);
        // $("#apellido").val(respuesta["apellido"]);
        // $("#sexo").val(Number(respuesta["idSexo"]));
        // $("#identificacion").val(respuesta["identificacion"]);
        // $("#usuario").val(respuesta["usuario"]);
        // $("#clave").val(respuesta["clave"]);
        // $("#tipoUsuario").val(Number(respuesta["idTipoUsuario"]));
        // $("#telefono").val(respuesta["telefono"]);
        // $("#Correo").val(respuesta["Correo"]);
        // $("#fechaNacimiento").val(respuesta["fechaNacimiento"]);
        $("#estado").val(respuesta["estado"]);
      },
    });
  });
});
