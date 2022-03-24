<?php
require_once 'model/deuda.php';
require_once 'model/registro.php';

class DeudasController
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
        $errores["descripcion"] = "el formato de mes no es el correcto!";
      }

      if (empty(trim($gastosVerpa)) || !is_numeric($gastosVerpa) || !preg_match("/[0-9]/", $gastosVerpa)) {
        $errores["$gastosVerpa"] = "el formato no es el correcto!";
      }

      if (empty(trim($diaCorte))) {
        $errores["$diaCorte"] = "el formato no es el correcto! dia corte";
      }

      //Instancio 
      $guardar = new Deuda();
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
          var_dump($errores);
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
      $nombre = 'Deudas';
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
      $editar = new Deuda();
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
      $nombre = 'Deudas';
      $statusTabla = 'BORRADO';

      $delete = new Deuda();
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
      $Deuda = new Deuda();
      $idRegistro = $_GET['id'];
      $nombre = 'Deudas';
      $descripcionTabla = "Moto Cuota";
      $gastosVerpa = 69.36;
      $diaCorte = '5 de Cada Mes';
      $statu = 'PENDIENTE';
      $Deuda->setName($nombre);
      $Deuda->setDescriptionTable($descripcionTabla);
      $Deuda->setSpendingVerpa($gastosVerpa);
      $Deuda->setCurtDay($diaCorte);
      $Deuda->setStatus($statu);
      $Deuda->setIdRegister($idRegistro);
      // Guardar
      $guardarBbvaVerpa = $Deuda->save();

      if($guardarBbvaVerpa){
        $idRegistro = $_GET['id'];
        $nombre = 'Deudas';
        $descripcionTabla = "Prestamo BBVA Pablo y Vero";
        $gastosVerpa = 64.90;
        $diaCorte = '1 de Cada Mes';
        $statu = 'PENDIENTE';
        $Deuda->setName($nombre);
        $Deuda->setDescriptionTable($descripcionTabla);
        $Deuda->setSpendingVerpa($gastosVerpa);
        $Deuda->setCurtDay($diaCorte);
        $Deuda->setStatus($statu);
        $Deuda->setIdRegister($idRegistro);
        // Guardar
        $guardarTdcVero = $Deuda->save();

        if($guardarTdcVero){
          $idRegistro = $_GET['id'];
          $nombre = 'Deudas';
          $descripcionTabla = "Tarjeta de BBVA de Vero";
          $gastosVerpa = 59.00;
          $diaCorte = '5 de Cada Mes';
          $statu = 'PENDIENTE';
          $Deuda->setName($nombre);
          $Deuda->setDescriptionTable($descripcionTabla);
          $Deuda->setSpendingVerpa($gastosVerpa);
          $Deuda->setCurtDay($diaCorte);
          $Deuda->setStatus($statu);
          $Deuda->setIdRegister($idRegistro);
          // Guardar
          $guardarFin = $Deuda->save();

          if($guardarFin){
            $idRegistro = $_GET['id'];
            $nombre = 'Deudas';
            $descripcionTabla = "Seguro dental Vero";
            $gastosVerpa = 11.00;
            $diaCorte = 'Ultimo de Cada Mes';
            $statu = 'PENDIENTE';
            $Deuda->setName($nombre);
            $Deuda->setDescriptionTable($descripcionTabla);
            $Deuda->setSpendingVerpa($gastosVerpa);
            $Deuda->setCurtDay($diaCorte);
            $Deuda->setStatus($statu);
            $Deuda->setIdRegister($idRegistro);
          }

          if($guardarFin){
            $statusTabla = 'REPOBLADO';
            $_SESSION['nombreTabla'] = $nombre;
            $_SESSION["mensajeTabla"] = "Tabla <strong>$nombre</strong> se ha <strong>$statusTabla</strong> con EXITO";
          }
        }
      }
    }
    header("Location:" . base_url . 'Registro/historial&id=' . $idRegistro);
  }
}


