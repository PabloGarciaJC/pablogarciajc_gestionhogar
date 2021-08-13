<?php

class Utils
{

  public static function mostrarError($errores, $campo)
  {
    $alerta = '';

    if (isset($errores[$campo]) && !empty($campo)) {
      $alerta = "<div class='valid_form'>" . $errores[$campo] . "</div>";
    }
    return $alerta;
  }

  public static function borrarErrores()
  {
    $_SESSION["mensajeTabla"] = null;
    $_SESSION["nombreTabla"] = null; 
    $_SESSION["mensajeTablaExito"] = null; 
    $_SESSION["mensajeTablaError"] = null; 
    $_SESSION["bannerTwo"] = null; 
   
  }
}
