<?php
require_once 'model/configuracion.php';

class estadisticas
{

  public static function banner($obtenerIdRegistro)
  {
    $configuracion = new Configuracion;
    $configuracion->setIdRegistro($obtenerIdRegistro);
    $sumaIngresos = $configuracion->sumaIngresos();

    $deudasGlobales = ($configuracion->deudasGlobales()) == 0 ? 0 : $configuracion->deudasGlobales();
    $dineroRestante = $sumaIngresos->ingresosTotales - $deudasGlobales;  

    $gastosCarrefour = ($configuracion->gastosCarrefour()) == 0 ? 0 : $configuracion->gastosCarrefour();

    $gastosServicios = ($configuracion->gastosServicios()) == 0 ? 0 : $configuracion->gastosServicios();
    $gastosDeudas = ($configuracion->gastosDeudas()) == 0 ? 0 : $configuracion->gastosDeudas();
    
    echo  "<script>document.getElementById('ingresosTotales').innerHTML=  $sumaIngresos->ingresosTotales + ' €'</script>";
    echo  "<script>document.getElementById('ahorros').innerHTML= $sumaIngresos->ahorros + ' €'</script>";
    echo  "<script>document.getElementById('deudasGlobales').innerHTML= $deudasGlobales + ' €'</script>";
    echo  "<script>document.getElementById('dineroRestante').innerHTML= $dineroRestante + ' €'</script>";
    echo  "<script>document.getElementById('gastosCarrefour').innerHTML= $gastosCarrefour + ' €'</script>";
    echo  "<script>document.getElementById('gastosServicios').innerHTML= $gastosServicios + ' €'</script>";
    echo  "<script>document.getElementById('gastosDeudas').innerHTML= $gastosDeudas + ' €'</script>";
  }
}
