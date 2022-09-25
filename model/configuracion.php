<?php
class Configuracion
{
    private $id;
    private $idRegistro;
    private $nombre;
    private $descripcion;
    private $gastos;
    private $fechaCorte;
    private $status;
    private $buscador;
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

    public function setIdRegistro($idRegistro)
    {
        $this->idRegistro = $idRegistro;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setGastos($gastos)
    {
        $this->gastos = $gastos;
    }

    public function setFechaCorte($fechaCorte)
    {
        $this->fechaCorte = $fechaCorte;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setBuscador($buscador)
    {
        $this->buscador = $buscador;
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getGastos()
    {
        return $this->gastos;
    }

    public function getFechaCorte()
    {
        return $this->fechaCorte;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getBuscador()
    {
        return $this->buscador;
    }

    //CODIGO SQL

    public function guardar()
    {
        $sql = "INSERT INTO configuracion (nombre,descripcion,gastos,fechaCorte,status,idRegister,rol) VALUES ('{$this->nombre}','{$this->descripcion}', {$this->gastos}, '{$this->fechaCorte}', '{$this->status}', {$this->getIdRegistro()}, 1)";

        $save = $this->db->query($sql);

        if ($save) {
            echo 1;
        }
    }

    public function listar($ultimoRegistro, $mostrarRegistros)
    {
        $sql = "SELECT * FROM configuracion c ";

        if ($this->getBuscador() == '') {

            $sql .= "WHERE idRegister = {$this->getIdRegistro()} or rol = 0 ORDER BY FIELD (nombre,'Carrefour','Servicios','Deudas') ASC ";
        } else {

            $sql .= "WHERE (c.nombre LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.descripcion LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.gastos LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.fechaCorte LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.status LIKE '%{$this->getBuscador()}%') AND idRegister = {$this->getIdRegistro()} or rol = 0 ";
            $sql .= "ORDER BY c.id DESC ";
        }

        $sql .= "LIMIT $ultimoRegistro, $mostrarRegistros;";
        $listar = $this->db->query($sql);
        return $listar;
    }

    public function editar()
    {
        $sql = "UPDATE configuracion SET "
            . "nombre= '{$this->nombre}', "
            . "descripcion= '{$this->descripcion}', "
            . "gastos={$this->gastos}, "
            . "fechaCorte='{$this->fechaCorte}', "
            . "status = '{$this->status}' "
            . "WHERE id= {$this->id};";

        $save = $this->db->query($sql);

        if ($save) {
            echo 1;
        }
    }

    public function delete()
    {
        $sql = "SELECT * FROM configuracion WHERE id= {$this->id} AND rol = 1";
        $delete = $this->db->query($sql);

        if ($delete->num_rows > 0) {
            $sql = "DELETE FROM configuracion WHERE id= {$this->id}";
            $delete = $this->db->query($sql);
            if ($delete) {
                echo 1;
            }
        }
    }

    public function conteoRegistros()
    {
        $sql = "SELECT count(c.id) as 'registrosTotales' FROM configuracion c ";

        if ($this->getBuscador() == '') {

            $sql .= "WHERE idRegister = {$this->getIdRegistro()} or rol = 0 ORDER BY c.id DESC;";
        } else {

            $sql .= "WHERE (c.nombre LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.descripcion LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.gastos LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.fechaCorte LIKE '%{$this->getBuscador()}%' OR ";
            $sql .= "c.status LIKE '%{$this->getBuscador()}%') AND idRegister = {$this->getIdRegistro()} or rol = 0 ";
            $sql .= "ORDER BY c.id DESC;";
        }

        $listar = $this->db->query($sql);
        $obtener = $listar->fetch_object();
        $conteo = $obtener->registrosTotales;

        return $conteo;
    }

    public function obtenerRegistroByIdRegister()
    {
        $sql = "SELECT
          c.id,
          income_veronica,
          income_pablo,
          income_extra,
          saving_verpa,
          month,
          year,
          nombre,
          descripcion,
          gastos,
          fechaCorte,
          status,
          idRegister
          FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = {$this->getIdRegistro()};";
        $IdRegister = $this->db->query($sql);

        return $IdRegister->fetch_object();
    }

    public function sumaIngresos()
    {
        $sql = "SELECT SUM(income_veronica + income_pablo + income_extra) as ingresosTotales, saving_verpa as ahorros from register r WHERE r.id = {$this->getIdRegistro()}";
        $sumaGastos = $this->db->query($sql);
        $obtener = $sumaGastos->fetch_object();
        return $obtener;
    }

    public function deudasGlobales()
    {
        $sql = "SELECT SUM(c.Gastos) as deudasGlobales FROM register r INNER JOIN configuracion c ON r.id = c.idRegister WHERE c.idRegister = {$this->getIdRegistro()} or rol = 0 ";
        $deudasGlobales = $this->db->query($sql);
        $obtener = $deudasGlobales->fetch_object();
        return $obtener->deudasGlobales;
    }

    public function gastosCarrefour()
    {
        $sql = "SELECT SUM(c.Gastos) as gastosCarrefour FROM configuracion c where (c.idRegister = {$this->getIdRegistro()} or rol = 0) and c.nombre= 'Carrefour'";
        $gastosCarrefour = $this->db->query($sql);
        $obtener = $gastosCarrefour->fetch_object();
        return $obtener->gastosCarrefour;
    }

    public function gastosServicios()
    {
        $sql = "SELECT SUM(c.Gastos) as gastosServicios FROM configuracion c where (c.idRegister = {$this->getIdRegistro()} or rol = 0) and c.nombre= 'Servicios'";
        $gastosServicios = $this->db->query($sql);
        $obtener = $gastosServicios->fetch_object();
        return $obtener->gastosServicios;
    }

    public function gastosDeudas()
    {
        $sql = "SELECT SUM(c.Gastos) as gastosDeudas FROM configuracion c where (c.idRegister = {$this->getIdRegistro()} or rol = 0) and c.nombre= 'Deudas'";
        $gastosDeudas = $this->db->query($sql);
        $obtener = $gastosDeudas->fetch_object();
        return $obtener->gastosDeudas;
    }

    public function repoblarTabla()
    {
        $sql = "INSERT INTO configuracion (nombre,descripcion,gastos,fechaCorte,status,idRegister,rol) VALUES
        ('Carrefour','Mercado Familiar', 407.00, '21 de cada mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Carrefour','Sitio Web Pablo', 10.00, '15 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Carrefour','Netflix', 5.49 , '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Carrefour','HBO', 3.99, '5 de cada mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Carrefour','Mercado Padres Pablo', 130.00, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Carrefour','Pienso de rocco', 53.60, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Servicios','Fibra - Yoigo', 57.09, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Servicios','Seguro de Dientes - Vero', 20.40, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),   
        ('Servicios','Luz', 27.15, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Servicios','Alguiler', 650.00, '21 de casa mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Deudas','Cuota de la Moto', 69.36, 'Ultimo de mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Deudas','BBVA targeta de Vero', 59.00, 'Ultimo de mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Deudas','Prestamo de 4000 mil', 64.90 , 'Ultimo de mes', 'PENDIENTE', {$this->getIdRegistro()}, 1),
        ('Deudas','Credito del Erte', 50.19, 'Ultimo de mes', 'PENDIENTE', {$this->getIdRegistro()}, 1);";

        $repoblacion = $this->db->query($sql);

        if ($repoblacion) {
            echo 1;
        }
    }
}
