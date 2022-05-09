<?php

class htmlConfiguracion
{

  public static function obtenerTodos($imputBuscador, $paginaActual, $obtenerIdRegistro)
  {
    $configuracion = new Configuracion();
    $configuracion->setBuscador($imputBuscador);
    $configuracion->setIdRegistro($obtenerIdRegistro);

    // Estadisticas Banner
    estadisticas::banner($obtenerIdRegistro);

    // Paginador 1: Extraer el Conteo de Registros de la Base de Datos
    $conteoRegistros = $configuracion->conteoRegistros();

    // Paginador 2: Muestro el total de Registros que se van a Mostrar
    $mostrarRegistros = 10;

    // Paginador 3: Capturo la Pagina Actual => Para Limitar Los Registros, Primer Parametro
    $ultimoRegistro = ($paginaActual - 1) * $mostrarRegistros;

    // Paginador 4: Total de Registros que voy a Mostrar
    $obtenerPaginas = ceil($conteoRegistros / $mostrarRegistros);

    // Pagina Anterior
    $paginaAnterior = $paginaActual - 1;

    // Pagina Siguiente
    $paginaSiguiente = $paginaActual + 1;

    // Obtener Lista
    $obtenerLista = $configuracion->listar($ultimoRegistro, $mostrarRegistros);

    // Obtener por id Register
    $obtenerRegistro = $configuracion->obtenerRegistroByIdRegister();

    echo '<div class="agileits-logo navbar-left">';

    echo '<div class="col-md-6 grid_2">';
    echo '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalCrearConfiguracion">Crear Historial</button>';
    echo '</div>';

    echo '<div class="col-md-6 grid_2">';
    echo '<a href="" id="" class="btn btn-success" data-toggle="modal" data-target="#modalEditarRegistroC" onclick="editarRegistroConfig(' . $obtenerRegistro->id . ', ' . $obtenerRegistro->income_veronica . ', ' . $obtenerRegistro->income_pablo . ', ' . $obtenerRegistro->income_extra . ', ' . $obtenerRegistro->saving_verpa . ', \'' . $obtenerRegistro->month . '\', ' . $obtenerRegistro->year . ', ' . $paginaActual . ')">Editar Registro</a>';
    echo '</div>';

    echo '</div>';

    echo '</br></br>';

    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style=" text-align: center;">Id</th>';
    echo '<th style=" text-align: center;">Nombre</th>';
    echo '<th style="text-align: center;">Descripcion</th>';
    echo '<th style="text-align: center;">Gastos</th>';
    echo '<th style="text-align: center;">Fecha Corte</th>';
    echo '<th style="text-align: center;">Status</th>';
    echo '<th style="text-align: center;">Editar</th>';
    echo '<th style="text-align: center;">Eliminar</th>';

    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';

    if ($obtenerLista->num_rows > 0) {

      while ($listarRegistros = $obtenerLista->fetch_object()) {

        echo '<tr>';

        echo '<td>' . $listarRegistros->id . '</td>';
        echo '<td>' . $listarRegistros->nombre . '</td>';
        echo '<td>' . $listarRegistros->descripcion . '</td>';
        echo '<td>' . $listarRegistros->gastos . '</td>';
        echo '<td>' . $listarRegistros->fechaCorte . '</td>';
        echo '<td>' . $listarRegistros->status . '</td>';

        echo '<td>';
        echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditarConfig" onclick="editarConfig(' . $listarRegistros->id . ',\'' . $listarRegistros->nombre . '\',\'' . $listarRegistros->descripcion . '\',' . $listarRegistros->gastos . ',\'' . $listarRegistros->fechaCorte . '\',\'' . $listarRegistros->status . '\', ' . $paginaActual . ' )">Editar</button>';
        echo '</td>';

        echo '<td>';
        echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarrConfig" onclick="eliminarConfig(' . $listarRegistros->id . ',\'' . $listarRegistros->nombre . '\',\'' . $listarRegistros->descripcion . '\',' . $listarRegistros->gastos . ',\'' . $listarRegistros->fechaCorte . '\',\'' . $listarRegistros->status . '\', ' . $paginaActual . ' )">Eliminar</button>';
        echo '</td>';

        echo '</tr>';
      };
    } else {
      echo '<td colspan="10" class="alert alert-success" role="alert">No hay ningun registro</td>';
    }

    echo '</tbody>';

    echo '</table>';


    // Paginador => Inicio
    echo '<nav aria-label="Page navigation example" style="text-align: center;">';
    echo '<ul class="pagination justify-content-end">';

    // Anterior
    if ($paginaActual != 1) {
      echo '<li class="page-item">';
      echo '<a class="page-link" onclick = "obtenerConfigTabla(\'' . $imputBuscador . '\', ' . $paginaAnterior . ')"> Anterior </a>';
      echo '</li>';
    } else {
      echo '<li class="page-item disabled">';
      echo '<a class="page-link" >Anterior</a>';
      echo '</li>';
    }


    // Cuerpo 
    for ($i = 1; $i <= $obtenerPaginas; $i++) {
      if ($i == $paginaActual) {
        echo '<li class="page-item active"><a class="page-link" >' . $i . '</a></li>';
      } else {
        echo '<li class="page-item"><a class="page-link"  onclick = "obtenerConfigTabla(\'' . $imputBuscador . '\', ' . $i . ')">' . $i . '</a></li>';
      }
    }

    // Siguiente 
    if ($paginaActual != $obtenerPaginas) {
      echo '<li class="page-item">';
      echo '<a class="page-link"  onclick = "obtenerConfigTabla(\'' . $imputBuscador . '\', ' . $paginaSiguiente . ')" >Siguente</a>';
      echo '</li>';
    } else {
      echo '<li class="page-item disabled">';
      echo '<a class="page-link" >Siguente</a>';
      echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
  }
}
