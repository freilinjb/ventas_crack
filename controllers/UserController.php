<?php

class UserController
{

    static public function login()
    {

        if (isset($_POST["usuario"]) && !empty($_POST["usuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])
            ) {

                $table = "user";
                $item = "user";
                $value = $_POST["usuario"];

                $resquest = UserModel::showUsers($item, $value);

                // print_r($resquest);
                // print_r($_POST);
                // die;

                if ($resquest["user"] == $_POST["usuario"] && $resquest["clave"] == $_POST["clave"]) {

                    $_SESSION['iniciarSesion'] = true;
                    $_SESSION['idUser'] = $resquest["idUser"];
                    $_SESSION['nombre'] =  $resquest["nombre"];;
                    $_SESSION['user'] = $_POST["usuario"];
                    $_SESSION['nombre'] = $resquest["nombre"];
                    $_SESSION['tipoUsuario'] = $resquest["tipoUsuario"];
                    echo '<script>

								window.location = "index.php?route=clientes";

						</script>';
                } else {
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                }
            }
        }
    }

    static public function mostrarUsuarios($item, $value)
    {
        $table = "usuarios_v";
        $request = UserModel::showUsers($table, $item, $value);

        return $request;
    }

    static public function registrarUsuario()
    {

        if (isset($_POST["usuario"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["usuario"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["clave"]) &&
                preg_match('/^[0-9]+$/', $_POST["idEmpleado"]) &&
                preg_match('/^[0-9]+$/', $_POST["idEstado"])
            ) {

                $datos = array(
                    "usuario" => $_POST["usuario"],
                    "clave" => $_POST["clave"],
                    "idEmpleado" => $_POST["idEmpleado"],
                    "idEstado" => $_POST["idEstado"]
                );

                $respuesta = UserModel::registrarUsuario($datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "La categoría ha sido guardada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                            }).then(function(result){
                                if (result.value) {
                                    window.location = "categorias";
                                }
                            })
                        </script>';
                } else {
                    echo '<script>
                        swal({
                                type: "error",
                                title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){
                                if (result.value) {
                                    window.location = "categorias";
                                } 
                        })
                            </script>';
                }
            }
        }
    }
}
