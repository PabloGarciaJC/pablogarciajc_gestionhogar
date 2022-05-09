
function editarRegistroConfig(idEditC, ingresoVeronicaEditC, ingresoPabloEditC, ingresoExtraEditC, ahorrosEdict, mesEdict, yearEdict, paginaActualEditC) {
  //Repoblar Inputs
  $('#idEditC').val(idEditC);
  $('#ingresoVeronicaEditC').val(ingresoVeronicaEditC);
  $('#ingresoPabloEditC').val(ingresoPabloEditC);
  $('#ingresoExtraEditC').val(ingresoExtraEditC);
  $('#ahorrosEditC').val(ahorrosEdict);
  $('#mesEditC').val(mesEdict);
  $('#yearEditC').val(yearEdict);
  $('#paginaActualEditC').val(paginaActualEditC);
}

// Capturo los elementos por id
let idEditC = document.getElementById('idEditC');
let ingresoVeronicaEditC = document.getElementById('ingresoVeronicaEditC');
let ingresoPabloEditC = document.getElementById('ingresoPabloEditC');
let ingresoExtraEditC = document.getElementById('ingresoExtraEditC');
let ahorrosEditC = document.getElementById('ahorrosEditC');
let mesEditC = document.getElementById('mesEditC');
let yearEditC = document.getElementById('yearEditC');
let paginaActualEditC = document.getElementById('paginaActualEditC');
let btnEditarCRegistro = document.getElementById('btnEditarCRegistro');

if (btnEditarCRegistro) {
  btnEditarCRegistro.addEventListener("click", (e) => {
    e.preventDefault();
    // Eventos de inputs
    eventoInputs(ingresoVeronicaEditC, 'keypress', 'claseEditCIngresoVeronicaR');
    eventoInputs(ingresoVeronicaEditC, 'change', 'claseEditCIngresoVeronicaR');

    eventoInputs(ingresoPabloEditC, 'keypress', 'claseEditCIngresoPabloR');
    eventoInputs(ingresoPabloEditC, 'change', 'claseEditCIngresoPabloR');

    eventoInputs(ingresoExtraEditC, 'keypress', 'claseEditCIngresoExtraR');
    eventoInputs(ingresoExtraEditC, 'change', 'claseEditCIngresoExtraR');

    eventoInputs(ahorrosEditC, 'keypress', 'claseEditCAhorrosR');
    eventoInputs(ahorrosEditC, 'change', 'claseEditCAhorrosR');

    eventoInputs(mesEditC, 'keypress', 'claseEditCMesR');
    eventoInputs(mesEditC, 'change', 'claseEditCMesR');

    eventoInputs(yearEditC, 'keypress', 'claseEditCYearR');
    eventoInputs(yearEditC, 'change', 'claseEditCYearR');

    let validacionFormularioEditarC = validacionesRegistro(ingresoVeronicaEditC, ingresoPabloEditC, ingresoExtraEditC, ahorrosEditC, mesEditC, yearEditC);


    if (validacionFormularioEditarC == true) {
      ajaxEditarC(idEditC, ingresoVeronicaEditC, ingresoPabloEditC, ingresoExtraEditC, ahorrosEditC, mesEditC, yearEditC, paginaActualEditC);
    }

  });

}

function ajaxEditarC(idEditC, ingresoVeronicaEditC, ingresoPabloEditC, ingresoExtraEditC, ahorrosEditC, mesEditC, yearEditC, paginaActualEditC) {
  $.ajax({
    type: 'POST',
    url: baseUrl + 'Registro/editar',
    data: {
      id: idEditC.value,
      ingresoVeronica: ingresoVeronicaEditC.value,
      ingresoPablo: ingresoPabloEditC.value,
      ingresoExtra: ingresoExtraEditC.value,
      ahorros: ahorrosEditC.value,
      mes: mesEditC.value,
      year: yearEditC.value
    },
  }).done(function (respuestaPeticion) {

    $('#editarRegistroCPeticionAjax').html(respuestaPeticion);

    if (respuestaPeticion == 1) {
      let EditCPaginaActual = paginaActualEditC.value;
      obtenerConfigTabla('', EditCPaginaActual);
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Actualizado Correctamente',
        showConfirmButton: false,
        timer: 800
      })
      $("#modalEditarRegistroC").modal('hide');
    } else {
      Swal.fire({ title: 'El mes y año, ya estan registrados !!' })
    }
  })
    .fail(function () {
      console.log('error');
    })
    .always(function () {
      console.log('completo');
    });
}

















