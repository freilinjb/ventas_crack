$(function () {
  $("#busqueda").submit((e) => {
    e.preventDefault();

    if ($("#codigo").prop("checked")) {
      ///BUSCAR POR EL CODIGO DEL PRODUCTO
      consultarProductoCodigo();
    } else if ($("#descripcion").prop("checked")) {
      ///BUSCAR POR LA DESCRIPCION DEL PRODUCTO

      consultarProductoDescripcion();
    }
  });





});