<?php

// Modelo de objetos que se corresponde con la tabla de MySQL
class TVserie extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;
}

// Añadir el resto del código aquí
$app->get('/tvseries', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la lista de series

    // Obtenemos la lista de películas de la base de datos y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $seriess = json_decode(\TVSerie::all());

    // Mostramos la vista
    return $this->view->render($res, 'tvserielist_template.php', [
        'items' => $series
    ]);
})->setName('tvseries');


/*  Obtención de una serie en concreto  */
$app->get('/tvseries/{name}', function ($req, $res, $args) {

    // Creamos un objeto collection + json con la serie pasada como parámetro

    // Obtenemos la serie de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TVSerie::find($args['name']);  
    $serie = json_decode($p);

    // Mostramos la vista
    return $this->view->render($res, 'tvserie_template.php', [
        'item' => $serie
    ]);

});

/*  Eliminacion de una serie en concreto  */
$app->delete('/tvseries/{name}', function ($req, $res, $args) {
	
    // Obtenemos la serie de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
    $p = \TVSerie::find($args['name']); 
    $p->delete();

});

/*Crea una nueva serie con los datos recibidos*/
$app->post('/tvseries', function ($req, $res, $args) {
    //Código para peticiones de POST (creación de items)
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];  

    $longitud = count($datos);
    for($i=0; $i<$longitud; $i++)
    {
        switch ($datos[$i]['name']){
        case "name":
            $name = $datos[$i]['value'];
            break;
        case "description":
            $desc = $datos[$i]['value'];
            break;
        case "TVPlatform":
            $plataf = $datos[$i]['value'];
            break;
        case "applicationSubCategory":
            $category = $datos[$i]['value'];
            break;
        case "screenshot":
            $screenshot = $datos[$i]['value'];
            break;
        case "datePublished":
            $date = $datos[$i]['value'];
            break;
        case "embedUrl":
            $embedUrl = $datos[$i]['value'];
            break;		
        }    
    }
  
    $tvserie = new TVserie;
    $tvserie->name = $name;
    $tvserie->description = $desc;
    $tvserie->TVPlatform = $plataf;
    $tvserie->applicationSubCategory = $category;
    $tvserie->screenshot =  $screenshot;
    $tvserie->datePublished = $date;
    $tvserie->embedUrl = $embedUrl;
  
    $tvserie->save();
});


//Actualizar serie

$app->put('/tvseries/{name}', function ($req, $res, $args) {

	// Creamos un objeto collection + json con el libro pasado como parámetro

	// Obtenemos el libro de la base de datos a partir de su id y la convertimos del formato Json (el devuelto por Eloquent) a un array PHP
	$nuevo_tvserie = \TVSerie::find($args['name']);	

    $template = $req->getParsedBody();

	$datos = $template['template']['data'];
  	foreach ($datos as $item)
  	{ 
		switch($item['name'])
		{
        case "name":
            $name = $item['value'];
            break;
        case "description":
            $description = $item['value'];
            break;
        case "TVPlatform":
            $gamePlatform = $item['value'];
            break;

        case "applicationSubCategory":
            $applicationSubCategory = $item['value'];
            break;

        case "screenshot":
            $screenshot = $item['value'];
            break;
				
        case "embedUrl":
            $embedUrl = $item['value'];
            break;
        case "datePublished":
            $datePublished = $item['value'];
            break;
		}
	}

	$nuevo_tvserie['name'] = $name;
	$nuevo_tvserie['description'] = $description;
	$nuevo_tvserie['TVPlatform'] = $tvPlatform;
	$nuevo_tvserie['applicationSubCategory'] = $applicationSubCategory;
	$nuevo_tvserie['screenshot'] = $screenshot;
	$nuevo_tvserie['embedUrl'] = $embedUrl;
	$nuevo_tvserie['datePublished'] = $datePublished;
	$nuevo_tvserie->save();

});


?>
