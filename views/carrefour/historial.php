<div id="respuesta"></div>
<!-- Tabla Carrefour -->
<h1 style="text-align: center;" id="tablaTituloCarrefour"><strong>Carrefour</strong></h1>
<div class="bs-example4" data-example-id="simple-responsive-table" style="text-align: center;">
  <div class="table-responsive">
    <div class="agileits-logo navbar-left">
      <div class="btn-group">
        <div class="col-md-6 grid_2">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#btnInsertarC">
            Insertar
          </button>
        </div>
        <div class="col-md-6 grid_2">
          <a href="" id="repoblar" class="btn btn-info">Repoblar</a>
        </div>


        <script>
          $("#repoblar").click(function() {
            url = "<?= base_url ?>Carrefour/repoblar&id=<?= $idRegisterC ?>";

         

          $.ajax({
              url: url,
              type: "GET",  
              data: parametros         
            })
            .done(function(data) {
              $("#respuesta").html(data);
            })
            .fail(function(data) {
              alert("error");
            })
            .always(function(data) {
              alert("complete");
            });

          });
        </script>



        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btnInsertarC" tabindex="-1" role="dialog" aria-labelledby="btnInsertarC" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btnInsertarCTitle">Insertar Carrefour</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url ?>Carrefour/crear" id="formularioCarrefourCrear" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                    <fieldset>

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="nombre" value="Carrefour" ng-model="model.date">

                      <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegistro" value="<?= $idRegisterC ?>" ng-model="model.date">

                      <div class="form-group cDescripcion">
                        <label class="control-label navbar-left"><strong>Descripción</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDescripcion" name="descripcion" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorCarrefour" style="color: red;"></label>
                      </div>
                      <div class="form-group cGastos">
                        <label class="control-label navbar-left"><strong>Gastos</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="gasto" id="mGastos" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorCarrefour" style="color: red;"></label>
                      </div>

                      <div class="form-group cDiaCorte">
                        <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mDiaCorte" name="diaCorte" ng-model="model.date">
                        <label class="navbar-left" id="mostrarMensajeErrorCarrefour" style="color: red;"></label>
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
        <h2>Total: <?= $debtCarrefour ?></h2>
      </div>
    </div>
    <table class="table table-bordered" id="tablaCarrefour">
      <thead>
        <?php if ($getAllCarrefours->num_rows > 0) : ?>
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
        <?php while ($getAllCarrefour = $getAllCarrefours->fetch_object()) : ?>
          <tr>
            <td><?= $getAllCarrefour->description_table ?></td>
            <td><?= $getAllCarrefour->spending_verpa ?></td>
            <td><?= $getAllCarrefour->curt_day ?></td>
            <td>
              <div class="btn-group">
                <?php if ($getAllCarrefour->status == 'PENDIENTE') : ?>
                  <?php $btnColor = 'success'; ?>
                  <button type="button" class="btn btn-<?= $btnColor ?> dropdown-toggle" data-toggle="dropdown">
                  <?php else : ?>
                    <?php $btnColor = 'primary'; ?>
                    <button type="button" class="btn btn-<?= $btnColor ?> dropdown-toggle" data-toggle="dropdown">
                    <?php endif; ?>
                    <?= $getAllCarrefour->status ?>
                    </button>
              </div>
            </td>
            <td>
              <button type="button" class="btn btn-primary" onclick="editarCarrefour('<?= $getAllCarrefour->id ?>','<?= $getAllCarrefour->description_table ?>', '<?= $getAllCarrefour->spending_verpa ?>', '<?= $getAllCarrefour->curt_day ?>', '<?= $getAllCarrefour->status ?>', '<?= $getAllCarrefour->id_register ?>')" data-toggle="modal" data-target="#btnEditarC">
                Editar<div class="btn-group">
              </button>
              <!-- Inicio Modal -->
              <div class="btn-group">
                <div class="modal fade" id="btnEditarC" tabindex="-1" role="dialog" aria-labelledby="btnEditarCTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="btnEditarCTitle">Editar Carrefour</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url ?>Carrefour/editar" id="mEdFormularioCarrefourEditar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                          <fieldset>
                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEditarC" value="" ng-model="model.date">
                            <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegister" id="mIdRegisterEditarC" ng-model="model.date">

                            <div class="form-group cDescriptionEditarC">
                              <label class="control-label navbar-left"><strong>Descripción</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="descripcionGastos" id="mDescriptionEditarC" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarC" style="color: red;"></label>
                            </div>

                            <div class="form-group cEdSpendingEditarC">
                              <label class="control-label navbar-left"><strong>Gastos</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="gasto" id="mSpendingEditarC" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarC" style="color: red;"></label>
                            </div>

                            <div class="form-group cCurtDayEditarC">
                              <label class="control-label navbar-left"><strong>Dia de Corte</strong></label>
                              <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="diaCorte" id="mCurtDayEditarC" ng-model="model.date">
                              <label class="navbar-left" id="mostrarMensajeErrorEditarC" style="color: red;"></label>
                            </div>

                            <div class="form-group">
                              <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
                            </div>

                            <select class="form-control" name="status[]" id="mStatusEditarC">
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
                    </div>
                  </div>
                </div>
              </div>
              <!-- //Fin Modal -->
            </td>

            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-warning" onclick="eliminarCarrefour('<?= $getAllCarrefour->id ?>','<?= $getAllCarrefour->description_table ?>','<?= $getAllCarrefour->id_register ?>')" data-toggle="modal" data-target="#btnEliminarC">
                  Eliminar
                </button>
                <!-- Inicio Modal -->
                <div class="btn-group">
                  <div class="modal fade" id="btnEliminarC" tabindex="-1" role="dialog" aria-labelledby="btnEliminarCTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="btnEliminarCTitle">Eliminar Carrefour</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url ?>Carrefour/borrar" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                            <fieldset>
                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEliminarC" ng-model="model.date">

                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="idRegistro" id="mIdRegisterC" ng-model="model.date">

                              <div class="form-group">
                                <label class="control-label navbar-left"><strong>Descripcion</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="mes" id="mDescriptionEliminarC" value="" ng-model="model.date">
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
  const mDescripcion = document.getElementById('mDescripcion');
  const mGastos = document.getElementById('mGastos');
  const mDiaCorte = document.getElementById('mDiaCorte');
  const formularioCarrefourCrear = document.getElementById('formularioCarrefourCrear');

  formularioCarrefourCrear.addEventListener('submit', (e) => {
    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mDescripcion.addEventListener('keypress', (e) => {
      let mDescripcion = document.querySelector('.cDescripcion');
      mDescripcion.lastElementChild.innerHTML = "";
    });

    mDescripcion.addEventListener('change', (e) => {
      let mDescripcion = document.querySelector('.cDescripcion');
      mDescripcion.lastElementChild.innerHTML = "";
    });

    mGastos.addEventListener('keypress', (e) => {
      let mGastos = document.querySelector('.cGastos');
      mGastos.lastElementChild.innerHTML = "";
    });

    mGastos.addEventListener('change', (e) => {
      let mGastos = document.querySelector('.cGastos');
      mGastos.lastElementChild.innerHTML = "";
    });

    mDiaCorte.addEventListener('keypress', (e) => {
      let mDiaCorte = document.querySelector('.cDiaCorte');
      mDiaCorte.lastElementChild.innerHTML = "";
    });

    mDiaCorte.addEventListener('change', (e) => {
      let mDiaCorte = document.querySelector('.cDiaCorte');
      mDiaCorte.lastElementChild.innerHTML = "";
    });
    // Paso 4 // // Fin // Borrar Errores Cajas de Texto

    // Paso 2 // // Inicio // Validar cajas de Texto 
    if (mDescripcion.value.trim() == "") {
      mostrarMensajeErrorCarrefour('cDescripcion', 'Descripcion No Valida *');
      e.preventDefault();
    }

    if (mGastos.value.length < 1 || mGastos.value.trim() == "" || isNaN(mGastos.value)) {
      mostrarMensajeErrorCarrefour('cGastos', 'Gastos No Valido *');
      e.preventDefault();
    }

    if (mDiaCorte.value.trim() == "") {
      mostrarMensajeErrorCarrefour('cDiaCorte', 'Descripcion No Valida *');
      e.preventDefault();
    }
    // Paso 2 // //Fin // Validar cajas de Texto 

    // Paso 3 // // Inicio // Mostrar Errores 
    function mostrarMensajeErrorCarrefour(claseInput, mensaje) {
      let elemento = document.querySelector(`.${claseInput}`);
      elemento.lastElementChild.innerHTML = mensaje;
    }
    // Paso 3 // // Fin // Mostrar Errores 

  });
  // FIN // MODAL REGISTRO CREAR

  function editarCarrefour(idC, description, spending, curtDay, status, idRegister) {
    $('#mIdEditarC').val(idC);
    $('#mDescriptionEditarC').val(description);
    $('#mSpendingEditarC').val(spending);
    $('#mCurtDayEditarC').val(curtDay);
    $('#mStatusEditarC').val(status);
    $('#mIdRegisterEditarC').val(idRegister);

    // Paso 1 // Capturo los ID del Formulario
    const mDescriptionEditarC = document.getElementById('mDescriptionEditarC');
    const mSpendingEditarC = document.getElementById('mSpendingEditarC');
    const mCurtDayEditarC = document.getElementById('mCurtDayEditarC');
    const mEdFormularioCarrefourEditar = document.getElementById('mEdFormularioCarrefourEditar');

    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mDescriptionEditarC.addEventListener('keypress', (e) => {
      let mDescriptionEditarC = document.querySelector('.cDescriptionEditarC');
      mDescriptionEditarC.lastElementChild.innerHTML = "";
    });

    mDescriptionEditarC.addEventListener('change', (e) => {
      let mDescriptionEditarC = document.querySelector('.cDescriptionEditarC');
      mDescriptionEditarC.lastElementChild.innerHTML = "";
    });

    mSpendingEditarC.addEventListener('keypress', (e) => {
      let mSpendingEditarC = document.querySelector('.cEdSpendingEditarC');
      mSpendingEditarC.lastElementChild.innerHTML = "";
    });

    mSpendingEditarC.addEventListener('change', (e) => {
      let mSpendingEditarC = document.querySelector('.cEdSpendingEditarC');
      mSpendingEditarC.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarC.addEventListener('keypress', (e) => {
      let mCurtDayEditarC = document.querySelector('.cCurtDayEditarC');
      mCurtDayEditarC.lastElementChild.innerHTML = "";
    });

    mCurtDayEditarC.addEventListener('change', (e) => {
      let mCurtDayEditarC = document.querySelector('.cCurtDayEditarC');
      mCurtDayEditarC.lastElementChild.innerHTML = "";
    });
    // Paso 4 // // Fin // Borrar Errores Cajas de Texto

    mEdFormularioCarrefourEditar.addEventListener('submit', (e) => {

      // Paso 2 // // Inicio // Validar cajas de Texto 
      if (mDescriptionEditarC.value.trim() == "") {
        mostrarMensajeErrorEditarC('cDescriptionEditarC', 'Descripcion No Valida *');
        e.preventDefault();
      }

      if (mSpendingEditarC.value.length < 1 || mSpendingEditarC.value.trim() == "" || isNaN(mSpendingEditarC.value)) {
        mostrarMensajeErrorEditarC('cEdSpendingEditarC', 'Gastos No Valido *');
        e.preventDefault();
      }

      if (mCurtDayEditarC.value.trim() == "") {
        mostrarMensajeErrorEditarC('cCurtDayEditarC', 'Descripcion No Valida *');
        e.preventDefault();
      }
      // Paso 2 // //Fin // Validar cajas de Texto 
    });

    // Paso 3 // // Inicio // Mostrar Errores 
    function mostrarMensajeErrorEditarC(claseInput, mensaje) {
      let elementoEd = document.querySelector(`.${claseInput}`);
      elementoEd.lastElementChild.innerHTML = mensaje;
    }
    // Paso 3 // // Fin // Mostrar Errores 
  }

  function eliminarCarrefour(idC, description, idRegister) {
    $('#mIdEliminarC').val(idC);
    $('#mDescriptionEliminarC').val(description);
    $('#mIdRegisterC').val(idRegister);
  }
</script>