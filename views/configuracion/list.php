<!-- Banner de Cuentas One -->
<div class="graphs">
  <div class="col_3">
    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5 id="ingresosTotales"></h5>
          <span>Ingresos Totales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5 id="dineroRestante"></h5>
          <span>Dinero Restante</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
        <div class="stats">
          <h5 id="ahorros"></h5>
          <span>Ahorros</span>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<!-- Banner de Cuentas Two -->
<div class="graphs">
  <div class="col_3">
    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
        <div class="stats">
          <h5 id="deudasGlobales"></h5>
          <span>Deudas Globales</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
        <div class="stats">
          <h5 id="gastosCarrefour"></h5>
          <span>Carrefour</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
        <div class="stats">
          <h5 id="gastosServicios"></h5>
          <span>Servicios</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 widget widget1">
      <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar user1 icon-rounded"></i>
        <div class="stats">
          <h5 id="gastosDeudas"></h5>
          <span>Deudas</span>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>

</div>
<!-- //Banner de Cuentas -->

<!-- Obtengo el id Registro Por Get-->
<input type="hidden" id="obtenerIdRegistro" value="<?= $obtenerIdRegistro ?>">

<div id="respuestaPeticionRepoblar"></div>
<!-- Tabla Configuracion -->
<div class="bs-example4" data-example-id="simple-responsive-table" style="text-align: center;">
  <div class="table-responsive" id="tablaConfiguracion">
  </div>
</div>

<!-- Modal Crear Configuracion -->
<div class="modal fade" id="modalCrearConfiguracion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Crear Historial</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="crearFormularioConfig" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate">
          <fieldset>

            <div id="configuracionPeticionAjax" style="display: none;"></div>

            <div class="form-group" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Nombre</strong></label>
            </div>

            <select class="form-control" id="crearNombreConfig">
              <option selected>Selecione Aqui...</option>
              <option>Carrefour</option>
              <option>Servicios</option>
              <option>Deudas</option>
            </select>
            <br>

            <div class="form-group" id="claseCrearDescripcionConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Descripción</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="crearDescripcionConfig">
              <label class="navbar-left" id="mensajeErrorDescripcion" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseCrearGastosConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Gastos</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="crearGastosConfig">
              <label class="navbar-left" id="mensajeErrorGastos" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseCrearFechaCorteConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>FechaCorte</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="crearFechaCorteConfig">
              <label class="navbar-left" id="mensajeErrorFechaCorte" style="color: red;"></label>
            </div>

            <div class="form-group">
              <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
            </div>
            <select class="form-control" name="statusCrearConfig[]" id="statusCrearConfig">
              <option name="status">PENDIENTE</option>
              <option name="status">PAGADO</option>
            </select>
            <br>

          </fieldset>

          <div class="modal-footer">
            <!-- data-dismiss="modal" -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnCrearConfiguracion">Aceptar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditarConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Editar Historial</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="editarFormularioConfig" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate">
          <fieldset>

            <div id="editarConfiguracionPeticionAjax" style="display: none;"></div>
            
            <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="idConfig" style="display: none;">
            <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="editPaginaActualConfig" style="display: none;">

            <div class="form-group">
              <label class="control-label navbar-left"><strong>Nombre</strong></label>
            </div>
            <select class="form-control" id="editNombreConfig">
              <option selected>Selecione Aqui...</option>
              <option>Carrefour</option>
              <option>Servicios</option>
              <option>Deudas</option>
            </select>
            <br>

            <div class="form-group" id="claseEditDescripcionConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Descripción</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="editDescripcionConfig">
              <label class="navbar-left" id="mensajeErrorDescripcion" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseEditGastosConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Gastos</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="editGastosConfig">
              <label class="navbar-left" id="mensajeErrorGastos" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseEditFechaCorteConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>FechaCorte</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="editFechaCorteConfig">
              <label class="navbar-left" id="mensajeErrorFechaCorte" style="color: red;"></label>
            </div>

            <div class="form-group">
              <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
            </div>
            <select class="form-control" name="statusCrearConfig[]" id="statusEditConfig">
              <option name="status">PENDIENTE</option>
              <option name="status">PAGADO</option>
            </select>
            <br>
          </fieldset>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnEditarConfiguracion">Editar</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminarrConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Eliminar Configuración</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div id="eliminarConfigPeticionAjax"></div>

        <form id="eliminarFormularioConfig" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate">

          <fieldset>
            <div id="eliminarConfigPeticionAjax" style="display: none;"></div>
            <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarIdConfig" style="display:none">
            <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarPaginaActualConfig" style="display:none">

            <div class="form-group" id="claseEliminarNombreConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Nombre</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarNombreConfig" disabled>
              <label class="navbar-left" id="mensajeErrorNombre" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseEliminarDescripcionConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Descripción</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarDescripcionConfig" disabled>
              <label class="navbar-left" id="mensajeErrorDescripcion" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseEliminarGastosConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>Gastos</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarGastosConfig" disabled>
              <label class="navbar-left" id="mensajeErrorGastos" style="color: red;"></label>
            </div>

            <div class="form-group" id="claseEliminarFechaCorteConfig" style="padding-bottom: 14px;">
              <label class="control-label navbar-left"><strong>FechaCorte</strong></label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="eliminarFechaCorteConfig" disabled>
              <label class="navbar-left" id="mensajeErrorFechaCorte" style="color: red;"></label>
            </div>

            <div class="form-group">
              <label class="control-label navbar-left"><strong>Selecciona el Estatus</strong></label>
            </div>
            <select class="form-control" name="statusCrearConfig[]" id="statusEliminarConfig" disabled>
              <option name="status">PENDIENTE</option>
              <option name="status">PAGADO</option>
            </select>
            <br>
          </fieldset>

          <div class="modal-footer">
            <!-- data-dismiss="modal" -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="btnEliminarConfiguracion">Eliminar</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal Editar Config Registro -->
