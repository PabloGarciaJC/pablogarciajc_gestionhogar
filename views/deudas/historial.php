<!-- Tabla Deudas -->
<h1 style="text-align: center;" id="tablaTituloDeudas"><strong>Deudas</strong></h1>
<div class="bs-example4" data-example-id="simple-responsive-table" style="text-align: center;">
  <div class="table-responsive">
    <div class="agileits-logo navbar-left">
      <div class="btn-group">
        <div class="col-md-6 grid_2">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#btninsertd">
            Insertar
          </button>
        </div>
        <div class="col-md-6 grid_2">
          <a href="<?= base_url ?>Deudas/repoblar&id=<?= $idRegisterC ?>" id="repoblar" class="btn btn-info">Repoblar</a>
        </div>
        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btninsertd" tabindex="-1" role="dialog" aria-labelledby="btninsertd" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btninsertdTitle">Insertar Deuda</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url ?>Deudas/crear" id="formularioDeudasCrear" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">

                    <fieldset>
                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" id="mNombreD" name="nombre" value="Deudas" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" id="mIdRegistroD" name="idRegistro" value="<?= $idRegisterDeuda ?>" ng-model="model.date">

                      <div class="form-group cDescripcionD">
                        <label class="control-label navbar-left"><strong>Descripción</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDescripcionD" name="descripcion" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorDeuda" style="color: red;"></label>
                      </div>
                      <div class="form-group cGastosD">
                        <label class="control-label navbar-left"><strong>Gastos</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mGastosD" name="gasto" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorDeuda" style="color: red;"></label>
                      </div>
                      <div class="form-group cDiaCorteD">
                        <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDiaCorteD" name="diaCorte" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorDeuda" style="color: red;"></label>
                      </div>
                      <div class="form-group">
                        <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
                      </div>
                      <select class="form-control" id="mStatusD" name="status[]">
                        <option name="status">PENDIENTE</option>
                        <option name="status">PAGADO</option>
                      </select><br><br>

                    </fieldset>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerraModalD">Cerrar</button>
                      <button type="submit" id="insertarAjax" class="btn btn-primary">Aceptar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Modal -->
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
        <h2>Total: <?= $IdDebtVerpa ?></h2>
      </div>
    </div>
    <table id="tablaDeuda" class="table table-bordered">
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
        <?php if ($getAllDeudas->num_rows > 0) : ?>
          <?php while ($getAllDeuda = $getAllDeudas->fetch_object()) : ?>
            <tr>
              <td><?= $getAllDeuda->description_table ?></td>
              <td><?= $getAllDeuda->spending_verpa ?></td>
              <td><?= $getAllDeuda->curt_day ?></td>
              <td>
                <div class="btn-group">
                  <?php if ($getAllDeuda->status == 'PENDIENTE') : ?>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <?php else : ?>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      <?php endif; ?>
                      <?= $getAllDeuda->status ?>
                      </button>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn" style = "background:rgb(18 72 165); color:#ffffff" onclick="editarDeuda('<?= $getAllDeuda->id ?>','<?= $getAllDeuda->description_table ?>', '<?= $getAllDeuda->spending_verpa ?>', '<?= $getAllDeuda->curt_day ?>', '<?= $getAllDeuda->status ?>', '<?= $getAllDeuda->id_register ?>')" data-toggle="modal" data-target="#btnEditarDeuda">
                  Editar
                </button>
              </td>
              <!-- Inicio Modal -->
              <div class="btn-group">
                <div class="modal fade" id="btnEditarDeuda" tabindex="-1" role="dialog" aria-labelledby="btnEditarDeudaTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="btnEditarDeudaTitle">Editar Deuda</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url ?>Deudas/editar" id="mEdFormularioDeudaEditar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                          <fieldset>
                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEditarDeuda" ng-model="model.date">

                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegister" id="mIdRegisterEditarD" ng-model="model.date">

                            <div class="form-group cDescriptionEditarD">
                              <label class="control-label navbar-left"><strong>Descripción</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="descripcionGastos" id="mDescriptionEditarD" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarD" style="color: red;"></label>
                            </div>

                            <div class="form-group cEdSpendingEditarD">
                              <label class="control-label navbar-left"><strong>Gastos</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="gasto" id="mSpendingEditarD" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarD" style="color: red;"></label>
                            </div>

                            <div class="form-group cCurtDayEditarD">
                              <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="diaCorte" id="mCurtDayEditarD" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarD" style="color: red;"></label>
                            </div>

                            <div class="form-group">
                              <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
                            </div>

                            <select class="form-control" name="status[]" id="mStatusEditarD">
                              <option name="status">PENDIENTE</option>
                              <option name="status">PAGADO</option>
                            </select><br>
                          </fieldset>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Fin Modal -->
              <td>
                <button type="button" class="btn btn-warning" onclick="eliminarDeuda('<?= $getAllDeuda->id ?>','<?= $getAllDeuda->description_table ?>','<?= $getAllDeuda->id_register ?>')" data-toggle="modal" data-target="#btnEliminarDeuda">
                  Eliminar
                </button>
              </td>
              <!-- Inicio Modal Eliminar -->
              <div class="btn-group">
                <div class="modal fade" id="btnEliminarDeuda" tabindex="-1" role="dialog" aria-labelledby="btnEliminarDeudaTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="btnEliminarDeudaTitle">Eliminar Deuda</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url ?>Deudas/borrar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                          <fieldset>
                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEliminarDeuda" ng-model="model.date">

                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegistro" id="mIdRegisterDeuda" ng-model="model.date">

                            <div class="form-group">
                              <label class="control-label navbar-left"><strong>Descripcion</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="mes" id="mDescriptionEliminarDeuda" value="" ng-model="model.date">
                            </div>
                            <br>
                          </fieldset>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-warning">Eliminar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Fin Modal -->
            </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <tr>
            <td colspan="10" class="alert alert-success" role="alert">No hay ningun registro</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php Utils::borrarErrores(); ?>

