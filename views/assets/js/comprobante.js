// ENVENTO PARA ELIMINAR
$(function () {

  $('.btn-eliminar').click(function () {

    const idAquisicion = $(this).attr('idAquisicion')

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

          "ajax/ComprobanteAjax.php?exec=eliminarComprobante",
          {

            idAquisicion: idAquisicion
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


  //////////////////////////
  /////////////////////////
  ////////////////////////
  ///////////////////////
  //////////////////////
  /////////////////////


  ///EVENTO DE ACTUALIZAR


  $(".btn-editar").click(function () {

    // console.log("click editando");


    const idAquisicion = $(this).attr("idAquisicion");
    console.log(`idAquisicion: ${idAquisicion}`);
    $('#idAquisicion').val(idAquisicion);

    const data = new FormData();
    data.append('idAquisicion', idAquisicion);


    $.post(
      "ajax/ComprobanteAjax.php?exec=getConprobante",
      $("#formComprobante").serialize(),
      function (response) {

        $("#idAquisicion").val(response.idAquisicion);
        $("#idTipoComprobante").val(response.idTipoComprobante);
        $("#sucursal").val(response.sucursal);
        $("#vencimiento").val(response.vencimiento);
        $("#inicio").val(response.inicio);
        $("#final").val(response.final);
        $("#secuencia").val(response.secuencia);
        $("#estado").val(response.estado);
        console.log("Response: ", response);

        // return;
      },
      "json"
    );

  });

  $("#formComprobante").validate({
    invalidHandler: function (event, validator) {
      //this refers to the form

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




  $("#formComprobante").on("submit", function (e) {
    var isvalid = $("#formComprobante").valid();
    if (isvalid) {
      e.preventDefault();
      const exec = Number($('#comprobante').val()) == 0 ? 'addComprobante' : 'editComprobante';

      console.log('Exec: ', exec);
      // return;
      $.post(
        `ajax/ComprobanteAjax.php?exec=${exec}`,
        $("#formComprobante").serialize(),
        function (response) {
          // return;
          if (response.ssucess) {
            $('#formComprobante').hide();
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



});






