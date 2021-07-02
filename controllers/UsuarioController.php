<?php

class UsuarioController
{
  static public function iniciarSesion()
  {
    if (isset($_POST["usuario"]) && !empty($_POST["usuario"])) {

      $tabla = "user";
      $item = "user";
      $value = $_POST["usuario"];

      $resultado = UsuarioModel::getUsuarios($tabla, $item, $value);
      if ($resultado["user"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]) {
        $_SESSION["idUser"] = $resultado["idUser"];
        $_SESSION["idEmpleado"] = $resultado["idEmpleado"];
        $_SESSION["user"] = $resultado["user"];
        $_SESSION["tipoUsuario"] = $resultado["tipoUsuario"];
        $_SESSION["autenticado"] = true;

        echo "<script>
                window.location = '/ventas_crack/index.php?route=home';
              </script>";
      } else {
        echo '<br><div class="alert alert-danger">Uusario o contraseña incorrecta</div>';
      }
    }
  }
}
