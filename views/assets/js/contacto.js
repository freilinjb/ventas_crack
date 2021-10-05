$(function () {

  $('#tbUsuarios').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });


  $('#btnRegistrar').click(function () {
    console.log('registrando');
    //LIMPIANDO LOS CAMPOS
    // $('#idUsuario').val('0');
    // $("#nombre").val('');
    // $("#apellido").val('');
    // $("#tipoIdentificacion").val('');
    // $("#identificacion").val('');
    // $("#sexo").val('');
    // $("#correo").val('');
    // $("#telefono").val('');
    // $("#rolModal").val('');
    // $("#usuario").val('');
    // $("#clave").val('');
    // $("#estado").val('');

    //CAMBIAR EL TIULO DEL MODAL
    // $('#titulo').html('REGISTRANDO');
  });


  /**
   * VENTO PARA ELIMINAR USUARIO
   */



  /**
   * EVENTO PARA ACTUALIZAR USUARIO
   */


  $("#formContacto").validate({
    invalidHandler: function (event, validator) {
      // 'this' refers to the form
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message =
          errors == 1
            ? "You missed 1 field. It has been highlighted"
            : "You missed " + errors + " fields. They have been highlighted";
        $("div.error span").html(message);
        $("div.error").show();
      } else {
        $("div.error").hide();
      }
    },
  });



  ////REGISTRAR


  $("#formContacto").on("submit", function (e) {
    var isvalid = $("#formContacto").valid();
    if (isvalid) {
      e.preventDefault();
      // const exec = Number($('#idUsuario').val()) == 0 ? 'registrarUsuario' : 'actualizarUsuario';

      // console.log('Exec: ', exec);
      // return;
      $.post(
        `ajax/index.php?c=Contacto&m=registrarContacto`,
        $("#formContacto").serialize(),
        function (response) {
          // return;
          if (response.ssucess) {
            $('#formContacto').hide();
            Swal.fire(
              "Notificacion!",
              `${response.msg}!`,
              "success"
            ).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })
          }
          console.log("Response: ", response);
        },
        "json"
      );

    }
  });






  ///ELIMINAR

  $('.btn-eliminar').click(function () {


    const idContacto = $(this).attr('idContacto')

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
          `ajax/index.php?c=Contacto&m=eliminarContacto`,
          {
            idContacto: idContacto
          },
          function (response) {
            // console.log(response);
            // return;
            if (response.success) {   //
              Swal.fire(
                'Eliminado!!',
                `${response.msg}`,
                'success'                     ////
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
    });



  });



  //EDITAR
  // $("#unidades").on("click", ".btn-editar", function () {
  //   console.log($(".form-control").val());

  //   const idContacto = $(this).attr("idContacto");
  //   console.log('idContacto: ', idContacto);
  //   $('#idContacto').val(idUnidad);

  //   const data = new FormData();
  //   data.append("exec", 'getContacto');
  //   data.append("idContacto", idContacto);

  //   $.ajax({
  //     url: "ajax/index.php?c=Contacto&m=actualizandoContacto",
  //     method: "POST",
  //     data: data,
  //     cache: false,
  //     contentType: false,
  //     processData: false,
  //     dataType: "json",
  //     success: function (respuesta) {
  //       console.log('editarRespuesta: ', respuesta);


  //       $("#idCategoria").val(respuesta["idContacto"]);
  //       $("#nombre").val(respuesta["nombre"]);
  //       $("#esCliente").val(respuesta["esCliente"]);
  //       $("#esProveedor").val(respuesta["esProveedor"]);
  //       $("#razonSocial").val(respuesta["razonSocial"]);
  //       $("#idTipoIdentificacion").val(respuesta["idTipoIdentificacion"]);
  //       $("#identificacion").val(respuesta["identificacion"]);
  //       $("#idTipoComprobante").val(respuesta["idTipoComprobante"]);
  //       $("#correo").val(respuesta["correo"]);
  //       $("#telefono").val(respuesta["telefono"]);
  //       $("#estado").val(respuesta["estado"]);
  //     },
  //   });
  // });

  $(".btn-editar").click(function () {
    console.log("click editando");

    //CAMBIANDO EL TITULO DEL MODAL
    // $('#titulo').html('ACTUALIZANDO');
    // return;

    const idContacto = $(this).attr("idContacto");
    console.log(`idUsuario: ${idContacto}`);
    $('#idContacto').val(idContacto);

    const data = new FormData();
    data.append('idContacto', idContacto);

    $.post(
      "ajax/index.php?c=Contacto&m=actualizandoContacto",
      $("#formContacto").serialize(),
      function (response) {

        $("#idContacto").val(response.idContacto);
        $("#nombre").val(response.nombre);
        $("#esCliente").val(response.esCliente);
        $("#esProveedor").val(response.esProveedor);
        $("#razonSocial").val(response.razonSocial);
        $("#idTipoIdentificacion").val(response.idTipoIdentificacion);
        $("#identificacion").val(response.identificacion);
        $("#idTipoComprobante").val(response.idTipoComprobante);
        $("#correo").val(response.correo);
        $("#telefono").val(response.telefono);
        $("#estado").val(response.estado);
        console.log("Response: ", response);
      },
      "json"
    );
  });








});



