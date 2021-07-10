
//VALIDACION
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert("Form successful submitted!");
    },
  });

  $("#formProvedor").validate({
    rules: {

      nombre: {
        required: true,
        minlength: 2,
      },
      RNC: {
        required: true,
      },
      correo: {
        email: true,
      },
      telefono: {
        required: true,
      },
      provincia: {
        required: true,
      },
      ciudad: {
        required: true,
      },
      direccion: {
        required: true,
      },
      observacion: {
        required: true,
      },
      telefono: {
        required: true,
      },
      estado: {
        required: true,
      },

    },


    messages: {
      terms: "Please accept our terms",  ///por favor acepte los terminos
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

      if (Number($('#idProvedor').val()) > 0) {
        dato.append("exec", 'actualizandoProvedor');
        dato.append("idProvedor", Number($('#idProvedor').val()));
        console.log('actualizandoProvedor');
      } else {
        dato.append("exec", 'registrarProvedor');
        console.log('registrarProvedor');
      }

      //return;
      // dato.append("exec", 'registrarProvedor');
      dato.append("nombre", $("#nombre").val());
      dato.append("RNC", $("#RNC").val());
      dato.appendRNC("correo", $("#correo").val());
      dato.append("telefono", $("#telefono").val());
      dato.append("provincia", $("#provincia").val());
      dato.append("ciudad", $("#ciudad").val());
      dato.append("direccion", $("#direccion").val());
      dato.append("Observacion", $("#Observacion").val());
      dato.append("estado", $("#estado").val());

      console.log('daara: ', dato);
      $.ajax({
        url: "ajax/ProvedorAjax.php",
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

          $('#idProvedor').val(0);
          $("#nombre").val("");
          $("#RNC").val("");
          $("#correo").val(0);
          $("#telefono").val(0);
          $("#provincia").val("");
          $("#ciudad").val("");
          $("#direccion").val("");
          $("#Observacion").val("");
          $("#estado").val(1);
        },
      });
    },
  });
});

//SETEA EL CAMPO DE idProvedor que esta oculto
$('#registroProvedor').click(function () {
  $('#idProvedor').val(0);
  $("#nombre").val("");
  $("#RNC").val("");
  $("#correo").val(0);
  $("#telefono").val(0);
  $("#provincia").val("");
  $("#ciudad").val("");
  $("#direccion").val("");
  $("#Observacion").val("");
  $("#estado").val(1);
  console.log('click');
});

//ELIMINAR EMPLEADO
$("#provedor").on("click", ".btn-eliminar", function () {
  const idProvedor = $(this).attr("idProvedor");
  console.log('idProvedor: ', idProvedor);
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
      data.append("exec", 'eliminarProvedor');
      data.append("idProvedor", idProvedor);

      $.ajax({
        url: "ajax/ProvedorAjax.php",
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
              'El Provedor ha sido eliminado de forma correcta.',
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



//EDITAR provedor
$("#provedor").on("click", ".btn-editar", function () {
  console.log($(".form-control").val());

  const idProvedor = $(this).attr("idProvedor");
  console.log('idProvedor: ', idProvedor);
  $('#idProvedor').val(idProvedor);

  const data = new FormData();
  data.append("exec", 'getProvedor');
  data.append("idProvedor", idProvedor);

  $.ajax({
    url: "ajax/ProvedorAjax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log('editarRespuesta: ', respuesta);


      $("#idProvedor").val(respuesta["idProvedor"]);
      $("#nombre").val(respuesta["nombre"]);
      $("#RNC").val(respuesta["RNC"]);
      $("#correo").val((respuesta["correo"]));
      $("#telefono").val(Number(respuesta["telefono"]));
      $("#provincia").val(Number(respuesta["provincia"]));
      $("#ciudad").val(Number(respuesta["ciudad"]));

      $("#direccion").val(respuesta["direccion"]);
      $("#Observacion").val(respuesta["Observacion"]);
      $("#estado").val(respuesta["estado"]);




    },
  });
});
// });