<div class="btn-group">
  <div class="modal fade" id="modalEditarRegistroC" tabindex="-1" role="dialog" aria-labelledby="btneditarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Editar Registro</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Formulario Inicial -->
        <div class="modal-body">
          <form id="editarFormularioRegistro" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate">
            <fieldset>

              <div id="editarRegistroCPeticionAjax" style="display: none;"></div>

              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" id="idEditC">
              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" id="paginaActualEditC">

              <div class="form-group" id="claseEditCIngresoVeronicaR" style="padding-bottom: 14px;">
                <label class="control-label navbar-left"><strong>Ingresos Veronica</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="ingresoVeronicaEditC">
                <label class="navbar-left" id="idMensajeErrorIngresosVeronicaEditarC" style="color: red;"></label>
              </div>

              <div class="form-group" id="claseEditCIngresoPabloR" style="padding-bottom: 14px;">
                <label class=" control-label navbar-left"><strong>Ingresos Pablo</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="ingresoPabloEditC">
                <label class="navbar-left" id="idMensajeErrorIngresoPabloEditarC" style="color: red;"></label>
              </div>

              <div class="form-group" id="claseEditCIngresoExtraR" style="padding-bottom: 14px;">
                <label class="control-label navbar-left"><strong>Ingresos Extra</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="ingresoExtraEditC">
                <label class="navbar-left" id="idMensajeErrorIngresoExtraEditarC" style="color: red;"></label>
              </div>

              <div class="form-group" id="claseEditCAhorrosR" style="padding-bottom: 14px;">
                <label class="control-label navbar-left"><strong>Ahorros</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="ahorrosEditC">
                <label class="navbar-left" id="idMensajeErrorAhorrosEditarC" style="color: red;"></label>
              </div>

              <div class="form-group" id="claseEditCMesR" style="padding-bottom: 14px;">
                <label class="control-label navbar-left"><strong>Mes</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mesEditC">
                <label class="navbar-left" id="idMensajeErrorMesEditarC" style="color: red;"></label>
              </div>

              <div class="form-group" id="claseEditCYearR">
                <label class="control-label navbar-left"><strong>Año</strong></label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="yearEditC">
                <label class="navbar-left" id="idMensajeErrorYearEditarC" style="color: red;"></label>
              </div>
              <br>
            </fieldset>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary" id="btnEditarCRegistro">Aceptar</button>
            </div>
          </form>
        </div>
        <!-- //Formulario Final -->
      </div>
    </div>
  </div>
</div>