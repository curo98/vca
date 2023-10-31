<?php


/*DB::listen(function($query)
{
	echo "<pre>{{ $query->sql }}</pre>";
});*/

Route::get('/images/{path}/{attachment}', function($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if(File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::get('/', 'PaginaController@inicio')->name('pagina.inicio');

Route::get('servicios', 'PaginaController@servicios')->name('pagina.servicios');

Route::get('servicio/{id}', 'Admin\ServicioController@show')->name('servicio.detalle');

Route::get('/nosotros', 'PaginaController@nosotros')->name('pagina.nosotros');

Route::get('/proyectos', 'PaginaController@proyectos')->name('pagina.proyectos');

Route::get('/contactanos', 'PaginaController@contacto')->name('pagina.contactanos');

Route::post('/contactar', 'PaginaController@enviarMensaje')->name('contactar');

Route::get('ordenes-de-servicios', 'Admin\OrdenDeServicioController@index')->name('pagina.ordenes_de_servicios');

Route::get('orden-de-servicio', 'Admin\OrdenDeServicioController@create')->name('pagina.orden_de_servicio');

Route::post('/orden-de-servicio', 'Admin\OrdenDeServicioController@store')->name('orden_de_servicio');

Route::put('/orden-de-servicio/{id}/actualizar', 'Admin\OrdenDeServicioController@update')->name('actualizar.orden');

Route::get('/orden-de-servicio/{id}/editar', 'Admin\OrdenDeServicioController@edit')->name('editar.orden');

Route::delete('/orden-de-servicio/{id}/eliminar', 'Admin\OrdenDeServicioController@destroy')->name('eliminar.orden');

Auth::routes();

//Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/panel-de-control', 'Admin\DashboardController@index')->name('dashboard');

Route::put('iniciar-orden/{id}', 'Admin\EstadoController@iniciar')->name('iniciar');

Route::put('finalizar-orden/{id}', 'Admin\EstadoController@finalizar')->name('finalizar');

Route::resource('usuarios', 'UsuarioController');

Route::resource('mensajes', 'MensajeController');

Route::get('trabajadores', 'TrabajadorController@index')->name('trabajadores');

Route::get('trabajadores/create', 'TrabajadorController@create')->name('crear.trabajador');

Route::post('trabajadores/guardar', 'TrabajadorController@store')->name('guardar.trabajador');

Route::delete('trabajadores/{id}/eliminar', 'TrabajadorController@destroy')->name('trabajador.eliminar');

Route::get('trabajadores/{id}/editar', 'TrabajadorController@edit')->name('trabajador.editar');

Route::put('trabajadores/{id}/actualizar', 'TrabajadorController@update')->name('trabajador.actualizar');