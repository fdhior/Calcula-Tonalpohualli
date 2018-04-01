<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php 

	// Establecer la zona Horaria
	date_default_timezone_set('America/Mexico_City');

	// Convertir las variables POST en locales
	foreach ($_POST as $nombre => $valor) {
		if(stristr($nombre, 'button') === FALSE) {
			${$nombre} = $valor;
		}
	} // Cierre foreach	

?>

</head>

<body>
<?php

$anio_calc = $anio;

// Residuo de la division del año en el calendario gregoriano entra 52 (base de la cuenta tolteca
$modanio =  $anio % 52;

 echo 'Residuo año inicial: '.$modanio.'<br />';

// Fecha completa buscada
$fechabuscada = $dia.'-'.$mes.'-'.$anio.' '.$hora.':'.$min.':'.$seg;
echo 'Fecha que se busca: '.$fechabuscada.'<br />';

// Tabla de años, numerales, Zipactli Atlacahualo, Zipactli de cada mes
$tabladeanios = array(
				'numerales' => array("Ze", // Numerales del 1 al 13
								     "Ome",
									 "Yei",
									 "Nahui",
									 "Macuilli",
									 "Chicoaze",
									 "Chicome", 
									 "Chicoyei", 
									 "Chiconahui", 
									 "Matlactli", 
									 "Matlactlihuan Ze", 
									 "Matlactlihuan Ome", 
									 "Matlactlihuan Yei"), 
		        'anioscalli' => array (37, 25, 13,  1, 41, 29, 17,  5, 45, 33, 21,  9, 49),      // Años Calli
	            'aniostochtli' => array (50, 38, 26, 14,  2, 42, 30, 18,  6, 46, 34, 22, 10),    // Años Tochtli  
				'aniosacatl' => array (11, 51, 39, 27, 15,  3, 43, 31, 16,  7, 47, 35, 23),      // Años Tecpatl  
				'aniostecpatl' => array (24, 12, 52, 40, 28, 16,  4, 44, 32, 20,  8, 48, 36),    // Años Tecpatl
				'zipac_atla' => array(1, 10, 6, 2, 11, 7, 3, 12, 8, 4, 13, 9, 5),                // Zipaclli Atlachualo el numeral con que inicia el año
				'zipac_metztli' => array(1, 8, 2, 9, 3, 10, 4, 11, 5, 12, 6, 13, 7)              // Zipactli con que inicia cada metztlidevotional1
                );				

// Convertir la fecha buscada a tiempo
$fechabuscada_t = strtotime($fechabuscada);

// Obtener Tipo de Año
if (in_array ($modanio, $tabladeanios['anioscalli'])) {
    $tipoanio = 'Calli';
	$diahorainicio = '00:43:00';
	$diahorafin = '00:42:59';

	$fechainiciaanio = $anio.'-03-12 '.$diahorainicio; 	
	$fechaintervaloajuste = $anio.'-01-01 00:00:00'; 
	
	$fechainiciaanio_t = strtotime($fechainiciaanio);
	$fechaintervaloajuste_t =strtotime($fechaintervaloajuste);

	if ($fechabuscada_t >= $fechaintervaloajuste_t && $fechabuscada_t <= $fechainiciaanio_t) {
		$modanio = $modanio - 1;
		$anio_calc = $anio - 1;
		$tipoanio = 'Tecpatl';
		$diahorainicio = '18:43:00';
		$diahorafin = '18:42:59';
	}
}

if (in_array ($modanio, $tabladeanios['aniostochtli'])) {
    $tipoanio = "Tochtli";
	$diahorainicio = '06:43:00';
	$diahorafin = '06:42:59';

	$fechainiciaanio = $anio.'-03-12 '.$diahorainicio; 	
	$fechaintervaloajuste = $anio.'-01-01 00:00:00'; 
	
	$fechainiciaanio_t = strtotime($fechainiciaanio);
	$fechaintervaloajuste_t =strtotime($fechaintervaloajuste);

	if ($fechabuscada_t >= $fechaintervaloajuste_t && $fechabuscada_t <= $fechainiciaanio_t) {
		$modanio = $modanio - 1;
		$anio_calc = $anio - 1;
		$tipoanio = 'Calli';
		$diahorainicio = '00:43:00';
		$diahorafin = '00:42:59';
	}

}

