<?php
require_once 'model/registro.php';
require_once 'model/carrefour.php';
require_once 'model/servicio.php';
require_once 'model/deuda.php';

class RegistroController
{
  public function index()
  {
    $register = new registro();
    $getRegistersAll = $register->getAll();
    $getServicesAllEdit = $register->getAll();
    $getServicesAllDelete = $register->getAll();
    require_once 'views/layout/banner.php';
    require_once 'views/layout/sidebar.php';
    require_once 'views/registro/list.php';
  }

  public function crear()
  {
    if (isset($_POST)) {

      $ingresoVeronica = isset($_POST["ingresoVeronica"]) ? $_POST["ingresoVeronica"] : false;
      $ingresoPablo = isset($_POST["ingresoPablo"]) ? $_POST["ingresoPablo"] : false;
      $ingresoExtra = isset($_POST["ingresoExtra"]) ? $_POST["ingresoExtra"] : false;
      $ahorrosVerpa = isset($_POST["ahorrosVerpa"]) ? $_POST["ahorrosVerpa"] : false;
      $mes = isset($_POST["mes"]) ? $_POST["mes"] : false;
      $year = isset($_POST["year"]) ? $_POST["year"] : false;

      //Repoblar Formulario
      $form = array();
      $form["ingresoVeronica"] = $ingresoVeronica;
      $form["ingresoPablo"] = $ingresoPablo;
      $form["ingresoExtra"] = $ingresoExtra;
      $form["ahorrosVerpa"] = $ahorrosVerpa;
      $form["mes"] = $mes;
      $form["year"] = $year;

      //Reclutar Errores 
      $errores = array();

      // Validar Datos
      if (empty(trim($ingresoVeronica)) || !is_numeric($ingresoVeronica) || !preg_match("/[0-9]/", $ingresoVeronica)) {
        $errores["ingresoVeronica"] = "el formato no es el correcto!";
      }

      if (empty(trim($ingresoPablo)) || !is_numeric($ingresoPablo) || !preg_match("/[0-9]/", $ingresoPablo)) {
        $errores["ingresoPablo"] = "el formato no es el correcto!";
      }

      if (!is_numeric($ingresoExtra) || !preg_match("/[0-9]/", $ingresoExtra)) {
        $errores["ingresoExtra"] = "el formato no es el correcto!";
      }

      if (!is_numeric($ahorrosVerpa) || !preg_match("/[0-9]/", $ahorrosVerpa)) {
        $errores["ahorrosVerpa"] = "el formato no es el correcto!";
      }

      if (empty(trim($mes)) || is_numeric($mes) || preg_match("/[0-9]/", $mes)) {
        $errores["mes"] = "el formato de mes no es el correcto!";
      }

      if (empty(trim($year)) || !is_numeric($year) || !preg_match("/[0-9]/", $year)) {
        $errores["year"] = "el formato no es el correcto!";
      }

      //Instancio 
      $guardar = new Registro();
      $guardar->setIngresoVeronica($ingresoVeronica);
      $guardar->setIngresoPablo($ingresoPablo);
      $guardar->setIngresoExtra($ingresoExtra);
      $guardar->setSavingVerpa($ahorrosVerpa);
      $guardar->setMes($mes);
      $guardar->setYear($year);

      $coincidenciaFechas = $guardar->validarFecha();
      $coincidenciaFecha = $coincidenciaFechas->fetch_object();

      if ($coincidenciaFecha) {
        $errores["general"] = "La fecha ingresada ya existe";
      }

      if (count($errores) == 0) {

        $guardar = $guardar->save();

        if ($guardar) {
          $_SESSION["mensajeTablaExito"] = "<strong>Registro Creado</strong> con <strong>Exito</strong> !!!";
          header("Location:" . base_url . 'Registro/index');
        } else {
          $_SESSION["mensajeTablaError"] = "<strong> NO </strong> se Puede <strong>Eliminar un Registro</strong> , Que tenga <strong>Tablas Creadas</strong> !!!";
          $_SESSION["errores"] = $errores;
          $_SESSION["form"] = $form;
          header("Location:" . base_url . 'Registro/index');
        }
      } else {
        $_SESSION["errores"] = $errores;
        $_SESSION["form"] = $form;
        header("Location:" . base_url . 'Registro/index');
      }
    }
  }

