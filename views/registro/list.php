<!-- Tabla Registro -->
<div class="bs-example4" data-example-id="simple-responsive-table" style="text-align: center;">
  <div class="table-responsive">
    <h1 style="text-align: center;"><strong>Gestión de Finanzas para el Hogar</strong></h1>
    <?php if (isset($_SESSION["mensajeTablaExito"])) : ?>
      <div class="alert alert-success">
        <?= $_SESSION["mensajeTablaExito"]; ?>
      </div>
    <?php elseif (isset($_SESSION["mensajeTablaError"])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $_SESSION["mensajeTablaError"]; ?>
      </div>
    <?php endif; ?>
    <div class="agileits-logo navbar-left">
      <div class="btn-group">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#btncrearnuevo">
          Crear Nuevo
        </button>
        <!-- Inicio Modal -->
        <div class="btn-group">
          <div class="modal fade" id="btncrearnuevo" tabindex="-1" role="dialog" aria-labelledby="btncrearnuevoTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="btncrearnuevoTitle">Crear Registro</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url ?>Registro/crear" method="POST" id="mFormulario" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                    <fieldset>
                      <div class="form-group cIngresoVeronica" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ingresos Veronica</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mIngresoVeronica" name="ingresoVeronica" value="790" ng-model="model.date">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>

                      <div class="form-group cIngresoPablo" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ingresos Pablo</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mIngresoPablo" name="ingresoPablo" value="550" ng-model="model.date">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>

                      <div class="form-group cIngresoExtra" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ingresos Extra</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mIngresoExtra" name="ingresoExtra" value="0" ng-model="model.date">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>

                      <div class="form-group cAhorros" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Ahorros</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" id="mAhorros" name="ahorrosVerpa" value="0" ng-model="model.date">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>

                      <div class="form-group cMes" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Mes</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="mMes" name="mes" ng-model="model.name">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>

                      <div class="form-group cYears" style="padding-bottom: 14px;">
                        <label class="control-label navbar-left"><strong>Año</strong></label>
                        <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="year" id="mYear" ng-model="model.date">
                        <label class="navbar-left" id="mensajeError" style="color: red;"></label>
                      </div>
                      <label class="navbar-left" id="mensajesErroresGenerales" style="color: red;"></label>
                    </fieldset>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" id="mFormuario" class="btn btn-info">Crear</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //Inicio Modal -->
      </div>
    </div>
    </br></br>
    <table class="table table-bordered" id="tablaRegistro">
      <thead>
        <tr>
          <th style="text-align: center;">Ingresos Veronica</th>
          <th style="text-align: center;">Ingresos Pablo</th>
          <th style="text-align: center;">Ingresos Extras</th>
          <th style="text-align: center;">Ahorros</th>
          <th style="text-align: center;">Mes</th>
          <th style="text-align: center;">Año</th>
          <th style="text-align: center;">Historial</th>
          <th style="text-align: center;">Editar</th>
          <th style="text-align: center;">Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($getRegistersAll->num_rows > 0) : ?>
          <?php while ($getRegisterAll = $getRegistersAll->fetch_object()) : ?>
            <tr>
              <td><?= $getRegisterAll->income_veronica ?></td>
              <td><?= $getRegisterAll->income_pablo ?></td>
              <td><?= $getRegisterAll->income_extra ?></td>
              <td><?= $getRegisterAll->saving_verpa ?></td>
              <td><?= $getRegisterAll->month ?></td>
              <td><?= $getRegisterAll->year ?></td>
              <td><a href="<?= base_url ?>Registro/historial&id=<?= $getRegisterAll->id ?>">Crear</a></td>
              <td>
                <button type="button" class="btn btn-primary" onclick="editarRegistro('<?= $getRegisterAll->id ?>', '<?= $getRegisterAll->income_veronica ?>', '<?= $getRegisterAll->income_pablo ?>', '<?= $getRegisterAll->income_extra ?>','<?= $getRegisterAll->saving_verpa ?>', '<?= $getRegisterAll->month ?>', '<?= $getRegisterAll->year ?>')" data-toggle="modal" data-target="#btneditar">
                  Editar<div class="btn-group">
                </button>
                <!-- Inicio Modal -->
                <div class="btn-group">
                  <div class="modal fade" id="btneditar" tabindex="-1" role="dialog" aria-labelledby="btneditarTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="btneditarTitle">Editar Registro</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- Formulario Inicial -->
                        <div class="modal-body">
                          <form action="<?= base_url ?>Registro/editar" id="mEdFormulario" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                            <fieldset>
                              <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdEd" ng-model="model.date">

                              <div class="form-group cIngresoVeronicaEd" style="padding-bottom: 14px;">
                                <label class="control-label navbar-left"><strong>Ingresos Veronica</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoVeronica" id="mIngresoVeronicaEd" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>

                              <div class="form-group cIngresoPabloEd" style="padding-bottom: 14px;">
                                <label class=" control-label navbar-left"><strong>Ingresos Pablo</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoPablo" id="mIngresoPabloEd" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>

                              <div class="form-group cIngresoExtraEd" style="padding-bottom: 14px;">
                                <label class="control-label navbar-left"><strong>Ingresos Extra</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ingresoExtra" id="mIngresoExtraEd" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>

                              <div class="form-group cSavingVerpaEd" style="padding-bottom: 14px;">
                                <label class="control-label navbar-left"><strong>Ahorros</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="ahorrosVerpa" id="mSavingVerpaEd" value="0" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>

                              <div class="form-group cMesEd">
                                <label class="control-label navbar-left"><strong>Mes</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="mes" id="mMesEd" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>

                              <div class="form-group cYearEd">
                                <label class="control-label navbar-left"><strong>Año</strong></label>
                                <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="year" id="mYearEd" ng-model="model.date">
                                <label class="navbar-left" id="mensajeErrorEd" style="color: red;"></label>
                              </div>
                              <br>
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
                <div class="btn-group">
                  <button type="button" class="btn btn-warning" onclick="eliminarRegistro('<?= $getRegisterAll->id ?>', '<?= $getRegisterAll->month ?>', '<?= $getRegisterAll->year ?>')" data-toggle="modal" data-target="#btneliminar">
                    Eliminar
                  </button>
                  <!-- Inicio Modal -->
                  <div class="btn-group">
                    <div class="modal fade" id="btneliminar" tabindex="-1" role="dialog" aria-labelledby="btneliminarTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="btneliminarTitle">Eliminar Registro</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url ?>Registro/delete" method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
                              <fieldset>
                                <input type="hidden" class="form-control1 ng-invalid ng-invalid-required" name="id" id="mIdE" ng-model="model.date">

                                <div class="form-group">
                                  <label class="control-label navbar-left"><strong>Mes</strong></label>
                                  <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="mes" id="mMesE" value="" ng-model="model.date" disabled>
                                </div>

                                <div class="form-group">
                                  <label class="control-label navbar-left"><strong>Año</strong></label>
                                  <input type="text" class="form-control1 ng-invalid ng-invalid-required" name="year" id="mYearE" value="" ng-model="model.date" disabled>
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
<?php Utils::borrarErrores(); ?>

<script>
  // INICIO // MODAL REGISTRO CREAR
  // Paso 1 // Capturo los ID del Formulario
  const ingresoVeronica = document.getElementById('mIngresoVeronica');
  const ingresoPablo = document.getElementById('mIngresoPablo');
  const ingresoExtra = document.getElementById('mIngresoExtra');
  const ahorros = document.getElementById('mAhorros');
  const mes = document.getElementById('mMes');
  const year = document.getElementById('mYear');
  const formulario = document.getElementById('mFormulario');

  // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
  ingresoVeronica.addEventListener('keypress', (e) => {
    let cIngresoVeronica = document.querySelector('.cIngresoVeronica');
    cIngresoVeronica.lastElementChild.innerHTML = "";
  });

  ingresoVeronica.addEventListener('change', (e) => {
    let cIngresoVeronica = document.querySelector('.cIngresoVeronica');
    cIngresoVeronica.lastElementChild.innerHTML = "";
  });

  ingresoPablo.addEventListener('keypress', (e) => {
    let cIngresoPablo = document.querySelector('.cIngresoPablo');
    cIngresoPablo.lastElementChild.innerHTML = "";
  });

  ingresoPablo.addEventListener('change', (e) => {
    let cIngresoPablo = document.querySelector('.cIngresoPablo');
    cIngresoPablo.lastElementChild.innerHTML = "";
  });

  ingresoExtra.addEventListener('keypress', (e) => {
    let cIngresoExtra = document.querySelector('.cIngresoExtra');
    cIngresoExtra.lastElementChild.innerHTML = "";
  });

  ingresoExtra.addEventListener('change', (e) => {
    let cIngresoExtra = document.querySelector('.cIngresoExtra');
    cIngresoExtra.lastElementChild.innerHTML = "";
  });

  ahorros.addEventListener('change', (e) => {
    let cAhorros = document.querySelector('.cAhorros');
    cAhorros.lastElementChild.innerHTML = "";
  });

  ahorros.addEventListener('keypress', (e) => {
    let cAhorros = document.querySelector('.cAhorros');
    cAhorros.lastElementChild.innerHTML = "";
  });

  mes.addEventListener('change', (e) => {
    let cMes = document.querySelector('.cMes');
    cMes.lastElementChild.innerHTML = "";
  });

  mes.addEventListener('keypress', (e) => {
    let cMes = document.querySelector('.cMes');
    cMes.lastElementChild.innerHTML = "";
  });

  year.addEventListener('change', (e) => {
    let cYear = document.querySelector('.cYears');
    cYear.lastElementChild.innerHTML = "";
  });

  year.addEventListener('keypress', (e) => {
    let cYear = document.querySelector('.cYears');
    cYear.lastElementChild.innerHTML = "";
  });

  // Paso 4 // // Fin // Borrar Errores Cajas de Texto

  // Paso 2 // // Inicio // Validar cajas de Texto  
  formulario.addEventListener('submit', (e) => {

    if (ingresoVeronica.value.length < 1 || ingresoVeronica.value.trim() == "" || isNaN(ingresoVeronica.value)) {
      mostrarMensajeError('cIngresoVeronica', 'Ingreso Vero No Valido *');
      e.preventDefault();
    }

    if (ingresoPablo.value.length < 1 || ingresoPablo.value.trim() == "" || isNaN(ingresoPablo.value)) {
      mostrarMensajeError('cIngresoPablo', 'Ingreso Pablo No Valido *');
      e.preventDefault();
    }

    if (ingresoExtra.value.length < 1 || ingresoExtra.value.trim() == "" || isNaN(ingresoExtra.value)) {
      mostrarMensajeError('cIngresoExtra', 'Ingreso Extra No Valido *');
      e.preventDefault();
    }

    if (ahorros.value.length < 1 || ahorros.value.trim() == "" || isNaN(ahorros.value)) {
      mostrarMensajeError('cAhorros', 'Ahorros No Valido *');
      e.preventDefault();
    }

    if (mes.value.length < 1 || mes.value.trim() == "" || !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]*$/.test(mes.value)) {
      mostrarMensajeError('cMes', 'Mes No Valido *');
      e.preventDefault();
    }

    if (year.value.length < 1 || year.value.trim() == "" || isNaN(year.value)) {
      mostrarMensajeError('cYears', 'No Valido YEAR *');
      e.preventDefault();
    }

    if (existeCoincidenciaFechaEnLaTabla(mes.value, year.value)) {
      let mensajesErroresGenerales = document.querySelector('#mensajesErroresGenerales');
      mensajesErroresGenerales.innerHTML = 'El Mes y el Año Existen *';
      e.preventDefault();
    }
    return true;
  });
  // Paso 2 // // Fin // Validar cajas de Texto  

  // Paso 3 // // Inicio // Mostrar Errores 
  function mostrarMensajeError(claseInput, mensaje) {
    let elemento = document.querySelector(`.${claseInput}`);
    elemento.lastElementChild.innerHTML = mensaje;
  }
  // Paso 3 // // Fin // Mostrar Errores 

  // Paso 5 // // Inicio // Mostrar Coincidencia de Fecha Registro
  function existeCoincidenciaFechaEnLaTabla(month, year) {
    let coincidencia = false;
    let tablaRegistro = document.querySelector('#tablaRegistro');
    let cuerpoTabla = tablaRegistro.children[1];

    for (let index = 0; index < cuerpoTabla.rows.length; index++) {
      const element = cuerpoTabla.rows[index];
      let mes = element.children[4].innerHTML;
      let anio = element.children[5].innerHTML;

      if (mes == month && anio == year) {
        coincidencia = true;
        break;
      }
    }
    return coincidencia;
  }
  // Paso 5 // // Fin // Mostrar Coincidencia de Fecha Registro
  // FIN // MODAL REGISTRO CREAR....

  // INICIO // MODAL REGISTRO EDITAR
  function editarRegistro(id, income_veronica, income_pablo, income_extra, saving_verpa, month, year) {
    // Paso 0 // Imprimo los Registros de PHP en la Caja de Texto
    $('#mIdEd').val(id);
    $('#mIngresoVeronicaEd').val(income_veronica);
    $('#mIngresoPabloEd').val(income_pablo);
    $('#mIngresoExtraEd').val(income_extra);
    $('#mSavingVerpaEd').val(saving_verpa);
    $('#mMesEd').val(month);
    $('#mYearEd').val(year);

    // Paso 1 // Capturo los ID del Formulario
    const mIngresoVeronicaEd = document.getElementById('mIngresoVeronicaEd');
    const mIngresoPabloEd = document.getElementById('mIngresoPabloEd');
    const mIngresoExtraEd = document.getElementById('mIngresoExtraEd');
    const mSavingVerpaEd = document.getElementById('mSavingVerpaEd');
    const mEdFormulario = document.getElementById('mEdFormulario');
    const mMesEd = document.getElementById('mMesEd');
    const mYearEd = document.getElementById('mYearEd');


    // Paso 4 // // Inicio // Borrar Errores Cajas de Texto
    mIngresoVeronicaEd.addEventListener('keypress', (e) => {
      let mIngresoVeronicaEd = document.querySelector('.cIngresoVeronicaEd');
      mIngresoVeronicaEd.lastElementChild.innerHTML = "";
    });

    mIngresoVeronicaEd.addEventListener('change', (e) => {
      let mIngresoVeronicaEd = document.querySelector('.cIngresoVeronicaEd');
      mIngresoVeronicaEd.lastElementChild.innerHTML = "";
    });

    mIngresoPabloEd.addEventListener('keypress', (e) => {
      let mIngresoPabloEd = document.querySelector('.cIngresoPabloEd');
      mIngresoPabloEd.lastElementChild.innerHTML = "";
    });

    mIngresoPabloEd.addEventListener('change', (e) => {
      let mIngresoPabloEd = document.querySelector('.cIngresoPabloEd');
      mIngresoPabloEd.lastElementChild.innerHTML = "";
    });

    mIngresoExtraEd.addEventListener('keypress', (e) => {
      let mIngresoExtraEd = document.querySelector('.cIngresoExtraEd');
      mIngresoExtraEd.lastElementChild.innerHTML = "";
    });

    mIngresoExtraEd.addEventListener('change', (e) => {
      let mIngresoExtraEd = document.querySelector('.cIngresoExtraEd');
      mIngresoExtraEd.lastElementChild.innerHTML = "";
    });

    mSavingVerpaEd.addEventListener('keypress', (e) => {
      let mSavingVerpaEd = document.querySelector('.cSavingVerpaEd');
      mSavingVerpaEd.lastElementChild.innerHTML = "";
    });

    mSavingVerpaEd.addEventListener('change', (e) => {
      let mSavingVerpaEd = document.querySelector('.cSavingVerpaEd');
      mSavingVerpaEd.lastElementChild.innerHTML = "";
    });

    mMesEd.addEventListener('keypress', (e) => {
      let mMesEd = document.querySelector('.cMesEd');
      mMesEd.lastElementChild.innerHTML = "";
    });

    mMesEd.addEventListener('change', (e) => {
      let mMesEd = document.querySelector('.cMesEd');
      mMesEd.lastElementChild.innerHTML = "";
    });

    mYearEd.addEventListener('keypress', (e) => {
      let mYearEd = document.querySelector('.cYearEd');
      mYearEd.lastElementChild.innerHTML = "";
    });

    mYearEd.addEventListener('change', (e) => {
      let mYearEd = document.querySelector('.cYearEd');
      mYearEd.lastElementChild.innerHTML = "";
    });
    // Paso 4 // // Fin // Borrar Errores Cajas de Texto

    // Paso 2 // // Inicio // Validar cajas de Texto  
    mEdFormulario.addEventListener('submit', (e) => {
      if (mIngresoVeronicaEd.value.length < 1 || mIngresoVeronicaEd.value.trim() == "" || isNaN(mIngresoVeronicaEd.value)) {
        mostrarMensajeErrorEd('cIngresoVeronicaEd', 'Ingreso Vero No Valido *');
        e.preventDefault();
      }
      if (mIngresoPabloEd.value.length < 1 || mIngresoPabloEd.value.trim() == "" || isNaN(mIngresoPabloEd.value)) {
        mostrarMensajeErrorEd('cIngresoPabloEd', 'Ingreso Pablo No Valido *');
        e.preventDefault();
      }

      if (mIngresoExtraEd.value.length < 1 || mIngresoExtraEd.value.trim() == "" || isNaN(mIngresoExtraEd.value)) {
        mostrarMensajeErrorEd('cIngresoExtraEd', 'Ingreso Extra No Valido *');
        e.preventDefault();
      }

      if (mSavingVerpaEd.value.length < 1 || mSavingVerpaEd.value.trim() == "" || isNaN(mSavingVerpaEd.value)) {
        mostrarMensajeErrorEd('cSavingVerpaEd', 'Ahorros No Valido *');
        e.preventDefault();
      }

      if (mMesEd.value.length < 1 || mMesEd.value.trim() == "" || !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]*$/.test(mMesEd.value)) {
        mostrarMensajeErrorEd('cMesEd', 'Mes No Valido *');
        e.preventDefault();
      }

      if (mYearEd.value.length < 1 || mYearEd.value.trim() == "" || isNaN(mYearEd.value)) {
        mostrarMensajeErrorEd('cYearEd', 'No Valido YEAR *');
        e.preventDefault();
      }

      if (existeCoincidenciaFechaEnLaTablaEd(mMesEd.value, mYearEd.value)) {
        let mensajesErroresGeneralesEd = document.querySelector('#mensajesErroresGeneralesEd');
        mensajesErroresGeneralesEd.innerHTML = 'El Mes y el Año Siii Existen *';
        e.preventDefault();
      }
      return true;
    });
    // Paso 2 // // Fin // Validar cajas de Texto  

    // Paso 3 // // Inicio // Mostrar Errores 
    function mostrarMensajeErrorEd(claseInput, mensaje) {
      let elementoEd = document.querySelector(`.${claseInput}`);
      elementoEd.lastElementChild.innerHTML = mensaje;
    }
    // Paso 3 // // Fin // Mostrar Errores 
  }
  // FIN // MODAL REGISTRO EDITAR...


  // INICIO // MODAL REGISTRO ELIMINAR
  function eliminarRegistro(id, month, year) {
    $('#mIdE').val(id);
    $('#mMesE').val(month);
    $('#mYearE').val(year);
    console.log(id, month, year);
  }
  // FIN // MODAL REGISTRO ELIMINAR
</script>