<script>
  // INICIO // MODAL DEUDAS CREAR
  // Paso 1 // Capturo los ID del Formulario
  const mDescripcionD = document.getElementById('mDescripcionD');
  const mGastosD = document.getElementById('mGastosD');
  const mDiaCorteD = document.getElementById('mDiaCorteD');
  const formularioDeudasCrear = document.getElementById('formularioDeudasCrear');

  // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
  mDescripcionD.addEventListener('keypress', (e) => {
    let mDescripcionD = document.querySelector('.cDescripcionD');
    mDescripcionD.lastElementChild.innerHTML = "";
  });

  mDescripcionD.addEventListener('change', (e) => {
    let mDescripcionD = document.querySelector('.cDescripcionD');
    mDescripcionD.lastElementChild.innerHTML = "";
  });

  mGastosD.addEventListener('keypress', (e) => {
    let mGastosD = document.querySelector('.cGastosD');
    mGastosD.lastElementChild.innerHTML = "";
  });

  mGastosD.addEventListener('change', (e) => {
    let mGastosD = document.querySelector('.cGastosD');
    mGastosD.lastElementChild.innerHTML = "";
  });

  mDiaCorteD.addEventListener('keypress', (e) => {
    let mDiaCorteD = document.querySelector('.cDiaCorteD');
    mDiaCorteD.lastElementChild.innerHTML = "";
  });

  mDiaCorteD.addEventListener('change', (e) => {
    let mDiaCorteD = document.querySelector('.cDiaCorteD');
    mDiaCorteD.lastElementChild.innerHTML = "";
  });

  // Paso 4 // // Fin // Borrar Errores Cajas de Texto
  formularioDeudasCrear.addEventListener('submit', (e) => {
    // Paso 2 // // Inicio // Validar cajas de Texto 
    if (mDescripcionD.value.trim() == "") {
      mostrarMensajeErrorDeuda('cDescripcionD', 'Descripcion No Valida *');
      e.preventDefault();
    }

    if (mGastosD.value.length < 1 || mGastosD.value.trim() == "" || isNaN(mGastosD.value)) {
      mostrarMensajeErrorDeuda('cGastosD', 'Gastos No Valido *');
      e.preventDefault();
    }

    if (mDiaCorteD.value.trim() == "") {
      mostrarMensajeErrorDeuda('cDiaCorteD', 'Descripcion No Valida *');
      e.preventDefault();
    }

    if (mGastosD.value.length < 1 || mGastosD.value.trim() == "" || isNaN(mGastosD.value)) {
      mostrarMensajeErrorDeuda('cGastosD', 'Gastos No Valido *');
      e.preventDefault();
    }

    if (mDiaCorteD.value.trim() == "") {
      mostrarMensajeErrorDeuda('cDiaCorteD', 'Descripcion No Valida *');
      e.preventDefault();
    }
    // Paso 2 // //Fin // Validar cajas de Texto 

    // Paso 3 // // Inicio // Mostrar Errores 
    function mostrarMensajeErrorDeuda(claseInput, mensaje) {
      let elemento = document.querySelector(`.${claseInput}`);
      elemento.lastElementChild.innerHTML = mensaje;
    }
    // Paso 3 // // Fin // Mostrar Errores 
  });


  function editarDeuda(idD, description, spending, curtDay, status, idRegister) {
    $('#mIdEditarDeuda').val(idD);
    $('#mDescriptionEditarD').val(description);
    $('#mSpendingEditarD').val(spending);
    $('#mCurtDayEditarD').val(curtDay);
    $('#mStatusEditarD').val(status);
    $('#mIdRegisterEditarD').val(idRegister);

    // Paso 1 // Capturo los ID del Formulario
    const mDescriptionEditarD = document.getElementById('mDescriptionEditarD');
    const mSpendingEditarD = document.getElementById('mSpendingEditarD');
    const mCurtDayEditarD = document.getElementById('mCurtDayEditarD');
    const mEdFormularioDeudaEditar = document.getElementById('mEdFormularioDeudaEditar');

    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mDescriptionEditarD.addEventListener('keypress', (e) => {
      let mDescriptionEditarD = document.querySelector('.cDescriptionEditarD');
      mDescriptionEditarD.lastElementChild.innerHTML = "";
    });

    mDescriptionEditarD.addEventListener('change', (e) => {
      let mDescriptionEditarD = document.querySelector('.cDescriptionEditarD');
      mDescriptionEditarD.lastElementChild.innerHTML = "";
    });

    mSpendingEditarD.addEventListener('keypress', (e) => {
      let mSpendingEditarD = document.querySelector('.cEdSpendingEditarD');
      mSpendingEditarD.lastElementChild.innerHTML = "";
    });

    mSpendingEditarD.addEventListener('change', (e) => {
      let mSpendingEditarD = document.querySelector('.cEdSpendingEditarD');
      mSpendingEditarD.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarD.addEventListener('keypress', (e) => {
      let mCurtDayEditarD = document.querySelector('.cCurtDayEditarD');
      mCurtDayEditarD.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarD.addEventListener('change', (e) => {
      let mCurtDayEditarD = document.querySelector('.cCurtDayEditarD');
      mCurtDayEditarD.lastElementChild.innerHTML = "";
    });
    // Paso 4 // // Fin // Borrar Errores Cajas de Texto

    mEdFormularioDeudaEditar.addEventListener('submit', (e) => {

      // Paso 2 // // Inicio // Validar cajas de Texto 
      if (mDescriptionEditarD.value.trim() == "") {
        mostrarMensajeErrorEditarD('cDescriptionEditarD', 'Descripcion No Valida *');
        e.preventDefault();
      }

      if (mSpendingEditarD.value.length < 1 || mSpendingEditarD.value.trim() == "" || isNaN(mSpendingEditarD.value)) {
        mostrarMensajeErrorEditarD('cEdSpendingEditarD', 'Gastos No Valido *');
        e.preventDefault();
      }

      if (mCurtDayEditarD.value.trim() == "") {
        mostrarMensajeErrorEditarD('cCurtDayEditarD', 'Descripcion No Valida *');
        e.preventDefault();
      }
      // Paso 2 // //Fin // Validar cajas de Texto 

      // Paso 3 // // Inicio // Mostrar Errores 
      function mostrarMensajeErrorEditarD(claseInput, mensaje) {
        let elementoEd = document.querySelector(`.${claseInput}`);
        elementoEd.lastElementChild.innerHTML = mensaje;
      }
      // Paso 3 // // Fin // Mostrar Errores 

    });
  }

  function eliminarDeuda(idD, description, idRegister) {
    $('#mIdEliminarDeuda').val(idD);
    $('#mDescriptionEliminarDeuda').val(description);
    $('#mIdRegisterDeuda').val(idRegister);
  }
</script>