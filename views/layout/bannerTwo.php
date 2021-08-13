<div class="graphs">
  <div class="col_3">
    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <!-- Nueva Funcionalidad -->
        <button type="button" data-toggle="modal" onclick="editarRegistro('<?= $RegistrosTodos->id ?>', '<?= $RegistrosTodos->income_veronica ?>', '<?= $RegistrosTodos->income_pablo ?>', '<?= $RegistrosTodos->income_extra ?>','<?= $RegistrosTodos->saving_verpa ?>', '<?= $RegistrosTodos->month ?>', '<?= $RegistrosTodos->year ?>')" data-target="#btneditarRegistro">
          Editar<div class="btn-group">
        </button>
        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btneditarRegistro" tabindex="-1" role="dialog" aria-labelledby="btneditarTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btneditarTitle">Editar Ingresos</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- Formulario Inicial -->
                <div class="modal-body">
                  <form action="<?= base_url ?>Registro/bannerTwoRegistro" id="mEdFormularioR" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                    <fieldset>
                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" value="<?= $RegistrosTodos->id ?>" ng-model="model.date">

                      <div class="form-group cIngresoVeronicaEdR" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ingresos Veronica</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoVeronica" id="mIngresoVeronicaEdR" ng-model="model.date">
                        <label class="navbar-left" id="mensajeErrorEdR" style="color: red;"></label>
                      </div>

                      <div class="form-group cIngresoPabloEdR" style="padding-bottom: 14px;">
                        <label class=" control-label navbar-left"><strong>Ingresos Pablo</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoPablo" id="mIngresoPabloEdR" ng-model="model.date">
                        <label class="navbar-left" id="mensajeErrorEdR" style="color: red;"></label>
                      </div>

                      <div class="form-group cIngresoExtraEdR" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ingresos Extra</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoExtra" id="mIngresoExtraEdR" ng-model="model.date">
                        <label class="navbar-left" id="mensajeErrorEdR" style="color: red;"></label>
                      </div>

                      <div class="form-group cSavingVerpaEdR" style="padding-bottom: 14px;">
                        <!-- <label class="control-label navbar-left"><strong>Ahorros</strong></label> -->
                        <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="ahorrosVerpa" id="mAhorrosEdR" ng-model="model.date">
                        <label class="navbar-left" id="mensajeErrorEdR" style="color: red;"></label>
                      </div>

                      <div class="form-group cMesEdR">
                        <!-- <label class="control-label navbar-left"><strong>Mes</strong></label> -->
                        <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="mes" value="<?= $RegistrosTodos->month ?>" ng-model="model.date">
                      </div>

                      <div class="form-group cYearEdR">
                        <!-- <label class="control-label navbar-left"><strong>Año</strong></label> -->
                        <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="year" value="<?= $RegistrosTodos->year ?>" ng-model="model.date">
                      </div>
                      <br>
                    </fieldset>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                  </form>
                </div>
                <!-- //Formulario Final -->
              </div>
            </div>
          </div>
        </div>
        <!-- //Fin Modal -->
        <!-- //Nueva Funcionalidad -->
        <i class="pull-left fa fa-dollar dollar1 icon-rounded" style="margin-top: 25px;"></i>
        <div class="stats">
          <h5><strong><?= $sumaIngresos ?></strong> €</h5>
          <span>Ingresos Globales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded " style="margin-top: 25px;"></i>
        <div class="stats">
          <h5 style="margin-top: 38px;"><strong><?= $dineroRestante ?> €</strong></h5>
          <span>Dinero Restante</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded" style="margin-top: 25px;"></i>
        <div class="stats">
          <h5 style="margin-top: 38px;"><strong><?= $totalGlobal ?></strong> €</h5>
          <span>Deudas Globales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <!-- Nueva Funcionalidad -->
        <button type="button" data-toggle="modal" onclick="editarRegistroAhorro('<?= $RegistrosTodos->id ?>', '<?= $RegistrosTodos->income_veronica ?>', '<?= $RegistrosTodos->income_pablo ?>', '<?= $RegistrosTodos->income_extra ?>','<?= $RegistrosTodos->saving_verpa ?>', '<?= $RegistrosTodos->month ?>', '<?= $RegistrosTodos->year ?>')" data-target="#btneditarAhorro">
          Editar<div class="btn-group">
        </button>
        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btneditarAhorro" tabindex="-1" role="dialog" aria-labelledby="btneditarTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btneditarTitle">Editar Ahorro</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!-- Formulario Inicial -->
                <div class="modal-body">
                  <form action="<?= base_url ?>Registro/bannerTwoRegistro" id="mEdFormularioRH" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                    <fieldset>
                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" value="<?= $RegistrosTodos->id ?>" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="ingresoVeronica" value="<?= $RegistrosTodos->income_veronica ?>" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="ingresoPablo" value="<?= $RegistrosTodos->income_pablo ?>" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="ingresoExtra" value="<?= $RegistrosTodos->income_extra ?>" ng-model="model.date">

                      <div class="form-group cSavingVerpaEdRH" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ahorros</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ahorrosVerpa" id="mAhorrosEdRH" ng-model="model.date">
                        <label class="navbar-left" id="mensajeErrorEdH" style="color: red;"></label>
                      </div>

                      <div class="form-group cMesEdR">
                        <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="mes" value="<?= $RegistrosTodos->month ?>" ng-model="model.date">
                      </div>

                      <div class="form-group cYearEdR">
                        <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="year" value="<?= $RegistrosTodos->year ?>" ng-model="model.date">
                      </div>
                      <br>
                    </fieldset>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                  </form>
                </div>
                <!-- //Formulario Final -->
              </div>
            </div>
          </div>
        </div>
        <!-- //Fin Modal -->
        <!-- //Nueva Funcionalidad -->
        <i class="pull-left fa fa-dollar dollar1 icon-rounded" style="margin-top: 25px;"></i>
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

  <script>
    function editarRegistro(id, income_veronica, income_pablo, income_extra, saving_verpa, month, year) {
      // Paso 0 // Imprimo los Registros de PHP en la Caja de Texto
      $('#mIngresoVeronicaEdR').val(income_veronica);
      $('#mIngresoPabloEdR').val(income_pablo);
      $('#mIngresoExtraEdR').val(income_extra);
      $('#mAhorrosEdR').val(saving_verpa);

      // INICIO // MODAL REGISTRO CREAR
      // Paso 1 // Capturo los ID del Formulario
      const ingresoVeronicaEdR = document.getElementById('mIngresoVeronicaEdR');
      const ingresoPabloEdR = document.getElementById('mIngresoPabloEdR');
      const ingresoExtraEdR = document.getElementById('mIngresoExtraEdR');
      const ahorrosEdR = document.getElementById('mAhorrosEdR');
      const edFormularioR = document.getElementById('mEdFormularioR');

      // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
      ingresoVeronicaEdR.addEventListener('keypress', (e) => {
        let ingresoVeronicaEdR = document.querySelector('.cIngresoVeronicaEdR');
        ingresoVeronicaEdR.lastElementChild.innerHTML = "";
      });

      ingresoVeronicaEdR.addEventListener('change', (e) => {
        let ingresoVeronicaEdR = document.querySelector('.cIngresoVeronicaEdR');
        ingresoVeronicaEdR.lastElementChild.innerHTML = "";
      });

      ingresoPabloEdR.addEventListener('keypress', (e) => {
        let ingresoPabloEdR = document.querySelector('.cIngresoPabloEdR');
        ingresoPabloEdR.lastElementChild.innerHTML = "";
      });

      ingresoPabloEdR.addEventListener('change', (e) => {
        let ingresoPabloEdR = document.querySelector('.cIngresoPabloEdR');
        ingresoPabloEdR.lastElementChild.innerHTML = "";
      });

      ingresoExtraEdR.addEventListener('change', (e) => {
        let ingresoExtraEdR = document.querySelector('.cIngresoExtraEdR');
        ingresoExtraEdR.lastElementChild.innerHTML = "";
      });

      ingresoExtraEdR.addEventListener('change', (e) => {
        let ingresoExtraEdR = document.querySelector('.cIngresoExtraEdR');
        ingresoExtraEdR.lastElementChild.innerHTML = "";
      });

      ahorrosEdR.addEventListener('change', (e) => {
        let ahorrosEdR = document.querySelector('.cSavingVerpaEdR');
        ahorrosEdR.lastElementChild.innerHTML = "";
      });

      ahorrosEdR.addEventListener('change', (e) => {
        let ahorrosEdR = document.querySelector('.cSavingVerpaEdR');
        ahorrosEdR.lastElementChild.innerHTML = "";
      });
      // Paso 4 // // Fin // Borrar Errores Cajas de Texto

      // Paso 2 // // Inicio // Validar cajas de Texto  
      edFormularioR.addEventListener('submit', (e) => {

        if (ingresoVeronicaEdR.value.length < 1 || ingresoVeronicaEdR.value.trim() == "" || isNaN(ingresoVeronicaEdR.value)) {
          mostrarMensajeError('cIngresoVeronicaEdR', 'Ingreso Vero No Valido *');
          e.preventDefault();
        }

        if (ingresoPabloEdR.value.length < 1 || ingresoPabloEdR.value.trim() == "" || isNaN(ingresoPabloEdR.value)) {
          mostrarMensajeError('cIngresoPabloEdR', 'Ingreso Pablo No Valido *');
          e.preventDefault();
        }

        if (ingresoExtraEdR.value.length < 1 || ingresoExtraEdR.value.trim() == "" || isNaN(ingresoExtraEdR.value)) {
          mostrarMensajeError('cIngresoExtraEdR', 'Ingreso Extra No Valido *');
          e.preventDefault();
        }

        if (ahorrosEdR.value.length < 1 || ahorrosEdR.value.trim() == "" || isNaN(ahorrosEdR.value)) {
          mostrarMensajeError('cSavingVerpaEdR', 'Ahorros No Valido *');
          e.preventDefault();
        }
        return true;
      });

      // Paso 3 // // Inicio // Mostrar Errores 
      function mostrarMensajeError(claseInput, mensaje) {
        let elemento = document.querySelector(`.${claseInput}`);
        elemento.lastElementChild.innerHTML = mensaje;
      }
      // Paso 3 // // Fin // Mostrar Errores 
    }

    function editarRegistroAhorro(id, income_veronica, income_pablo, income_extra, saving_verpa, month, year) {
      // Paso 0 // Imprimo los Registros de PHP en la Caja de Texto
      $('#mAhorrosEdRH').val(saving_verpa);

      // INICIO // MODAL REGISTRO CREAR
      // Paso 1 // Capturo los ID del Formulario 
      const ahorrosEdRH = document.getElementById('mAhorrosEdRH');
      const edFormularioRH = document.getElementById('mEdFormularioRH');

      // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
      ahorrosEdRH.addEventListener('keypress', (e) => {
        let ahorrosEdRH = document.querySelector('.cSavingVerpaEdRH');
        ahorrosEdRH.lastElementChild.innerHTML = "";
      });

      ahorrosEdRH.addEventListener('change', (e) => {
        let ahorrosEdRH = document.querySelector('.cSavingVerpaEdRH');
        ahorrosEdRH.lastElementChild.innerHTML = "";
      });
      // Paso 4 // // Fin // Borrar Errores Cajas de Texto

      // Paso 2 // // Inicio // Validar cajas de Texto  
      edFormularioRH.addEventListener('submit', (e) => {
        if (ahorrosEdRH.value.length < 1 || ahorrosEdRH.value.trim() == "" || isNaN(ahorrosEdRH.value)) {
          mostrarMensajeError('cSavingVerpaEdRH', 'Ahorros No Valido *');
          e.preventDefault();
        }
        return true;
      });

      // Paso 3 // // Inicio // Mostrar Errores 
      function mostrarMensajeError(claseInput, mensaje) {
        let elemento = document.querySelector(`.${claseInput}`);
        elemento.lastElementChild.innerHTML = mensaje;
      }
      // Paso 3 // // Fin // Mostrar Errores 
    }
  </script>

  <!-- Notificacion de Tabla Creada  -->
  <?php if (isset($_SESSION["mensajeTabla"]) && $_SESSION["nombreTabla"]) : ?>
    <div class="alert alert-success" role="alert">
      <?= $_SESSION["mensajeTabla"]; ?><a href="#tablaTitulo<?= $_SESSION['nombreTabla'] ?>"> ver Tabla <?= $_SESSION["nombreTabla"]; ?></a><br>
    </div>
  <?php endif; ?>

  <?php if (isset($_SESSION["bannerTwo"])) : ?>
    <div class="alert alert-success" role="alert">
      <?= $_SESSION["bannerTwo"]; ?><br>
    </div>
  <?php endif; ?>

  <!-- Notificacion de Tabla Creada -->