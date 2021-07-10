$(function () {
  // $(document).ready(function () {
  //   //$(selector).inputmask("99-9999999");  //static mask
  //   $("#identificacion").inputmask({ mask: "999-9999999-9" });
  //   $("#telefono").inputmask({ mask: "(999) 999-9999" }); //specifying options
  //   $("#celular").inputmask({ mask: "(999) 999-9999" }); //specifying options
  // });

  //VALIDACION
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert("Form successful submitted!");
      },
    });

    $("#formProducto").validate({
      rules: {

        codigo: {
          required: true,
          minlength: 2,
        },
        nombre: {
          required: true,
        },
        categoria: {
          required: true,
        },
        marca: {
          required: true,
        },
        unidad: {
          required: true,
        },
        descripcion: {
          required: true,
        },
        stockIni: {
          required: true,
        },
        stockMini: {
          required: true,
        },
        reorden: {
          required: true,
        },
        itbis: {
          required: true,
          required: true,
        },
        precioCompra: {
          required: true,
        },
        precioVenta: {
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

        if (Number($('#idProducto').val()) > 0) {
          dato.append("exec", 'actualizandoProducto');
          dato.append("idProducto", Number($('#idProducto').val()));
          console.log('actualizandoProducto');
        } else {
          dato.append("exec", 'registrarProducto');
          console.log('registrarProducto');
        }

        //return;
        // dato.append("exec", 'registrarEmpleado');
        dato.append("codigo", $("#codigo").val());
        dato.append("nombre", $("#nombre").val());
        dato.append("idCategoria", $("#categoria").val());
        dato.append("idSubcategoria", $("#subcategoria").val());
        dato.append("idMarca", $("#marca").val());
        dato.append("idUnidad", $("#unidad").val());
        dato.append("descripcion", $("#descripcion").val());
        dato.append("stockIni", $("#stockIni").val());
        dato.append("stockMini", $("#stockMini").val());
        dato.append("reorden", $("#reorden").val());
        dato.append("itbis", $("#itbis").val());
        dato.append("precioCompra", $("#precioCompra").val());
        dato.append("precioVenta", $("#precioVenta").val());
        dato.append("estado", $("#estado").val());

        console.log('daara: ', dato);
        $.ajax({
          url: "ajax/ProductoAjax.php",
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
            $("#codigo").val("");
            $("#nombre").val("");
            $("#categoria").val(0);
            $("#subcategoria").val(0);
            $("#marca").val(0);
            $("#unidad").val(0);
            $("#descripcion").val("");
            $("#stockIni").val("");
            $("#stockMini").val("");
            $("#reorden").val("");
            $("#itbis").val("");
            $("#precioCompra").val("");
            $("#precioVenta").val("");
            $("#creado_por").val("");
            $("#estado").val(1);
          },
        });
      },
    });
  });

  //SETEA EL CAMPO DE IDPRODUCTO que esta oculto
  $('#registrarProducto').click(function () {
    $("#idEmpleado").val("0");
    $("#codigo").val("");
    $("#nombre").val("");
    $("#categoria").val(0);
    $("#subcategoria").val(0);
    $("#marca").val(0);
    $("#unidad").val(0);
    $("#descripcion").val("");
    $("#stockIni").val("");
    $("#stockMini").val("");
    $("#reorden").val("");
    $("#itbis").val("");
    $("#precioCompra").val("");
    $("#precioVenta").val("");
    $("#creado_por").val("");
    $("#estado").val(1);
    console.log('click');
  });

  //ELIMINAR PRODUCTO
  $("#producto").on("click", ".btn-eliminar", function () {
    const idProducto = $(this).attr("idProducto");
    console.log('idProducto: ', idProducto);
    Swal.fire({
      title: 'Estas seguro?',
      text: "Desea eliminar este el producto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminarlo !',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        const data = new FormData();
        data.append("exec", 'eliminarProducto');
        data.append("idProducto", idProducto);

        $.ajax({
          url: "ajax/ProductoAjax.php",
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
                'El Producto ha sido eliminado de forma correcta.',
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



  //EDITAR PRODUCTO
  $("#producto").on("click", ".btn-editar", function () {
    console.log($(".form-control").val());

    const idProducto = $(this).attr("idProducto");
    console.log('idProducto: ', idProducto);
    $('#idProducto').val(idProducto);

    const data = new FormData();
    data.append("exec", 'getProducto');
    data.append("idProducto", idProducto);

    $.ajax({
      url: "ajax/ProductoAjax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        console.log('editarRespuesta: ', respuesta);


        $("#idProducto").val(respuesta["idProducto"]);
        $("#codigo").val(respuesta["codigo"]);
        $("#categoria").val(Number(respuesta["idCategoria"]));
        $("#subcategoria").val(Number(respuesta["idSubcategoria"]));
        $("#marca").val(Number(respuesta["idMarca"]));
        $("#unidad").val(Number(respuesta["idUnidad"]));
        $("#descripcion").val(respuesta["descripcion"]);
        $("#stockIni").val(Number(respuesta["stockIni"]));
        $("#stockMini").val(respuesta["stockMini"]);
        $("#reorden").val(respuesta["Correo"]);
        $("#itbis").val(respuesta["itbis"]);
        $("#precioCompra").val(respuesta["precioCompra"]);
        $("#precioVenta").val(respuesta["precioVenta"]);
        $("#creado_por").val(respuesta["creado_por"]);
        $("#estado").val(respuesta["estado"]);
      },
    });
  });
});
