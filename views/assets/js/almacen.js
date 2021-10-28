$(function () {

  $('#provincia').change(function () {
    const idProvincia = $(this).val();

    console.log('valor: ', idProvincia);
    // return;
    $.get(
      "index.php?c=Contacto&m=getCiudades", { idProvincia: idProvincia, },
      function (response) {
        if (response.success) {
          $('#ciudad').html(response.html).prop('disabled', false);;
        } else {
          $('#ciudad').prop('disabled', true);
        }
      },
      "json"
    );
  });

  $('#btnRegistrar').click(function () {
    $('#tituloModal').text('Registro de Unidad');
    $('#id').val('0');
    $('#unidad').val('');
    $('#abreviatura').val('');
    $('#estado').prop('checked', true);
  });

  $(".actualizarInventario").click(function () {
    $('#tituloModal').text('Actualizacion');

    const idInventario = $(this).attr("idInventario");

    $.get(
      "index.php?c=Inventario&m=getInventario",
      {
        idInventario: idInventario,
      },
      function (response) {
        if (response.length > 0) {
          $('#id').val(response[0].idUnidad);
          $('#unidad').val(response[0].nombre);
          $('#abreviatura').val(response[0].abreviatura);
          $('#estado').prop('checked', response[0].estado);

        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ah ocurrido un error, comunique con el administrador!!",
          });
        }
      },
      "json"
    );
  });
  $(".eliminarInventario").click(function () {
    const idInventario = $(this).attr("idInventario");

    Swal.fire({
      title: "Estas seguro?",
      text: "Estas seguro que deseas eliminarlo!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Eliminarlo!",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "index.php?c=Inventario&m=eliminar",
          {
            idUnidad: idUnidad,
          },
          function (response) {
            if (response.success) {
              Swal.fire("Eliminado!", `${response.msg}`, "success").then(
                (result) => {
                  if (result.isConfirmed) {
                    location.reload();
                  }
                }
              );
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "Ah ocurrido un error, comunique con el administrador!!",
              });
            }
            console.log("Response: ", response);
          },
          "json"
        );
      }
    });
  });

  $("#registroInventario").submit(function (event) {
    event.preventDefault();

    ejecutar = Number($('#idInventario').val()) > 0 ? 'actualizarAlmacen' : 'registrarAlmacen';

    $.post(
      `index.php?c=Inventario&m=${ejecutar}`,
      $("#registroInventario").serialize(),
      function (response) {
        // return;
        if (response.success) {
          Swal.fire("Notificacion!", `${response.msg}!`, "success").then(
            (result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            }
          );
        } else {
          Swal.fire("Error!", `${response.msg}!`, "error");
        }
        $("#table1").html(response.html);
        console.log("Response: ");
      },
      "json"
    );
    console.log("prueba");
  });
});
