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
      $statusTabla = 'Borrado';

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

    echo 'hola';
    // $idRegistro = $_GET['id'];
    // $getAllCarrefoursRepoblar = new Carrefour();
    // $getAllCarrefoursRepoblar->setId($idRegistro);

    // $_SESSION['getAllCarrefourRepoblar'] = $getAllCarrefoursRepoblar->getRegister();

    // while ($getAllCarrefourR = $_SESSION['getAllCarrefourRepoblar']->fetch_object()) {
    //   echo $_SESSION['getAllCarrefourR'] = $getAllCarrefourR->description_table, "<br>";
    // }

    //   // echo $_SESSION['nameCarrefourR'] = $getAllCarrefourR->name_carrefour, "<br>" ;
    //   echo $_SESSION['descripcionCarrefourR'] = $_SESSION['getAllCarrefourR']->description_table, "<br>";
    //   echo $_SESSION['spendingCarrefourR'] = $_SESSION['getAllCarrefourR']->spending_verpa, "<br>";
    //   echo $_SESSION['curtDayCarrefourR'] = $_SESSION['getAllCarrefourR']->curt_day, "<br>";
    //   echo $_SESSION['statusCarrefourR'] = $_SESSION['getAllCarrefourR']->status, "<br>";

    //  /*  echo $getAllCarrefourR->name_carrefour;
    //   echo $getAllCarrefourR->description_table;
    //   echo $getAllCarrefourR->spending_verpa;
    //   echo  $getAllCarrefourR->curt_day;
    //   echo $getAllCarrefourR->status; */
 
  }
}
