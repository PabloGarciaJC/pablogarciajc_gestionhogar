<div class="graphs">
  <div class="col_3">
    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5><strong><?= $sumaIngresos ?></strong> €</h5>
          <span>Ingresos Globales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5><strong><?= $dineroRestante ?> €</strong></h5>
          <span>Dinero Restante</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
        <div class="stats">
          <h5><strong><?= $totalGlobal ?></strong> €</h5>
          <span>Deudas Globales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5><strong><?= $ahorroRegistro  ?></strong> €</h5>
          <span>Ahorros</span>
        </div>
      </div>
    </div>

    <div class="clearfix"> </div>
  </div>
  <div class="col_1">
    <div class="clearfix"> </div>
  </div>
  <!-- //Banner de Cuentas -->


  <!-- Notificacion de Tabla Creada  -->
  <?php if (isset($_SESSION["mensajeTabla"]) && $_SESSION["nombreTabla"]) : ?>
    <div class="alert alert-success" role="alert">
      <?= $_SESSION["mensajeTabla"]; ?><a href="#tablaTitulo<?= $_SESSION['nombreTabla'] ?>"> ver Tabla <?= $_SESSION["nombreTabla"]; ?></a><br>
    </div>
  <?php endif; ?>

  <!-- Notificacion de Tabla Creada -->