$(function () {
  jQuery(document).ready(function () {
    // console.log("Hola");

    const registrarEmpleado = () => {

    const data = new FormData();
    data.append("nombre", $("nombre").val());
    data.append("apellido", $("apellido").val());
    data.append("sexo", $("sexo").val());
    data.append("identificacion", $("identificacion").val());
    data.append("usuario", $("usuario").val());
    data.append("tipoUsuario", $("tipoUsuario").val());
    data.append("telefono", $("telefono").val());
    data.append("fechaNacimiento", $("fechaNacimiento").val());
    data.append("estado", $("estado").val());

    console.log("prueba...");
    // $.ajax({
    //   url: "ajax/empleadoAjax.php",
    //   method: "POST",
    //   data: data,
    //   cache: false,
    //   dataType: "json",
    //   success: function (respuesta) {
    //     console.log("respuesta: ", respuesta);
    //   }
    // })


    $("#tableEmpleado tbody").on("click", "button.btn-editar", function () {
      console.log("hola editar");
      const idEmpleado = $(this).attr("idEmpleado");
      console.log("idEmpleado: ", idEmpleado);
      $("#tituloModel").text("Editar Empleado");
      $("#idEmpleadoEditar").val(idEmpleado);
      $("#fechaNacimiento").val("2021-05-23");
    });

    $("#nuevoEmpleado").click(function () {
      console.log("Nuevo Emplead");
      $("#tituloModel").text("Nuevo empleado");
      $("#idEmpleadoEditar").val("0");
      $("#idEmpleadoEditar").text(" ");
    });

    $("#tableEmpleado tbody").on("click", "button.btn-eliminar", function () {
      console.log("hola editar");
      const idEmpleado = $(this).attr("idEmpleado");
      console.log("idEmpleado: ", idEmpleado);
    });
  });
});