  public function editar()
  {
    if (isset($_POST)) {

      $id = isset($_POST["id"]) ? $_POST["id"] : false;
      $ingresoVeronica = isset($_POST["ingresoVeronica"]) ? $_POST["ingresoVeronica"] : false;
      $ingresoPablo = isset($_POST["ingresoPablo"]) ? $_POST["ingresoPablo"] : false;
      $ingresoExtra = isset($_POST["ingresoExtra"]) ? $_POST["ingresoExtra"] : false;
      $ahorrosVerpa = isset($_POST["ahorrosVerpa"]) ? $_POST["ahorrosVerpa"] : false;
      $mes = isset($_POST["mes"]) ? $_POST["mes"] : false;
      /*   $meses = $_POST["meses"];
      for ($i = 0; $i < count($meses); $i++) {
        $mes = $meses[$i];
      }; */
      $year = isset($_POST["year"]) ? $_POST["year"] : false;

      //Repoblar Formulario
      $form = array();
      $form["ingresoVeronica"] = $ingresoVeronica;
      $form["ingresoPablo"] = $ingresoPablo;
      $form["ingresoExtra"] = $ingresoExtra;
      $form["ahorrosVerpa"] = $ahorrosVerpa;
      $form["mes"] = $mes;
      $form["year"] = $year;

      //Reclutar Errores 
      $errores = array();

      // Validar Datos
      if (empty(trim($ingresoVeronica)) || !is_numeric($ingresoVeronica) || !preg_match("/[0-9]/", $ingresoVeronica)) {
        $errores["ingresoVeronica"] = "el formato no es el correcto!";
      }

      if (empty(trim($ingresoPablo)) || !is_numeric($ingresoPablo) || !preg_match("/[0-9]/", $ingresoPablo)) {
        $errores["ingresoPablo"] = "el formato no es el correcto!";
      }

      if (!is_numeric($ingresoExtra) || !preg_match("/[0-9]/", $ingresoExtra)) {
        $errores["ingresoExtra"] = "el formato no es el correcto!";
      }

      if (!is_numeric($ahorrosVerpa) || !preg_match("/[0-9]/", $ahorrosVerpa)) {
        $errores["ahorrosVerpa"] = "el formato no es el correcto!";
      }

      if (empty(trim($mes)) || is_numeric($mes) || preg_match("/[0-9]/", $mes)) {
        $errores["mes"] = "el formato de mes no es el correcto!";
      }

      if (empty(trim($year)) || !is_numeric($year) || !preg_match("/[0-9]/", $year)) {
        $errores["year"] = "el formato no es el correcto!";
      }

      //Instancio 
      $editar = new Registro();
      $editar->setId($id);
      $editar->setIngresoVeronica($ingresoVeronica);
      $editar->setIngresoPablo($ingresoPablo);
      $editar->setIngresoExtra($ingresoExtra);
      $editar->setSavingVerpa($ahorrosVerpa);
      $editar->setMes($mes);
      $editar->setYear($year);

      if (count($errores) == 0) {
        $edit = $editar->edit();
        if ($edit) {
          $_SESSION["mensajeTablaExito"] = "<strong>Registro Editado</strong> con <strong>Exito</strong> !!!";
          header("Location:" . base_url . 'Registro/index');
        } else {
          $_SESSION["mensajeTablaError"] = "<strong> Hubo un Problema, </strong> de <strong>Edicion</strong> verifique los Campos !!!";
          $_SESSION["form"] = $form;
          header("Location:" . base_url . 'Registro/index');
        }
      } else {
        $_SESSION["mensajeTablaError"] = "<strong >Error, Vuelve a Intentarlo</strong> !!!";
        $_SESSION["errores"] = $errores;
        $_SESSION["form"] = $form;
        header("Location:" . base_url . 'Registro/index');
      }
    }
  }

  public function delete()
  {
    if (isset($_POST)) {
      $id = isset($_POST["id"]) ? $_POST["id"] : false;
      $mes = isset($_POST["mes"]) ? $_POST["mes"] : false;
      $delete = new registro();
      $delete->setId($id);
      $delete = $delete->delete();
      if ($delete) {
        $_SESSION["mensajeTablaExito"] = "<strong>Registro Eliminado</strong> con <strong>Exito</strong>....";
      } else {
        $_SESSION["mensajeTablaError"] = "<strong> NO </strong> se Puede <strong>Eliminar un Registro</strong> , Que tenga <strong>Tablas Creadas</strong> !!!";
      }
    } else {
      $_SESSION["mensajeTablaError"] = "<strong >Error, Vuelve a Intentarlo</strong> !!!";
    }

    header("Location:" . base_url . 'Registro/index');
  }

  public function historial()
  {
    if (isset($_GET['id'])) {

      // Banner Two 
      $registro = new Registro();
      $registro->setId($_GET['id']);
      $Registro = $registro->sumIngresos();
      $sumaIngresos = $Registro->total;
      $ahorroRegistro = $Registro->saving_verpa;
      // Banner Two 

      $carrefour = new Carrefour();
      $carrefour->setId($_GET['id']);
      $idRegisterC = $_GET['id'];
      $getAllCarrefours =  $carrefour->getAllByIdRegister();

      /* Banner Two */
      $IdDebtCarrefours = $carrefour->getSumDebtCarrefour();
      $debtCarrefour = $IdDebtCarrefours->totalCarrefour;

      $servicio = new Servicio();
      $servicio->setId($_GET['id']);
      $idRegisterS = $_GET['id'];
      $getAllServicios =  $servicio->getAllByIdRegister();

      /* Banner Two */
      $IdDebtServices = $servicio->getSumDebtServicio();
      $debtService = $IdDebtServices->totalServicio;

      $deuda = new deuda();
      $deuda->setId($_GET['id']);
      $idRegisterDeuda = $_GET['id'];
      $getAllDeudas =  $deuda->getAllByIdRegister();

      /* Banner Two */
      $IdDebtDebs = $deuda->getSumDebtVerpa();
      $IdDebtVerpa = $IdDebtDebs->totaldebt;

      /* Suma de Deudas Globales */
      $totalGlobal = $debtCarrefour + $debtService + $IdDebtVerpa;

      /* Dinero Restante */
      $dineroRestante = $sumaIngresos -  $totalGlobal;

      require_once 'views/layout/banner.php';
      require_once 'views/layout/sidebar.php';
      require_once 'views/layout/bannerTwo.php';
      require_once 'views/carrefour/historial.php';
      require_once 'views/servicios/historial.php';
      require_once 'views/deudas/historial.php';
    }
  }
}