if (in_array ($modanio, $tabladeanios['aniosacatl'])) {
    $tipoanio = "Acatl";
	$diahorainicio = '12:43:00';
	$diahorafin = '12:42:59';

	$fechainiciaanio = $anio.'-03-12 '.$diahorainicio; 	
	$fechaintervaloajuste = $anio.'-01-01 00:00:00'; 
	
	$fechainiciaanio_t = strtotime($fechainiciaanio);
	$fechaintervaloajuste_t =strtotime($fechaintervaloajuste);

	if ($fechabuscada_t >= $fechaintervaloajuste_t && $fechabuscada_t <= $fechainiciaanio_t) {
		$modanio = $modanio - 1;
		$anio_calc = $anio - 1;
		$tipoanio = 'Tochtli';
		$diahorainicio = '06:43:00';
		$diahorafin = '06:42:59';
	}
}

if (in_array ($modanio, $tabladeanios['aniostecpatl'])) {
    $tipoanio = "Tecpatl";
	$diahorainicio = '18:43:00';
	$diahorafin = '18:42:59';
	
	$fechainiciaanio = $anio.'-03-11 '.$diahorainicio; 	
	$fechaintervaloajuste = $anio.'-01-01 00:00:00'; 
	
	$fechainiciaanio_t = strtotime($fechainiciaanio);
	$fechaintervaloajuste_t =strtotime($fechaintervaloajuste);

	if ($fechabuscada_t >= $fechaintervaloajuste_t && $fechabuscada_t <= $fechainiciaanio_t) {
		$modanio = $modanio - 1;
		$anio_calc = $anio - 1;
		$tipoanio = 'Acatl';
		$diahorainicio = '12:43:00';
		$diahorafin = '12:42:59';
	}

}

	echo 'Residuo Año despues de ajuste: '.$modanio.'<br />';

	// Ajuste de año para los meztli entre años
	$anioajuste = $anio_calc + 1;

	// $tamanio_arr = count($tabladeanios['aniostochtli']);


