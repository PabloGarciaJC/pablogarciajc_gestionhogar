<?php
require_once 'model/deuda.php';
require_once 'model/registro.php';

class DeudasController
{

  /*   public function ajax()
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
      if (empty(trim($descripcionTabla)) || is_numeric($descripcionTabla) || preg_match("/[0-9]/",  $descripcionTabla)) {
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
          $_SESSION["register"] = "complete";
          $_SESSION["mensaje"] = "Registro Guardado con Exito!";                    
        } else {
          $_SESSION["register"] = "failed";
          $_SESSION["form"] = $form;
        }
      } else {
        $_SESSION["errores"] = $errores;
        $_SESSION["form"] = $form;
      }
    }
  } */

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
      $statusTabla = 'Guardado';

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
      $statusTabla = 'Editado';

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
      $statusTabla = 'Borrado';

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
}
