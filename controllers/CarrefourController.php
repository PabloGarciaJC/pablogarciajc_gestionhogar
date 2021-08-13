<?php
require_once 'model/carrefour.php';
require_once 'model/registro.php';

class CarrefourController
{
  public function crear()
  {
    if (isset($_POST)) {

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
        $errores["descripcion"] = "el formato de Descripcion no es el correcto!";
      }

      if (empty(trim($gastosVerpa)) || !is_numeric($gastosVerpa) || !preg_match("/[0-9]/", $gastosVerpa)) {
        $errores["$gastosVerpa"] = "el formato no es el correcto!";
      }

      if (empty(trim($diaCorte))) {
        $errores["$diaCorte"] = "el formato no es el correcto! dia corte";
      }

      //Instancio 
      $guardar = new Carrefour();
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
          $_SESSION["errores"] = $errores;
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
      $nombre = 'Carrefour';
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
      //Instancio:
      $editar = new Carrefour();
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
          $_SESSION["errores"] = $errores;
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
      $nombre = 'Carrefour';
      $statusTabla = 'BORRADO';

      $delete = new Carrefour();
      $delete->setId($id);

      $deletee = $delete->delete();
      if ($deletee) {
        $_SESSION['nombreTabla'] = $nombre;
        $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
      }
      header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
    }
  }

  public function repoblar()
  {
    if (isset($_GET)) {
      $carrefour = new Carrefour();
      $idRegistro = $_GET['id'];
      $nombre = 'Carrefour';
      $descripcionTabla = "Mercado Familiar Verpa";
      $gastosVerpa = 300.00;
      $diaCorte = '21 de Cada Mes';
      $statu = 'PENDIENTE';
      $carrefour->setName($nombre);
      $carrefour->setDescriptionTable($descripcionTabla);
      $carrefour->setSpendingVerpa($gastosVerpa);
      $carrefour->setCurtDay($diaCorte);
      $carrefour->setStatus($statu);
      $carrefour->setIdRegister($idRegistro);
      // Guardar
      $guardarPiensoRocco = $carrefour->save();

      if($guardarPiensoRocco){
        $idRegistro = $_GET['id'];
        $nombre = 'Carrefour';
        $descripcionTabla = "Pienso Rocco";
        $gastosVerpa = 40.00;
        $diaCorte = '21 de Cada Mes';
        $statu = 'PENDIENTE';
        $carrefour->setName($nombre);
        $carrefour->setDescriptionTable($descripcionTabla);
        $carrefour->setSpendingVerpa($gastosVerpa);
        $carrefour->setCurtDay($diaCorte);
        $carrefour->setStatus($statu);
        $carrefour->setIdRegister($idRegistro);
        // Guardar
        $guardarNexfli = $carrefour->save();

        if($guardarNexfli){
          $idRegistro = $_GET['id'];
          $nombre = 'Carrefour';
          $descripcionTabla = "Nexfli";
          $gastosVerpa = 4.99;
          $diaCorte = '2 de Cada Mes';
          $statu = 'PENDIENTE';
          $carrefour->setName($nombre);
          $carrefour->setDescriptionTable($descripcionTabla);
          $carrefour->setSpendingVerpa($gastosVerpa);
          $carrefour->setCurtDay($diaCorte);
          $carrefour->setStatus($statu);
          $carrefour->setIdRegister($idRegistro);
          // Guardar
          $guardarSpotify = $carrefour->save();

          if($guardarSpotify){
            $idRegistro = $_GET['id'];
            $nombre = 'Carrefour';
            $descripcionTabla = "Spotify";
            $gastosVerpa = 3.49;
            $diaCorte = '26 de Cada Mes';
            $statu = 'PENDIENTE';
            $carrefour->setName($nombre);
            $carrefour->setDescriptionTable($descripcionTabla);
            $carrefour->setSpendingVerpa($gastosVerpa);
            $carrefour->setCurtDay($diaCorte);
            $carrefour->setStatus($statu);
            $carrefour->setIdRegister($idRegistro);
            // Guardar
            $guardarMercadoPadresPablo = $carrefour->save();

            if($guardarMercadoPadresPablo){
              $idRegistro = $_GET['id'];
              $nombre = 'Carrefour';
              $descripcionTabla = "Mercado Padres Pablo";
              $gastosVerpa = 130.00;
              $diaCorte = '21 de Cada Mes';
              $statu = 'PENDIENTE';
              $carrefour->setName($nombre);
              $carrefour->setDescriptionTable($descripcionTabla);
              $carrefour->setSpendingVerpa($gastosVerpa);
              $carrefour->setCurtDay($diaCorte);
              $carrefour->setStatus($statu);
              $carrefour->setIdRegister($idRegistro);
              // Guardar
              $guardarFin = $carrefour->save();

              if($guardarFin){
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