// Tabla de Metztli 
if ($tipoanior == "Tecpatl") {

		// Array con los rangos de fechas de los metztli año TECPATL
		$tablademetztli = array (

		"1" => array("0" => "11-03-$anio_calc $diahorainicio", "1" => "31-03-$anio_calc $diahorafin", "2" => "Atlacahualo"),
		"2" => array("0" => "31-03-$anio_calc $diahorainicio", "1" => "20-04-$anio_calc $diahorafin", "2" => "Tlacaxipehualiztli"),
		"3" => array("0" => "20-04-$anio_calc $diahorainicio", "1" => "10-05-$anio_calc $diahorafin", "2" => "Tozoztontli"),
		"4" => array("0" => "10-05-$anio_calc $diahorainicio", "1" => "30-05-$anio_calc $diahorafin", "2" => "Huei Tozoztli"),
		"5" => array("0" => "30-05-$anio_calc $diahorainicio", "1" => "19-06-$anio_calc $diahorafin", "2" => "Toxcatl"),
		"6" => array("0" => "19-06-$anio_calc $diahorainicio", "1" => "09-07-$anio_calc $diahorafin", "2" => "Etzalcualiztli"),
		"7" => array("0" => "09-07-$anio_calc $diahorainicio", "1" => "29-07-$anio_calc $diahorafin", "2" => "Tecuilhuitontli"),
		"8" => array("0" => "29-07-$anio_calc $diahorainicio", "1" => "18-08-$anio_calc $diahorafin", "2" => "Huei Tecuilhuitl"),
		"9" => array("0" => "18-08-$anio_calc $diahorainicio", "1" => "07-09-$anio_calc $diahorafin", "2" => "Tlaxöchimaco"),
		"10" => array("0" => "07-09-$anio_calc $diahorainicio", "1" => "27-09-$anio_calc $diahorafin", "2" => "Xocohuetzi"),
		"11" => array("0" => "27-09-$anio_calc $diahorainicio", "1" => "17-10-$anio_calc $diahorafin", "2" => "Ochpaniztli"),
		"12" => array("0" => "17-10-$anio_calc $diahorainicio", "1" => "06-11-$anio_calc $diahorafin", "2" => "Teötlehco"),
		"13" => array("0" => "06-11-$anio_calc $diahorainicio", "1" => "26-11-$anio_calc $diahorafin", "2" => "Tepeilhuitl"),
		"14" => array("0" => "26-11-$anio_calc $diahorainicio", "1" => "16-12-$anio_calc $diahorafin", "2" => "Quecholli"),
		"15" => array("0" => "16-12-$anio_calc $diahorainicio", "1" => "05-01-$anioajuste $diahorafin", "2" => "Panquetzaliztli"),
    	"16" => array("0" => "05-01-$anioajuste $diahorainicio", "1" => "25-01-$anioajuste $diahorafin", "2" => "Atemoztli"),
		"17" => array("0" => "25-01-$anioajuste $diahorainicio", "1" => "14-02-$anioajuste $diahorafin", "2" => "Tititl"),
		"18" => array("0" => "14-02-$anioajuste $diahorainicio", "1" => "06-03-$anioajuste $diahorafin", "2" => "Izcalli"),
//		"19" => array("0" => "$nemoin", "1" => "$nemofin", "2" => "Nemontemi"),

		); // Fin de Array

	} else { // fin de if Tecpatl inicio de else
	
		// Array con los rangos de fechas todos los demas tipos de año
		$tablademetztli = array (
		
		
		"1" => array("0" => "12-03-$anio_calc $diahorainicio", "1" => "01-04-$anio_calc $diahorafin", "2" => "Atlacahualo"),
		"2" => array("0" => "01-04-$anio_calc $diahorainicio", "1" => "21-04-$anio_calc $diahorafin", "2" => "Tlacaxipehualiztli"),
		"3" => array("0" => "21-04-$anio_calc $diahorainicio", "1" => "11-05-$anio_calc $diahorafin", "2" => "Tozoztontli"),
		"4" => array("0" => "11-05-$anio_calc $diahorainicio", "1" => "31-05-$anio_calc $diahorafin", "2" => "Huei Tozoztli"),
		"5" => array("0" => "31-05-$anio_calc $diahorainicio", "1" => "20-06-$anio_calc $diahorafin", "2" => "Toxcatl"),
		"6" => array("0" => "20-06-$anio_calc $diahorainicio", "1" => "10-07-$anio_calc $diahorafin", "2" => "Etzalcualiztli"),
		"7" => array("0" => "10-07-$anio_calc $diahorainicio", "1" => "30-07-$anio_calc $diahorafin", "2" => "Tecuilhuitontli"),
		"8" => array("0" => "31-07-$anio_calc $diahorainicio", "1" => "19-08-$anio_calc $diahorafin", "2" => "Huei Tecuilhuitl"),
		"9" => array("0" => "19-08-$anio_calc $diahorainicio", "1" => "08-09-$anio_calc $diahorafin", "2" => "Tlaxöchimaco"),
		"10" => array("0" => "08-09-$anio_calc $diahorainicio", "1" => "28-09-$anio_calc $diahorafin", "2" => "Xocohuetzi"),
		"11" => array("0" => "28-09-$anio_calc $diahorainicio", "1" => "18-10-$anio_calc $diahorafin", "2" => "Ochpaniztli"),
		"12" => array("0" => "18-10-$anio_calc $diahorainicio", "1" => "07-11-$anio_calc $diahorafin", "2" => "Teötlehco"),
		"13" => array("0" => "07-11-$anio_calc $diahorainicio", "1" => "27-11-$anio_calc $diahorafin", "2" => "Tepeilhuitl"),
		"14" => array("0" => "27-11-$anio_calc $diahorainicio", "1" => "17-12-$anio_calc $diahorafin", "2" => "Quecholli"),
    	"15" => array("0" => "17-12-$anio_calc $diahorainicio", "1" => "06-01-$anioajuste $diahorafin", "2" => "Panquetzaliztli"),
    	"16" => array("0" => "06-01-$anioajuste $diahorainicio", "1" => "26-01-$anioajuste $diahorafin", "2" => "Atemoztli"),
		"17" => array("0" => "26-01-$anioajuste $diahorainicio", "1" => "15-02-$anioajuste $diahorafin", "2" => "Tititl"),
		"18" => array("0" => "15-02-$anioajuste $diahorainicio", "1" => "06-03-$anioajuste $diahorafin", "2" => "Izcalli"),
//		"19" => array("0" => "$nemoin", "1" => "$nemofin", "2" => "Nemontemi"),

		);
	} // Fin de else

	$tabladeilhuitl = array("Zipaclti", "Ehecatl", "Calli",	"Cuetzpalli",
							"Cohuatl", "Miquiztli", "Mazatl", "Tochtli",
							"Atl", "Itzcuintli", "Ozomahtli", "Malinalli",
							"Acatl", "Ocelotl", "Cuauhtli", "Cozcacuauhtli",
							"Ollin", "Tecpatl", "Quiyahuitl", "Xöchitl");
							

	// Determinar el indice del residuo en la tabla de años, segun el tipo de año 
	switch ($tipoanio) {
		case 'Calli':
			$i = '0';
			while ($i < 13) {
				//	echo "paso $i <br />";
				if (current($tabladeanios['anioscalli']) == $modanio) {
					echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['anioscalli']).'<br />';	
					$indice_anio = key($tabladeanios['anioscalli']);
				}
				next($tabladeanios['anioscalli']);
				$i++;
			}
			break;
		case 'Tochtli':
			$i = '0';
			while ($i < 13) {
				//	echo "paso $i <br />";
				if (current($tabladeanios['aniostochtli']) == $modanio) {
					echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['aniostochtli']).'<br />';	
					$indice_anio = key($tabladeanios['aniostochtli']);
				}
				next($tabladeanios['aniostochtli']);
				$i++;
			}
			break;
		case 'Acatl':
			$i = '0';
			while ($i < 13) {
				//	echo "paso $i <br />";
				if (current($tabladeanios['aniosacatl']) == $modanio) {
					echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['aniosacatl']).'<br />';	
					$indice_anio = key($tabladeanios['aniosacatl']);
				}
				next($tabladeanios['aniosacatl']);
				$i++;
			}
			break;
		case 'Tecpatl':
			$i = '0';
			while ($i < 13) {
				//	echo "paso $i <br />";
				if (current($tabladeanios['aniostecpatl']) == $modanio) {
					echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['aniostecpatl']).'<br />';	
					$indice_anio = key($tabladeanios['aniostecpatl']);
				}
				next($tabladeanios['aniostecpatl']);
				$i++;
			}
			break;
	} // Cierre de switch										
			
			
