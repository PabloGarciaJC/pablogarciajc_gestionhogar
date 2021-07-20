<?php

class Registro
{
  private $id;
  private $ingresoVeronica;
  private $ingresoPablo;
  private $ingresoExtra;
  private $savingVerpa;
  private $mes;
  private $year;
  private $db;

  // CONSTRUCTOR
  public function __construct()
  {
    $this->db = Database::connect();
  }

  // SETTER
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setIngresoVeronica($ingresoVeronica)
  {
    $this->ingresoVeronica = $ingresoVeronica;
  }

  public function setIngresoPablo($ingresoPablo)
  {
    $this->ingresoPablo = $ingresoPablo;
  }

  public function setIngresoExtra($ingresoExtra)
  {
    $this->ingresoExtra = $ingresoExtra;
  }

  public function setSavingVerpa($savingVerpa)
  {
    $this->savingVerpa = $savingVerpa;
  }

  public function setMes($mes)
  {
    $this->mes = $mes;
  }

  public function setYear($year)
  {
    $this->year = $year;
  }

  // GETTER
  public function getId()
  {
    return $this->id;
  }

  public function getIngresoVeronica()
  {
    return $this->ingresoVeronica;
  }

  public function getIngresoPablo()
  {
    return $this->ingresoPablo;
  }

  public function getIngresoExtra()
  {
    return $this->ingresoExtra;
  }

  public function getSavingVerpa()
  {
    return $this->savingVerpa;
  }

  public function getMes()
  {
    return $this->mes;
  }

  public function getYear()
  {
    return $this->year;
  }


  //CODIGO SQL 
  public function getAll()
  {
    $sql = "SELECT * FROM register ORDER BY id DESC";
    $register = $this->db->query($sql);
    return $register;
  }

  public function sumIngresos()
  {
    $sql = "SELECT sum(income_veronica + income_pablo + income_extra) as total, saving_verpa from register where id={$this->id};";
    $sumIngresos = $this->db->query($sql);
    return $sumIngresos->fetch_object();
  }

  public function getAllNamesCarrefour()
  {
    $sql = "SELECT r.id, c.name_carrefour from register r 
    INNER JOIN carrefour c ON r.id=c.id_register ORDER BY id DESC LIMIT 1;";
    $allNameC = $this->db->query($sql);
    return $allNameC;
  }

  public function getIdRegister()
  {
    $sql = "SELECT id FROM register where id={$this->id}";
    $IdRegister = $this->db->query($sql);

    return $IdRegister;
  }

  public function validarFecha()
  {
  
    $sql = "SELECT month,year FROM register where month='{$this->mes}' and year={$this->year}";
    $IdRegister = $this->db->query($sql);

  /*   echo $sql;
    echo "</br>";
    echo $this->db->error;
    die(); */

    return $IdRegister;
  }


  public function save()
  {
    $result = false;

    $sql = "INSERT INTO register (income_veronica,
                                  income_pablo,
                                  income_extra, 
                                  saving_verpa,
                                  month,
                                  year)";

    $sql .= "VALUES ({$this->ingresoVeronica},
                    {$this->ingresoPablo},
                    {$this->ingresoExtra},
                    {$this->savingVerpa},
                    '{$this->mes}',
                    {$this->year});";

    $save = $this->db->query($sql);

    /*    echo $sql;
    echo "</br>";
    echo $this->db->error;
    die();  */

    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function edit()
  {
    $result = false;

    $sql = "UPDATE register SET "
      . "income_veronica= {$this->ingresoVeronica}, "
      . "income_pablo= {$this->ingresoPablo}, "
      . "income_extra={$this->ingresoExtra}, "
      . "saving_verpa={$this->savingVerpa}, "
      . "month = '{$this->mes}', "
      . "year= {$this->year} "
      .  "WHERE id={$this->id}";

    $save = $this->db->query($sql);

      /* echo $sql;
    echo "</br>";
    echo $this->db->error;
    die() */;

    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function delete()
  {
    $result = false;
    $sql = "DELETE FROM register WHERE id= {$this->id}";
    $delete = $this->db->query($sql);

    /*  echo $sql;
    echo "</br>";
    echo $this->db->error;
    die();  */

    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
