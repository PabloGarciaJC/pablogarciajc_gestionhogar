
let paginaActualConfig = 1;

// Se ejecuta Primero La Tabla
obtenerConfigTabla('', paginaActualConfig);

// Capturo los elementos por id
let buscadorConfig = document.getElementById('buscadorConfiguracion');

// Capturo el Buscador a tiempo Real
if (buscadorConfig) {
  buscadorConfig.addEventListener('keyup', (event) => {
    let imputBuscadorConfig = event.path[0].value;
    obtenerConfigTabla(imputBuscadorConfig, paginaActualConfig);
  });
};

function obtenerConfigTabla(imputBuscadorConfig, paginaActualConfig) {

  // Obtengo el id Registro POR GET
  let obtenerIdRegistroBuscador = document.getElementById('obtenerIdRegistro');

  if (obtenerIdRegistroBuscador) {
    $.ajax({
      type: 'POST',
      url: baseUrl + 'Configuracion/buscador',
      data: {
        imputBuscadorConfig: imputBuscadorConfig,
        paginaActualConfig: paginaActualConfig,
        obtenerIdRegistro: obtenerIdRegistroBuscador.value
      },
    })
      .done(function (respuestaPeticion) {
        $('#tablaConfiguracion').html(respuestaPeticion);
      })
      .fail(function () {
        console.log('error');
      })
      .always(function () {
        console.log('completo');
      });
  }
}