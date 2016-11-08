<?php

use App\Phpgmaps\Phpgmaps;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function() {
	$tabla = [1,2,3,4,5,6,7,8,9,10];
	for ($i=0; $i < 10 ; $i++) { 
		echo "Tabla del ".$tabla[$i];
		for ($j=0; $j < 10 ; $j++) {
			$resultado[$j] = $tabla[$i] * $j;
			echo $resultado[$j].'<hr>';
		}
	}
});


/**
 * Google Maps on Laravel 5.2
 */
Route::get('maps', function(){
    //configuaración
    $config = array();
    $config['center'] = 'auto';
    $config['map_width'] = 400;
    $config['map_height'] = 400;
    $config['zoom'] = 15;
    $config['onboundschanged'] = 'if (!centreGot) {
        var mapCentre = map.getCenter();
        marker_0.setOptions({
            position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
 
        });
    }
    centreGot = true;';
 
    \Gmaps::initialize($config);
 
    // Colocar el marcador 
    // Una vez se conozca la posición del usuario
    $marker = array();
    \Gmaps::add_marker($marker);
 
    $map = \Gmaps::create_map();
 
    //Devolver vista con datos del mapa
    echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
});

/**
 * 
 */
Route::get('users/{id}', function() {
    //
});