// Usar el indice obtenido para obtener el numeral del año
$i = '0';
while ($i < 13) {
//	echo "paso $i <br />";
	if (key($tabladeanios['numerales']) == $indice_anio) {
		echo 'Numeral del año: '.current($tabladeanios['numerales']).'<br />';	
		$numeral_anio = current($tabladeanios['numerales']);
	}
	next($tabladeanios['numerales']);
	$i++;
}

	// Usar el mismo indice para determinar el primer dia del año buscado
	$i = '0';
	while ($i < 13) {
		//	echo "paso $i <br />";
		if (key($tabladeanios['zipac_atla']) == $indice_anio) {
	//		echo ' ('.current($tabladeanios['zipac_atla']).')<br />';	
			$zipactli_atlacahualo = current($tabladeanios['zipac_atla']);
		}
		next($tabladeanios['zipac_atla']);
		$i++;
	}

	// Obtener el meztli que corresponde a la fecha que se busca
	for ($i=1,  $tamarr = sizeof($tablademetztli);  $i < $tamarr;  ++$i) {
			
//		$aniostecpatl = strtotime($fechabuscada);
		$inicio_metztli = strtotime($tablademetztli[$i][0]); 
		$fin_metztli = strtotime($tablademetztli[$i][1]); 

//		echo 'valores objetos: '.$fechabuscada_t.', '.$inicio_metztli.', '.$fin_metztli.' '.$i.'<br />';
//		echo 'valores tiempo: '.$fechabuscada.', '.$tablademetztli[$i][0].', '.$tablademetztli[$i][1].'<br>';
			
   	    if ($fechabuscada_t >= $inicio_metztli && $fechabuscada_t <= $fin_metztli) {
  	        $metztli = $tablademetztli[$i][2];
			$indice_metztli = key($tablademetztli);
			$inicio_metztli_f = $tablademetztli[$i][0];
			echo 'Indice Tabla Metztli: '.$indice_metztli.'<br />';
			echo 'fecha inicia: '.$tablademetztli[$i][0].' ';
			echo 'fecha ingresada: '.$fechabuscada.', ';
			echo 'fecha termina: '.$tablademetztli[$i][1].' ';
			echo 'metztli: '.$tablademetztli[$i][2].'<br />'; 
			echo 'fecha inicia: '.$inicio_metztli.' ';
			echo 'fecha ingresada: '.$fechabuscada_t.', ';
			echo 'fecha termina: '.$fin_metztli.'<br />'; 
		} // fin de IF		
		next($tablademetztli);

	} // fin de FOR


