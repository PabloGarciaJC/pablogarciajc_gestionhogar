<!-- Tabla Carrefour -->
Prueba de la pc de Vero..JEJEJE
<h1 style="text-align: center;" id="tablaTituloServicios"><strong>Servicios</strong></h1>
<div class="bs-example4" data-example-id="simple-responsive-table" style="text-align: center;">
  <div class="table-responsive">
    <div class="agileits-logo navbar-left">
      <!-- Tabla de Botones -->
      <div class="btn-group">
        <div class="col-md-2 grid_2">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#btninserts">
            Insertar
          </button>
        </div>
        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btninserts" tabindex="-1" role="dialog" aria-labelledby="btninserts" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btninsertsTitle">Insertar Servicio</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url ?>Servicios/crear" method="POST" id="formularioServiciosCrear" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                    <fieldset>

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="nombre" value="Servicios" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegistro" value="<?= $idRegisterS ?>" ng-model="model.date">

                      <div class="form-group cDescripcionS">
                        <label class="control-label navbar-left"><strong>Descripción</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDescripcionS" name="descripcion" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorServicios" style="color: red;"></label>
                      </div>
                      <div class="form-group cGastosS">
                        <label class="control-label navbar-left"><strong>Gastos</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="gasto" id="mGastosS" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorServicios" style="color: red;"></label>
                      </div>
                      <div class="form-group cDiaCorteS">
                        <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDiaCorteS" name="diaCorte" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorServicios" style="color: red;"></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
                      </div>
                      <select class="form-control" name="status[]">
                        <option name="status">PENDIENTE</option>
                        <option name="status">PAGADO</option>
                      </select><br>
                    </fieldset>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-info">Insertar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Fin Modal -->
      </div>
    </div>
    <div class="col-md-2 grid_2">
      <div class="grid_1">
        <h3></h3>
      </div>
    </div>
    <div class="col-md-2 grid_2">
      <div class="grid_1">
        <h3></h3>
      </div>
    </div>
    <div class="col-md-2 grid_2">
      <div class="grid_1">
        <h3></h3>
      </div>
    </div>
    <div class="col-md-2 grid_2">
      <div class="grid_1">
        <h3></h3>
      </div>
    </div>
    <div class="col-md-2 grid_2">
      <div class="grid_1">
        <h2>Total: <?= $debtService ?></h2>
      </div>
    </div>

    <table class="table table-bordered" id="tablaServicios">
      <thead>
        <tr>
          <th style="text-align: center;">Descripción</th>
          <th style="text-align: center;">Gastos</th>
          <th style="text-align: center;">Día de Corte</th>
          <th style="text-align: center;">Estatus</th>
          <th style="text-align: center;">Editar</th>
          <th style="text-align: center;">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($getAllServicios->num_rows > 0) : ?>
          <?php while ($getAllServicio = $getAllServicios->fetch_object()) : ?>
            <tr>
              <td><?= $getAllServicio->description_table ?></td>
              <td><?= $getAllServicio->spending_verpa ?></td>
              <td><?= $getAllServicio->curt_day ?></td>
              <td>
                <div class="btn-group">
                  <?php if ($getAllServicio->status == 'PENDIENTE') : ?>
                    <?php $btnColor = 'success'; ?>
                    <button type="button" class="btn btn-<?= $btnColor ?> dropdown-toggle" data-toggle="dropdown">
                    <?php else : ?>
                      <?php $btnColor = 'primary'; ?>
                      <button type="button" class="btn btn-<?= $btnColor ?> dropdown-toggle" data-toggle="dropdown">
                      <?php endif; ?>
                      <?= $getAllServicio->status ?>
                      </button>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-primary" onclick="editarServicio('<?= $getAllServicio->id ?>','<?= $getAllServicio->description_table ?>', '<?= $getAllServicio->spending_verpa ?>', '<?= $getAllServicio->curt_day ?>', '<?= $getAllServicio->status ?>', '<?= $getAllServicio->id_register ?>')" data-toggle="modal" data-target="#btnEditarS">
                  Editar
                </button>
                <!-- Inicio Modal -->
                <div class="btn-group">
                  <div class="modal fade" id="btnEditarS" tabindex="-1" role="dialog" aria-labelledby="btnEditarSTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="btnEditarSTitle">Editar Servicio</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- Formulario Inicial -->
                        <div class="modal-body">
                          <form action="<?= base_url ?>Servicios/editar" id="mEdFormularioServiciosEditar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                            <fieldset>
                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEditarS" value="" ng-model="model.date">

                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegister" id="mIdRegisterEditarS" ng-model="model.date">

                              <div class="form-group cDescriptionEditarS">
                                <label class="control-label navbar-left"><strong>Descripción</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="descripcionGastos" id="mDescriptionEditarS" ng-model="model.date">
                                <label class="navbar-left" id="mostrarMensajeErrorEditarS" style="color: red;"></label>
                              </div>

                              <div class="form-group cEdSpendingEditarS">
                                <label class="control-label navbar-left"><strong>Gastos</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="gasto" id="mSpendingEditarS" ng-model="model.date">
                                <label class="navbar-left" id="mostrarMensajeErrorEditarS" style="color: red;"></label>
                              </div>

                              <div class="form-group cCurtDayEditarS">
                                <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="diaCorte" id="mCurtDayEditarS" ng-model="model.date">
                                <label class="navbar-left" id="mostrarMensajeErrorEditarS" style="color: red;"></label>
                              </div>

                              <div class="form-group">
                                <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
                              </div>

                              <select class="form-control" name="status[]" id="mStatusEditarS">
                                <option name="status">PENDIENTE</option>
                                <option name="status">PAGADO</option>
                              </select><br>
                            </fieldset>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                          </form>
                        </div>
                        <!-- //Formulario Final -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- //Fin Modal -->
              </td>
              <td>
                <button type="button" class="btn btn-warning" onclick="eliminarServicio('<?= $getAllServicio->id ?>','<?= $getAllServicio->description_table ?>','<?= $getAllServicio->id_register ?>')" data-toggle="modal" data-target="#btnEliminarS">
                  Eliminar
                </button>
                <!-- Inicio Modal -->
                <div class="btn-group">
                  <div class="modal fade" id="btnEliminarS" tabindex="-1" role="dialog" aria-labelledby="btnEliminarSTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="btnEliminarSTitle">Eliminar Servicio</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- Formulario Inicial -->
                        <div class="modal-body">
                          <form action="<?= base_url ?>Servicios/borrar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                            <fieldset>
                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEliminarS" ng-model="model.date">

                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegistro" id="mIdRegisterS" ng-model="model.date">

                              <div class="form-group">
                                <label class="control-label navbar-left"><strong>Descripcion</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="mes" id="mDescriptionEliminarS" value="" ng-model="model.date">
                              </div>
                              <br>
                            </fieldset>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-warning">Eliminar</button>
                            </div>
                          </form>
                        </div>
                        <!-- //Formulario Final -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- //Fin Modal -->
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <td colspan="10" class="alert alert-success" role="alert">No hay ningun registro</td>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  // INICIO // MODAL CARREFOUR CREAR
  // Paso 1 // Capturo los ID del Formulario
  const mDescripcionS = document.getElementById('mDescripcionS');
  const mGastosS = document.getElementById('mGastosS');
  const mDiaCorteS = document.getElementById('mDiaCorteS');
  const formularioServiciosCrear = document.getElementById('formularioServiciosCrear');

  formularioServiciosCrear.addEventListener('submit', (e) => {

    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mDescripcionS.addEventListener('keypress', (e) => {
      let mDescripcionS = document.querySelector('.cDescripcionS');
      mDescripcionS.lastElementChild.innerHTML = "";
    });

    mDescripcionS.addEventListener('change', (e) => {
      let mDescripcionS = document.querySelector('.cDescripcionS');
      mDescripcionS.lastElementChild.innerHTML = "";
    });

    mGastosS.addEventListener('keypress', (e) => {
      let mGastosS = document.querySelector('.cGastosS');
      mGastosS.lastElementChild.innerHTML = "";
    });

    mGastosS.addEventListener('change', (e) => {
      let mGastosS = document.querySelector('.cGastosS');
      mGastosS.lastElementChild.innerHTML = "";
    });


    // Paso 4 // // Fin // Borrar Errores Cajas de Texto


    // Paso 2 // // Inicio // Validar cajas de Texto 
    if (mDescripcionS.value.trim() == "") {
      mostrarMensajeErrorServicios('cDescripcionS', 'Descripcion No Valida *');
      e.preventDefault();
    }

    if (mGastosS.value.length < 1 || mGastosS.value.trim() == "" || isNaN(mGastosS.value)) {
      mostrarMensajeErrorServicios('cGastosS', 'Gastos No Valido *');
      e.preventDefault();
    }

    if (mDiaCorteS.value.trim() == "") {
      mostrarMensajeErrorServicios('cDiaCorteS', 'Descripcion No Valida *');
      e.preventDefault();
    }
    // Paso 2 // //Fin // Validar cajas de Texto 

    // Paso 3 // // Inicio // Mostrar Errores 
    function mostrarMensajeErrorServicios(claseInput, mensaje) {
      let elemento = document.querySelector(`.${claseInput}`);
      elemento.lastElementChild.innerHTML = mensaje;
    }
    // Paso 3 // // Fin // Mostrar Errores 
  });


  function editarServicio(idS, description, spending, curtDay, status, idRegister) {
    $('#mIdEditarS').val(idS);
    $('#mDescriptionEditarS').val(description);
    $('#mSpendingEditarS').val(spending);
    $('#mCurtDayEditarS').val(curtDay);
    $('#mStatusEditarS').val(status);
    $('#mIdRegisterEditarS').val(idRegister);

    // Paso 1 // Capturo los ID del Formulario
    const mDescriptionEditarS = document.getElementById('mDescriptionEditarS');
    const mSpendingEditarS = document.getElementById('mSpendingEditarS');
    const mCurtDayEditarS = document.getElementById('mCurtDayEditarS');
    const mEdFormularioServiciosEditar = document.getElementById('mEdFormularioServiciosEditar');

    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mDescriptionEditarS.addEventListener('keypress', (e) => {
      let mDescriptionEditarS = document.querySelector('.cDescriptionEditarS');
      mDescriptionEditarS.lastElementChild.innerHTML = "";
    });

    mDescriptionEditarS.addEventListener('change', (e) => {
      let mDescriptionEditarS = document.querySelector('.cDescriptionEditarS');
      mDescriptionEditarS.lastElementChild.innerHTML = "";
    });

    mSpendingEditarS.addEventListener('keypress', (e) => {
      let mSpendingEditarS = document.querySelector('.cEdSpendingEditarS');
      mSpendingEditarS.lastElementChild.innerHTML = "";
    });

    mSpendingEditarS.addEventListener('change', (e) => {
      let mSpendingEditarS = document.querySelector('.cEdSpendingEditarS');
      mSpendingEditarS.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarS.addEventListener('keypress', (e) => {
      let mCurtDayEditarS = document.querySelector('.cCurtDayEditarS');
      mCurtDayEditarS.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarS.addEventListener('change', (e) => {
      let mCurtDayEditarS = document.querySelector('.cCurtDayEditarS');
      mCurtDayEditarS.lastElementChild.innerHTML = "";
    });
    // Paso 4 // // Fin // Borrar Errores Cajas de Texto

    mEdFormularioServiciosEditar.addEventListener('submit', (e) => {

      // Paso 2 // // Inicio // Validar cajas de Texto 
      if (mDescriptionEditarS.value.trim() == "") {
        mostrarMensajeErrorEditarS('cDescriptionEditarS', 'Descripcion No Valida *');
        e.preventDefault();
      }

      if (mSpendingEditarS.value.length < 1 || mSpendingEditarS.value.trim() == "" || isNaN(mSpendingEditarS.value)) {
        mostrarMensajeErrorEditarS('cEdSpendingEditarS', 'Gastos No Valido *');
        e.preventDefault();
      }

      if (mCurtDayEditarS.value.trim() == "") {
        mostrarMensajeErrorEditarS('cCurtDayEditarS', 'Descripcion No Valida *');
        e.preventDefault();
      }
      // Paso 2 // //Fin // Validar cajas de Texto 

      // Paso 3 // // Inicio // Mostrar Errores 
      function mostrarMensajeErrorEditarS(claseInput, mensaje) {
        let elementoEd = document.querySelector(`.${claseInput}`);
        elementoEd.lastElementChild.innerHTML = mensaje;
      }
      // Paso 3 // // Fin // Mostrar Errores 
    });

  }

  function eliminarServicio(idS, description, idRegister) {
    $('#mIdEliminarS').val(idS);
    $('#mDescriptionEliminarS').val(description);
    $('#mIdRegisterS').val(idRegister);
  }
</script>