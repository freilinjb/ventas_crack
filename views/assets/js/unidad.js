$(function () {

  //VALIDACION
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert("Form successful submitted!");
      },
    });

    $("#formUnidad").validate({
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
        let idUnidad = 0;
        idUnidad = Number($('#idUnidad').val());

        if (idUnidad > 0) {
          dato.append("exec", 'actualizandoUnidad');
          dato.append("idUnidad", Number($('#idUnidad').val()));
          console.log('actualizandoEmpleado');
        } else {
          dato.append("exec", 'registrarUnidad');
          console.log('registrarUnidad');
        }

        // return;
        // dato.append("exec", 'registrarEmpleado');
        dato.append("nombre", $("#nombre").val());
        dato.append("estado", $("#estado").val());

        console.log('daara: ', dato);
        $.ajax({
          url: "ajax/UnidadAjax.php",
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
              Swal.fire("Ok!", `${idUnidad > 0 ? 'Se ha actualizado correctamente!' : 'Se ha guardado correctamente!'}`, "success").then((result) => {
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

            $("#idUnidad").val("0");
            $("#nombre").val("");
            $("#estado").val(1);
          },
        });
      },
    });
  });

  //SETEA EL CAMPO DE idUnidad que esta oculto
  $('#registrarUnidad').click(function () {
    $('#idUnidad').val(0);
    $("#nombre").val("");
    $("#estado").val(1);
    console.log('click');
  });





  //ELIMINAR UNIDAD

  $('.btn-eliminar').click(function () {

    const idUnidad = $(this).attr('idUnidad')

    Swal.fire({
      title: 'Seguro ?',
      text: 'Seguro que quiere Elminarl@!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminarlo!',
      cancelButtonText: 'Cancelar'

    }).then((result) => {
      if (result.isConfirmed) {

        $.post(
          // console.log('llegamos qui'),

          "ajax/UnidadAjax.php?exec=eliminarUnidad",

          console.log('llegamos qui'),
          {

            idUnidad: idUnidad
          },
          function (response) {

            if (response.sucess === true) {   //Verificar bien ese ssucess o sucess
              Swal.fire(
                'Eliminado!!',
                `${response.msg}`,
                'sucess'                     ////
              ).then((result) => {
                if (result.isConfirmed) {
                  location.reload();
                }
              })
            } else {
              Swal.fire({
                icon: 'Error',
                title: 'Error',
                text: 'Ah Oocurrido un bobo, Comuniquese con El Crack!!',
              })
            }
            console.log("Response: ", response);

          },
          "json"
        );
      }
    })
  });






  //EDITAR EMPLEADOS
  $("#unidades").on("click", ".btn-editar", function () {
    console.log($(".form-control").val());

    const idUnidad = $(this).attr("idUnidad");
    console.log('idUnidad: ', idUnidad);
    $('#idUnidad').val(idUnidad);

    const data = new FormData();
    data.append("exec", 'getUnidad');
    data.append("idUnidad", idUnidad);

    $.ajax({
      url: "ajax/UnidadAjax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log('editarRespuesta: ', respuesta);


        $("#idCategoria").val(respuesta["idUnidad"]);
        $("#nombre").val(respuesta["unidad"]);
        $("#estado").val(respuesta["estado"]);
      },
    });
  });
});