//	echo $numeralesacontar;

	// Determinar cuantos dias hay que contar para obtener el ilhuitl que corresponde a la fecha buscada
	$partefecha1 = explode(' ', $inicio_metztli_f);
//	print_r($partefecha1);

	$extrae_fecha = $partefecha1[0];
		
	$partefecha2 = explode('-', $extrae_fecha);
	
//	print_r($partefecha2);
	
	echo '<br />'.$partefecha2[1].'-'.$partefecha2[0].'-'.$partefecha2[2].'<br />';
	echo $mes.'-'.$dia.'-'.$anio.'<br />';
		
	//calculo timestam de las dos fechas 
	$timestamp1 = mktime(0,0,0,$partefecha2[1],$partefecha2[0],$partefecha2[2]); 
	$timestamp2 = mktime(4,12,0,$mes,$dia,$anio); 

	//resto a una fecha la otra 
	$segundos_diferencia = $timestamp1 - $timestamp2; 
	//echo $segundos_diferencia; 

	//convierto segundos en días 
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

	//obtengo el valor absoulto de los días (quito el posible signo negativo) 
	$dias_diferencia = abs($dias_diferencia); 

	//quito los decimales a los días de diferencia 
	$dias_diferencia = floor($dias_diferencia); 

	echo '<br />Dias de Diferencia entre el inicio del metztli y la fecha buscada: '.$dias_diferencia.'<br />'; 

	

	if ($dias_diferencia == '0') {
		$numeral_zipactli = $zipactli_atlacahualo;
	} else {

		echo '<br />Se ejecuta este<br />';
		// Obtener el indice de el Zipactli Atlacahualo en el Array Zipac_Metztli
		$i = '0';
		while ($i < 13) {
			//	echo "paso $i <br />";
			if (current($tabladeanios['zipac_metztli']) == $zipactli_atlacahualo) {
				echo 'Indice del Zipactli Inicial en el array Zipac_Metztli: '.key($tabladeanios['zipac_metztli']).'<br />';	
				$indice_zipacmetztli = key($tabladeanios['zipac_metztli']);
			}
			next($tabladeanios['zipac_metztli']);
			$i++;
		}

		// Volver a colocar el apuntador en la posicion inicial
		reset($tabladeanios['zipac_metztli']);

		// Mover el apuntador del array a la posición donde se encuentra el valor del Zipactli Atlacahualo
		// en el array Zipac Metztli
		$i = '1';
		while ($i <= $indice_zipacmetztli) {		
			next($tabladeanios['zipac_metztli']);		
//			echo current($tabladeanios['zipac_metztli']).'<br />';
			$i++;
		}
			

		$numeralesacontar = $indice_metztli - 2;
		$tam_arr = sizeof($tabladeanios['zipac_metztli']);
//		echo $tam_arr;
		$tam_arr = $tam_arr - 1;

		//Cuenta en el array para obtener el numeral de inicio del metztli al que corresponde la fecha buscada
		echo 'Cuenta sobre el Array: ';
		$i = '1';
		while ($i <= $numeralesacontar) {

			//	echo "paso $i <br />";
			if (key($tabladeanios['zipac_metztli']) == $tam_arr) {
				$numeral_zipactli = current($tabladeanios['zipac_metztli']);
				echo $numeral_zipactli.'-';  
		 		reset($tabladeanios['zipac_metztli']);
			} 
			$numeral_zipactli = current($tabladeanios['zipac_metztli']);
			echo $numeral_zipactli.' ';  
			next($tabladeanios['zipac_metztli']);
			$i++;
		}
	} // Cierre de Else

	echo '<br />Fecha de Inicio del Metztli: '.$inicio_metztli_f.'<br />';

	// Determinar el Ilhuitl
	$i = '0';
	while ($i < 20) {
	//	echo "paso $i <br />";
		if (key($tabladeilhuitl) == $dias_diferencia) {
			echo 'El Dia que corresponde a la fecha gregoriana es:  '.current($tabladeilhuitl).'<br />';	
			$ilhuitl = current($tabladeilhuitl);
		}
		next($tabladeilhuitl);
		$i++;
	}
	
	// Determinar el Numeral del ilhuitl
	// Mover el indice del Array Numerales hasta donde esta el numeral donde empieza el metztli
	// Primero movemos el puntero al inicio del Array
	reset($tabladeanios['numerales']);
	
	$i = '1';
	while ($i <= ($numeral_zipactli - 1)) {		
		next($tabladeanios['numerales']);		
		$i++;
	}

	echo 'El numeral Zipactli en nahuatl es: '.current($tabladeanios['numerales']).'<br />';

	$numeralesacontar = $dias_diferencia + 1;
	$tam_arr = sizeof($tabladeanios['numerales']);
	$tam_arr = $tam_arr - 1;

	//Cuenta en el array para obtener el numeral de inicio del metztli al que corresponde la fecha buscada
	echo 'Cuenta sobre el Array Numerales: ';
	$i = '1';
	while ($i <= $numeralesacontar) {

		//	echo "paso $i <br />";
		if (key($tabladeanios['numerales']) == $tam_arr) {
			$numeral_ilhuitl = current($tabladeanios['numerales']);
			echo $numeral_ilhuitl.'-';  
	 		reset($tabladeanios['numerales']);
		} 
		$numeral_ilhuitl = current($tabladeanios['numerales']);
		echo $numeral_ilhuitl.' ';  
		next($tabladeanios['numerales']);
		$i++;
	}


	echo '<br /><br />Año: '.$anio.'<br />';
	echo 'Tipo de Año: '.$tipoanio.'<br />';
	echo 'Es un año: '.$numeral_anio.' '.$tipoanio.' ('.$zipactli_atlacahualo.')<br />';
	echo 'El Mezttli es: '.$metztli.' ('.$indice_metztli.') ('.$numeral_zipactli.')<br />';
	echo 'El ilhuitl es: '.$ilhuitl.'<br />';
	echo 'Su Numeral es: '.$numeral_ilhuitl;


?> 
</body>
</html>