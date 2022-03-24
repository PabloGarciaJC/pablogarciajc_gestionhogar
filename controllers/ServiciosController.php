<?php
require_once 'model/servicio.php';
require_once 'model/registro.php';

class ServiciosController
{
  public function crear()
  {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $idRegistro = isset($_POST['idRegistro']) ? $_POST['idRegistro'] : false;
    $descripcionTabla = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    $gastosVerpa = isset($_POST['gasto']) ? $_POST['gasto'] : false;
    $diaCorte = isset($_POST['diaCorte']) ? $_POST['diaCorte'] : false;
    $status =  isset($_POST['status']) ? $_POST['status'] : false;
    for ($i = 0; $i < count($status); $i++) {
      $statu = $status[$i];
    };
    $statusTabla = 'GUARDADO';

    //Repoblar Formulario
    $form = array();
    $form["nombre"] = $nombre;
    $form["descripcionTabla"] = $descripcionTabla;
    $form["gastosVerpa"] = $gastosVerpa;
    $form["diaCorte"] = $diaCorte;
    $form["statu"] = $statu;
    $form["idRegistro"] = $idRegistro;

    //Reclutar Errores 
    $errores = array();

    //validar Datos
    if (empty(trim($descripcionTabla))) {
      $errores["descripcion"] = "el formato de mes no es el correcto!";
    }

    if (empty(trim($gastosVerpa)) || !is_numeric($gastosVerpa) || !preg_match("/[0-9]/", $gastosVerpa)) {
      $errores["$gastosVerpa"] = "el formato no es el correcto!";
    }

    if (empty(trim($diaCorte))) {
      $errores["$diaCorte"] = "el formato no es el correcto! dia corte";
    }

    //Instancio 
    $guardar = new Servicio();
    $guardar->setName($nombre);
    $guardar->setDescriptionTable($descripcionTabla);
    $guardar->setSpendingVerpa($gastosVerpa);
    $guardar->setCurtDay($diaCorte);
    $guardar->setStatus($statu);
    $guardar->setIdRegister($idRegistro);

    if (count($errores) == 0) {
      $guardar = $guardar->save();
      if ($guardar) {
        $_SESSION['nombreTabla'] = $nombre;
        $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
        header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
      } else {
        $_SESSION["form"] = $form;
        header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
      }
    } else {
      $_SESSION["errores"] = $errores;
      $_SESSION["form"] = $form;
      header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
    }
  }


  public function editar()
  {
    if (isset($_POST)) {

      $id = isset($_POST["id"]) ? $_POST["id"] : false;
      $idRegistro = isset($_POST["idRegister"]) ? $_POST["idRegister"] : false;
      $descripcionGastos = isset($_POST["descripcionGastos"]) ? $_POST["descripcionGastos"] : false;
      $gasto = isset($_POST["gasto"]) ? $_POST["gasto"] : false;
      $diaCorte = isset($_POST["diaCorte"]) ? $_POST["diaCorte"] : false;
      $status =  isset($_POST['status']) ? $_POST['status'] : false;
      for ($i = 0; $i < count($status); $i++) {
        $statu = $status[$i];
      };
      $nombre = 'Servicios';
      $statusTabla = 'EDITADO';

      //Repoblar Formulario
      $form = array();
      $form["$id"] = $id;
      $form["descripcionGastos"] = $descripcionGastos;
      $form["gasto"] = $gasto;
      $form["diaCorte"] = $diaCorte;
      $form["statu"] = $statu;

      //Reclutar Errores 
      $errores = array();

      // Validar Datos
      if (empty(trim($descripcionGastos))) {
        $errores["descripcionGastos"] = "el formato no es el correcto!";
      }

      if (empty(trim($gasto)) || !is_numeric($gasto) || !preg_match("/[0-9]/", $gasto)) {
        $errores["ingresoPablo"] = "el formato no es el correcto!";
      }

      if (empty(trim($diaCorte))) {
        $errores["diaCorte"] = "el formato no es el correcto!";
      }

      //Instancio 
      $editar = new Servicio();
      $editar->setId($id);
      $editar->setDescriptionTable($descripcionGastos);
      $editar->setSpendingVerpa($gasto);
      $editar->setCurtDay($diaCorte);
      $editar->setStatus($statu);

      if (count($errores) == 0) {

        $edit = $editar->edit();
        if ($edit) {
          $_SESSION['nombreTabla'] = $nombre;
          $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
          header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
        } else {
          $_SESSION["register"] = "failed";
          $_SESSION["form"] = $form;
          header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
        }
      } else {
        $_SESSION["errores"] = $errores;
        $_SESSION["form"] = $form;
        header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
      }
    }
  }

