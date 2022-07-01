
function repoblar(repoblarId) {

  $('#repoblarId').val(repoblarId);

}

//Capturo los elementos por id
let btnRepoblar = document.getElementById('btnRepoblar');
let inputRepoblarId = document.getElementById('repoblarId');


if (btnRepoblar) {

  btnRepoblar.addEventListener("click", (e) => {
    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: baseUrl + 'Configuracion/repoblar',
      data: {
        repoblar: inputRepoblarId.value
      },

    })
      .done(function (respuestaPeticion) {
        $('#respuestaPeticionRepoblar').html(respuestaPeticion);

        if (respuestaPeticion == 1) {
          let paginaActualConfig = 1;
          obtenerConfigTabla('', paginaActualConfig);
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Repoblado Correctamente',
            showConfirmButton: false,
            timer: 800
          })
          $("#modalRepoblar").modal('hide');
        }

      })
      .fail(function () {
        console.log('error');
      })
      .always(function () {
        console.log('completo');
      });
  });
}