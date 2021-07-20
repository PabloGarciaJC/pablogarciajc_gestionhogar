<?php
class Deuda
{
  private $id;
  private $name;
  private $descriptionTable;
  private $spendingVerpa;
  private $curtDay;
  private $status;
  private $idRegister;
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

  public function setName($nombre)
  {
    $this->name = $nombre;
  }

  public function setDescriptionTable($descripcionTabla)
  {
    $this->descriptionTable = $descripcionTabla;
  }


  public function setSpendingVerpa($gastosVerpa)
  {
    $this->spendingVerpa = $gastosVerpa;
  }

  public function setCurtDay($diaCorte)
  {
    $this->curtDay = $diaCorte;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setIdRegister($idRegistro)
  {
    $this->idRegister = $idRegistro;
  }

  // GETTERS
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescriptionTable()
  {
    return $this->descriptionTable;
  }

  public function getSpendingVerpa()
  {
    return $this->setSpendingVerpa;
  }

  public function getCurtDay()
  {
    return $this->curtDay;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getIdRegister()
  {
    return $this->idRegister;
  }

  //CODIGO SQL 
  public function getByIdRegister()
  {
    $sql = "SELECT * FROM debt_verpa WHERE id_register = {$this->id} ORDER BY id DESC";
    $debt = $this->db->query($sql);
    return $debt;
  }

  public function getSumDebtVerpa()
  {
    $sql = "SELECT description_table, sum(spending_verpa) as totaldebt  FROM debt_verpa where id_register = {$this->id};";
    $debtVerpa = $this->db->query($sql);
    /*  echo $sql;
    echo "</br>";
    echo $this->db->error;
    die();  */
    return $debtVerpa->fetch_object();
  }
  
  public function getDeuda()
  {
    $sql = "SELECT SUM(spending_verpa) from debt_verpa where id= {$this->id}";
    $deudas = $this->db->query($sql);
    return $deudas;
  }

  public function getAllByIdRegister()
  {
    $sql = "SELECT r.id, d.id, d.description_table, d.spending_verpa, d.curt_day, d.status, d.name_debt, d.id_register from register r 
      INNER JOIN debt_verpa d ON r.id=d.id_register WHERE r.id = {$this->id} ORDER BY d.id DESC;";
    $debt = $this->db->query($sql);
    return $debt;
  }

  public function save()
  {
    $result = false;

    $sql = "INSERT INTO debt_verpa (name_debt,
                                  description_table,
                                  spending_verpa, 
                                  curt_day,
                                  status,
                                  id_register)";

    $sql .= "VALUES ('{$this->name}',
                    '{$this->descriptionTable}',
                    {$this->spendingVerpa},
                    '{$this->curtDay}',
                    '{$this->status}',
                    {$this->idRegister});";

    $save = $this->db->query($sql);
    /* 
    echo $sql;
    echo "</br>";
    echo $this->db->error;
    die(); */

    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function edit()
  {
    $result = false;
    $sql = "UPDATE debt_verpa SET "
      . "description_table= '{$this->descriptionTable}', "
      . "spending_verpa={$this->spendingVerpa}, "
      . "curt_day='{$this->curtDay}', "
      . "status='{$this->status}' "
      .  "WHERE id={$this->id} ";

    $save = $this->db->query($sql);
    /* 
      echo $sql;
    echo "</br>";
    echo $this->db->error;
    die();  */

    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function delete()
  {
    $result = false;
    $sql = "DELETE FROM debt_verpa WHERE id= {$this->id}";
    $delete = $this->db->query($sql);
    if ($delete) {
      $result = true;
    }
    return $result;
  }
}