  public function borrar()
  {
    if (isset($_POST)) {
      $id = isset($_POST['id']) ? $_POST['id'] : false;
      $idRegistro = isset($_POST['idRegistro']) ? $_POST['idRegistro'] : false;
      $nombre = 'Servicios';
      $statusTabla = 'BORRADO';

      $delete = new Servicio();
      $delete->setId($id);

      $deletee = $delete->delete();
      if ($deletee) {
        $_SESSION['nombreTabla'] = $nombre;
        $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
        header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
      }
    }
  }

  public function repoblar()
  {
    if (isset($_GET)) {
      $servicio = new Servicio();
      $idRegistro = $_GET['id'];
      $nombre = 'Servicio';
      $descripcionTabla = "Alquiler Piso";
      $gastosVerpa = 650.000;
      $diaCorte = 'Ultimo de Cada Mes';
      $statu = 'PENDIENTE';
      $servicio->setName($nombre);
      $servicio->setDescriptionTable($descripcionTabla);
      $servicio->setSpendingVerpa($gastosVerpa);
      $servicio->setCurtDay($diaCorte);
      $servicio->setStatus($statu);
      $servicio->setIdRegister($idRegistro);
      // Guardar
      $guardarAgua = $servicio->save();

      if ($guardarAgua) {
        $idRegistro = $_GET['id'];
        $nombre = 'Servicios';
        $descripcionTabla = "Gas";
        $gastosVerpa = 22.00;
        $diaCorte = 'Cada 2 Meses';
        $statu = 'PENDIENTE';
        $servicio->setName($nombre);
        $servicio->setDescriptionTable($descripcionTabla);
        $servicio->setSpendingVerpa($gastosVerpa);
        $servicio->setCurtDay($diaCorte);
        $servicio->setStatus($statu);
        $servicio->setIdRegister($idRegistro);
        // Guardar
        $guardarLuz = $servicio->save();

        if ($guardarLuz) {
          $idRegistro = $_GET['id'];
          $nombre = 'Servicios';
          $descripcionTabla = "Luz";
          $gastosVerpa = 65.00;
          $diaCorte = '30 de Cada Mes';
          $statu = 'PENDIENTE';
          $servicio->setName($nombre);
          $servicio->setDescriptionTable($descripcionTabla);
          $servicio->setSpendingVerpa($gastosVerpa);
          $servicio->setCurtDay($diaCorte);
          $servicio->setStatus($statu);
          $servicio->setIdRegister($idRegistro);
          // Guardar
          $guardarYoigo = $servicio->save();

          if ($guardarYoigo) {
            $idRegistro = $_GET['id'];
            $nombre = 'Servicios';
            $descripcionTabla = "Yoigo - Fibra";
            $gastosVerpa = 59.00;
            $diaCorte = '4 de Cada Mes';
            $statu = 'PENDIENTE';
            $servicio->setName($nombre);
            $servicio->setDescriptionTable($descripcionTabla);
            $servicio->setSpendingVerpa($gastosVerpa);
            $servicio->setCurtDay($diaCorte);
            $servicio->setStatus($statu);
            $servicio->setIdRegister($idRegistro);
            // Guardar
            $guardarPaginaWeb = $servicio->save();

            if ($guardarPaginaWeb) {
              $idRegistro = $_GET['id'];
              $nombre = 'Servicios';
              $descripcionTabla = "Pagina Web Pablo Garcia";
              $gastosVerpa = 10.00;
              $diaCorte = '1 de Cada Mes';
              $statu = 'PENDIENTE';
              $servicio->setName($nombre);
              $servicio->setDescriptionTable($descripcionTabla);
              $servicio->setSpendingVerpa($gastosVerpa);
              $servicio->setCurtDay($diaCorte);
              $servicio->setStatus($statu);
              $servicio->setIdRegister($idRegistro);
              // Guardar
              $guardarFin = $servicio->save();

              if ($guardarFin) {
                $statusTabla = 'REPOBLADO';
                $_SESSION['nombreTabla'] = $nombre;
                $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
              }
            }
          }
        }
      }
    }
    header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
  }
}

