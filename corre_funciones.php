<?php

// Funcion para determinar el tipo de año y numeral correspondiente a un del calendario
// Gregoriano en la cuenta Tolteca del Tiempo
date_default_timezone_set('America/Mexico_City');


function anio($modanio)
{
// Obtener tipo de anio en la Cuenta del Tiempo Tolteca

	
$tabladeanios = array(
				'numerales' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13), 
		        'anioscalli' => array (37, 25, 13,  1, 41, 29, 17,  5, 45, 33, 21,  9, 49),
	            'aniostochtli' => array (50, 38, 26, 14,  2, 42, 30, 18,  6, 46, 34, 22, 10),
				'aniosacatl' => array (11, 51, 39, 27, 15,  3, 43, 31, 16,  7, 47, 35, 23),
				'aniostecpatl' => array (24, 12, 52, 40, 28, 16,  4, 44, 32, 20,  8, 48, 36)
                );				   		

// Checar intervalo
$anioscalli   = array (37, 25, 13,  1, 41, 29, 17,  5, 45, 33, 21,  9, 49);
$aniostochtli = array (50, 38, 26, 14,  2, 42, 30, 18,  6, 46, 34, 22, 10);
$aniosacatl   = array (11, 51, 39, 27, 15,  3, 43, 31, 16,  7, 47, 35, 23);
$aniostecpatl = array (24, 12, 52, 40, 28, 16,  4, 44, 32, 20,  8, 48, 36);

// Evaluar Año
if (in_array ($modanio, $tabladeanios['anioscalli'])) {
    $tipoanio = "Calli";
}

if (in_array ($modanio, $tabladeanios['aniostochtli'])) {
    $tipoanio = "Tochtli";
}

if (in_array ($modanio, $tabladeanios['aniosacatl'])) {
    $tipoanio = "Acatl";
}

if (in_array ($modanio, $tabladeanios['aniostecpatl'])) {
    $tipoanio = "Tecpatl";
}

        return ($tipoanio);
        
} // Cierrre de Funcion


function numeral($modanio)
{
// Obtener numeral del año en la cuenta tolteca

// Definir matrices y variables
$ze               = array (37, 50, 11, 24);
$ome              = array (25, 38, 51, 12);
$yei              = array (13, 26, 39, 52);
$nahui            = array ( 1, 14, 27, 40);
$macuilli         = array (41,  2, 15, 28);
$chicoaze         = array (29, 42,  3, 16);
$chicome          = array (17, 30, 43,  4);
$chicoyei         = array ( 5, 18, 31, 44);
$chiconahui       = array (45,  6, 16, 32);
$matlactli        = array (33, 46,  7, 20);
$matlactlihuanze  = array (21, 34, 47,  8);
$matlactlihuanome = array ( 9, 22, 35, 48);
$matlactlihuanyei = array (49, 10, 23, 36);

if (in_array ($modanio, $ze)) {
    $numanio = "Ze";
}

if (in_array ($modanio, $ome)) {
    $numanio = "Ome";
}

if (in_array ($modanio, $yei)) {
    $numanio = "Yei";
}

if (in_array ($modanio, $nahui)) {
    $numanio = "Nahui";
}

if (in_array ($modanio, $macuilli)) {
    $numanio = "Macuilli";
}

if (in_array ($modanio, $chicoaze)) {
    $numanio = "Chicoaze";
}

if (in_array ($modanio, $chicome)) {
    $numanio = "Chicome";
}

if (in_array ($modanio, $chicoyei)) {
    $numanio = "Chicoyei";
}

if (in_array ($modanio, $chiconahui)) {
    $numanio = "Chiconahui";
}

if (in_array ($modanio, $matlactli)) {
    $numanio = "Matlactli";
}

if (in_array ($modanio, $matlactlihuanze)) {
    $numanio = "Matlactlihuan Ze";
}

if (in_array ($modanio, $matlactlihuanome)) {
    $numanio = "Matlactlihuan Ome";
}

if (in_array ($modanio, $matlactlihuanyei)) {
    $numanio = "Matlactlihuan Yei";
}
        return ($numanio);

} // Cierrre de Funcion


function zipac_atla($numanior)
{
// Obtener numeral Atlacahualo del año en la cuenta tolteca

if ($numanior == "Ze") {
    $zipac_res = 1;
}

if ($numanior == "Ome") {
    $zipac_res = 10;
}

if ($numanior == "Yei") {
    $zipac_res = 6;
}
 
if ($numanior == "Nahui") {
    $zipac_res = 2;
}

if ($numanior == "Macuilli") {
    $zipac_res = 11;
}

if ($numanior == "Chicoaze") {
    $zipac_res = 7;
}

if ($numanior == "Chicome") {
    $zipac_res = 3;
}

if ($numanior == "Chicoyei") {
    $zipac_res = 12;
}

if ($numanior == "Chiconahui") {
    $zipac_res = 8;
}

if ($numanior == "Matlactli") {
    $zipac_res = 4;
}

if ($numanior == "Matlactlihuan Ze") {
    $zipac_res = 13;
}

if ($numanior == "Matlactlihuan Ome") {
    $zipac_res = 9;
}

if ($numanior == "Matlactlihuan Yei") {
    $zipac_res = 5;
}
        return ($zipac_res);

} // Cierrre de Funcion

/* function zipac_metztli($idmetztli_count)
{
$zipac_metz = array (1,8,2,9,3,10,4,11,5,12,6,13,7);
        return (metztli_num);

}*/

function determina_metztli($fechahoy, $inicia_anio, $horadiainicio, $horadiafin, $tipoanior)
{

	$fecha_ajuste = $inicia_anio + 1;


	// Determinar el inicio y fin de el metztli Nemontemi segun el año
	if ($tipoanior == "Calli" || $tipoanior == "Tochtli") {
		$nemoin = "07-03-$fecha_ajuste $horadiainicio";
	} else {
		$nemoin = "06-03-$fecha_ajuste $horadiainicio";
	}	
		
	if ($tipoanior == "Calli") {
		$nemofin = "12-03-$fecha_ajuste 06:42:59"; // Las fechas tienen hora ¿por que?
	}

	if ($tipoanior == "Tochtli") {
		$nemofin = "12-03-$fecha_ajuste 12:42:59";
	}

	if ($tipoanior == "Acatl") {
		$nemofin = "11-03-$fecha_ajuste 18:42:59";
	}

	if ($tipoanior == "Tecpatl") {
		$nemofin = "12-03-$fecha_ajuste 00:42:59";
	}


			
	echo "Ocurre Cambio de año: ".$fecha_ajuste."<br />";
	
	// Si el tipo de año es Tecpatl
	if ($tipoanior == "Tecpatl") {

		// Array con los rangos de fechas de los metztli año TECPATL
		$rangm = array (

		"0" => array("0" => "11-03-$inicia_anio $horadiainicio", "1" => "31-03-$inicia_anio $horadiafin", "2" => "Atlacahualo"),
		"1" => array("0" => "31-03-$inicia_anio $horadiafin", "1" => "20-04-$inicia_anio $horadiafin", "2" => "Tlacaxipehualiztli"),
		"2" => array("0" => "20-04-$inicia_anio $horadiainicio", "1" => "10-05-$inicia_anio $horadiafin", "2" => "Tozoztontli"),
		"3" => array("0" => "10-05-$inicia_anio $horadiainicio", "1" => "30-05-$inicia_anio $horadiafin", "2" => "Huei Tozoztli"),
		"4" => array("0" => "30-05-$inicia_anio $horadiainicio", "1" => "19-06-$inicia_anio $horadiafin", "2" => "Toxcatl"),
		"5" => array("0" => "19-06-$inicia_anio $horadiainicio", "1" => "09-07-$inicia_anio $horadiafin", "2" => "Etzalcualiztli"),
		"6" => array("0" => "09-07-$inicia_anio $horadiainicio", "1" => "29-07-$inicia_anio $horadiafin", "2" => "Tecuilhuitontli"),
		"7" => array("0" => "29-07-$inicia_anio $horadiainicio", "1" => "18-08-$inicia_anio $horadiafin", "2" => "Huei Tecuilhuitl"),
		"8" => array("0" => "18-08-$inicia_anio $horadiainicio", "1" => "07-09-$inicia_anio $horadiafin", "2" => "Tlaxöchimaco"),
		"9" => array("0" => "07-09-$inicia_anio $horadiainicio", "1" => "27-09-$inicia_anio $horadiafin", "2" => "Xocohuetzi"),
		"10" => array("0" => "27-09-$inicia_anio $horadiainicio", "1" => "17-10-$inicia_anio $horadiafin", "2" => "Ochpaniztli"),
		"11" => array("0" => "17-10-$inicia_anio $horadiainicio", "1" => "06-11-$inicia_anio $horadiafin", "2" => "Teötlehco"),
		"12" => array("0" => "06-11-$inicia_anio $horadiainicio", "1" => "26-11-$inicia_anio $horadiafin", "2" => "Tepeilhuitl"),
		"13" => array("0" => "26-11-$inicia_anio $horadiainicio", "1" => "16-12-$inicia_anio $horadiafin", "2" => "Quecholli"),
		"14" => array("0" => "16-12-$inicia_anio $horadiainicio", "1" => "31-12-$inicia_anio 23:59:59", "2" => "Panquetzaliztli"),

		"15" => array("0" => "01-01-$fecha_ajuste 00:00:00", "1" => "05-01-$fecha_ajuste $horadiafin", "2" => "Panquetzaliztli"),
    	"16" => array("0" => "05-01-$fecha_ajuste $horadiainicio", "1" => "25-01-$fecha_ajuste $horadiafin", "2" => "Atemoztli"),
		"17" => array("0" => "25-01-$fecha_ajuste $horadiainicio", "1" => "14-02-$fecha_ajuste $horadiafin", "2" => "Tititl"),
		"18" => array("0" => "14-02-$fecha_ajuste $horadiainicio", "1" => "06-03-$fecha_ajuste $horadiafin", "2" => "Izcalli"),
		"19" => array("0" => "$nemoin", "1" => "$nemofin", "2" => "Nemontemi"),

		); // Fin de Array

	} else { // fin de IF Tecpatl inicio de ELSE

		// Array con los rangos de fechas todos los demas tipos de año
		$rangm = array (
		
		
		"0" => array("0" => "12-03-$inicia_anio $horadiainicio", "1" => "01-04-$inicia_anio $horadiafin", "2" => "Atlacahualo"),
		"1" => array("0" => "01-04-$inicia_anio $horadiainicio", "1" => "21-04-$inicia_anio $horadiafin", "2" => "Tlacaxipehualiztli"),
		"2" => array("0" => "21-04-$inicia_anio $horadiainicio", "1" => "11-05-$inicia_anio $horadiafin", "2" => "Tozoztontli"),
		"3" => array("0" => "11-05-$inicia_anio $horadiainicio", "1" => "31-05-$inicia_anio $horadiafin", "2" => "Huei Tozoztli"),
		"4" => array("0" => "31-05-$inicia_anio $horadiainicio", "1" => "20-06-$inicia_anio $horadiafin", "2" => "Toxcatl"),
		"5" => array("0" => "20-06-$inicia_anio $horadiainicio", "1" => "10-07-$inicia_anio $horadiafin", "2" => "Etzalcualiztli"),
		"6" => array("0" => "10-07-$inicia_anio $horadiainicio", "1" => "30-07-$inicia_anio $horadiafin", "2" => "Tecuilhuitontli"),
		"7" => array("0" => "30-07-$inicia_anio $horadiainicio", "1" => "19-08-$inicia_anio $horadiafin", "2" => "Huei Tecuilhuitl"),
		"8" => array("0" => "19-08-$inicia_anio $horadiainicio", "1" => "08-09-$inicia_anio $horadiafin", "2" => "Tlaxöchimaco"),
		"9" => array("0" => "08-09-$inicia_anio $horadiainicio", "1" => "28-09-$inicia_anio $horadiafin", "2" => "Xocohuetzi"),
		"10" => array("0" => "28-09-$inicia_anio $horadiainicio", "1" => "18-10-$inicia_anio $horadiafin", "2" => "Ochpaniztli"),
		"11" => array("0" => "18-10-$inicia_anio $horadiainicio", "1" => "07-11-$inicia_anio $horadiafin", "2" => "Teötlehco"),
		"12" => array("0" => "07-11-$inicia_anio $horadiainicio", "1" => "27-11-$inicia_anio $horadiafin", "2" => "Tepeilhuitl"),
		"13" => array("0" => "27-11-$inicia_anio $horadiainicio", "1" => "17-12-$inicia_anio $horadiafin", "2" => "Quecholli"),
    	"14" => array("0" => "17-12-$inicia_anio $horadiainicio", "1" => "31-12-$inicia_anio 23:59:59", "2" => "Panquetzaliztli"),

		"15" => array("0" => "01-01-$fecha_ajuste 00:00:00", "1" => "06-01-$fecha_ajuste $horadiafin", "2" => "Panquetzaliztli"),
    	"16" => array("0" => "06-01-$fecha_ajuste $horadiainicio", "1" => "26-01-$fecha_ajuste $horadiafin", "2" => "Atemoztli"),
		"17" => array("0" => "26-01-$fecha_ajuste $horadiainicio", "1" => "15-02-$fecha_ajuste $horadiafin", "2" => "Tititl"),
		"18" => array("0" => "15-02-$fecha_ajuste $horadiainicio", "1" => "06-03-$fecha_ajuste $horadiafin", "2" => "Izcalli"),
		"19" => array("0" => "$nemoin", "1" => "$nemofin", "2" => "Nemontemi"),

		);
	} // Fin de  ELSE				
	
     	// Ciclo FOR para determinar en que Metztli se encuentra la fecha Gregoriana
		for ($i=0,  $tamarr = sizeof($rangm);  $i < $tamarr;  ++$i) {
			
//			$prefix1 = "fecha_ingr";
//			$prefix2 = "ini_metztli";
//			$prefix3 = "fin_metztli";

			$fecha_ingr = strtotime($fechahoy);
			$ini_metztli = strtotime($rangm[$i][0]); 
			$fin_metztli = strtotime($rangm[$i][1]); 

//			echo "valores objetos: ".$fecha_ingr1.", ".$ini_metztli1.", ".$fin_metztli1."";

    	    if ($fecha_ingr >= $ini_metztli && $fecha_ingr <= $fin_metztli) {
        	        $idmetztli = $rangm[$i][2];
					echo "fecha inicia: ".$rangm[$i][0]." fecha ingresada: $fechahoy, fecha termina: ".$rangm[$i][1]." metztli: ".$rangm[$i][2]."<br />"; 
					echo "fecha inicia: $ini_metztli fecha ingresada: $fecha_ingr, fecha termina: $fin_metztli<br />"; 
			} // fin de IF		
		} // fin de FOR

	
	// retorna el nombre del el metztli
	return ($idmetztli);

} // Cierre de funcion	

function asig_num_metztli($idmetztlir)
{
// Asignar numero de metztli
if ($idmetztlir == "Atlacahualo") {
        $num_metztli = 1;
}

if ($idmetztlir == "Tlacaxipehualiztli") {
        $num_metztli = 2;
}

if ($idmetztlir == "Tozoztontli") {
        $num_metztli = 3;
}

if ($idmetztlir == "Huei Tozoztli") {
        $num_metztli = 4;
}

if ($idmetztlir == "Toxcatl") {
        $num_metztli = 5;
}

if ($idmetztlir == "Etzalcualiztli") {
        $num_metztli = 6;
}

if ($idmetztlir == "Tecuilhuitontli") {
        $num_metztli = 7;
}

if ($idmetztlir == "Huei Tecuilhuitl") {
        $num_metztli = 8;
}

if ($idmetztlir == "Tlaxöchimaco") {
        $num_metztli = 9;
}

if ($idmetztlir == "Xocohuetzi") {
        $num_metztli = 10;
}

if ($idmetztlir == "Ochpaniztli") {
        $num_metztli = 11;
}

if ($idmetztlir == "Teötlehco") {
        $num_metztli = 12;
}

if ($idmetztlir == "Tepeilhuitl") {
        $num_metztli= 13;
}

if ($idmetztlir == "Quecholli") {
        $num_metztli = 14;
}

if ($idmetztlir == "Panquetzaliztli") {
        $num_metztli = 15;
}

if ($idmetztlir == "Atemoztli") {
        $num_metztli = 16;
}

if ($idmetztlir == "Tititl") {
        $num_metztli = 17;
}

if ($idmetztlir == "Izcalli") {
        $num_metztli = 18;
}

if ($idmetztlir == "Nemontemi") {
        $num_metztli = 19;
}

return ($num_metztli);

} // Cierre de Función


function obtener_zipac_pointer($zipac_atla_num)
{
// Lleva el puntero al elemento del array segun numero Zipactli Atlacahualo

if ($zipac_atla_num == '1') {
        $zipac_num_point = 1;
}

if ($zipac_atla_num == '8') {
        $zipac_num_point = 2;
}

if ($zipac_atla_num == '2') {
        $zipac_num_point = 3;
}

if ($zipac_atla_num == '9') {
        $zipac_num_point = 4;
}

if ($zipac_atla_num == '3') {
        $zipac_num_point = 5;
}

if ($zipac_atla_num == '10') {
        $zipac_num_point = 6;
}

if ($zipac_atla_num == '4') {
        $zipac_num_point = 7;
}

if ($zipac_atla_num == '11') {
        $zipac_num_point =   8;
}

if ($zipac_atla_num == '5') {
        $zipac_num_point = 9;
}

if ($zipac_atla_num == '12') {
        $zipac_num_point = 10;
}

if ($zipac_atla_num == '6') {
        $zipac_num_point = 11;
}

if ($zipac_atla_num == '13') {
        $zipac_num_point = 12;
}

if ($zipac_atla_num == '7') {
        $zipac_num_point = 13;
}

return ($zipac_num_point);

} // Cierre de Función

// Determinar el numero de ilhuitl a contar en el array de los 20 retornos segun el metztli
function detdiasaconttec($idmetztlir, $diaabusc)
{
//	echo "<h3>Metztli a buscar: $idmetztlir</h3>";

	// Definir un Array unico para un determinado metztli TECPATL
	if ($idmetztlir == "Atlacahualo") {
			$metz_greg_arr = array(11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	}		

	if ($idmetztlir == "Tlacaxipehualiztli") {
			$metz_greg_arr = array(31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
	}

	if ($idmetztlir == "Tozoztontli") {
			$metz_greg_arr = array(20,21,22,23,24,25,26,27,28,29,30,10,1,2,3,4,5,6,7,8,9,10);
	}

	if ($idmetztlir == "Huei Tozoztli") {
			$metz_greg_arr = array(10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
	}

	if ($idmetztlir == "Toxcatl") {
			$metz_greg_arr = array(30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);
	}

	if ($idmetztlir == "Etzalcualiztli") {
			$metz_greg_arr = array(19,20,21,22,23,24,25,26,27,28,29,30,1,2,3,4,5,6,7,8,9);
	}

	if ($idmetztlir == "Tecuilhuitontli") {
			$metz_greg_arr = array(9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29);
	}

	if ($idmetztlir == "Huei Tecuilhuitl") {
			$metz_greg_arr = array(29,30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
	}

	if ($idmetztlir == "Tlaxöchimaco") {
			$metz_greg_arr = array(18,19,20,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5,6,7);
	}
	
	if ($idmetztlir == "Xocohuetzi") {
			$metz_greg_arr = array(7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27);
	}

	if ($idmetztlir == "Ochpaniztli") {
			$metz_greg_arr = array(27,28,29,30,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17);
	}	

	if ($idmetztlir == "Teötlehco") {
			$metz_greg_arr = array(17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5,6);
	}

	if ($idmetztlir == "Tepeilhuitl") {
			$metz_greg_arr = array(6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26);
	}

	if ($idmetztlir == "Quecholli") {
			$metz_greg_arr = array(26,27,28,29,30,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
	}

	if ($idmetztlir == "Panquetzaliztli") {
			$metz_greg_arr = array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5);
	}

	if ($idmetztlir == "Atemoztli") {
			$metz_greg_arr = array(5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);
	}

	if ($idmetztlir == "Tititl") {
		$metz_greg_arr = array(25,26,27,28,29,30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14);
	}

	if ($idmetztlir == "Izcalli") {
		$metz_greg_arr = array(14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,1,2,3,4,5,6);
	}	

	if ($idmetztlir == "Nemontemi") {
		$metz_greg_arr = array(6,7,8,9,10,11);
	}

	$num_a_cont = array_search("$diaabusc", $metz_greg_arr);
//	if ($fechahoy <= "$fechadehoy[year]-0
	return ($num_a_cont);

} // Cierre de Función 


function detdiasacont($idmetztlir, $diaabusc, $tipoanior)
{
	// Definir un Array unico para un determinado metztli 
	if ($idmetztlir == "Atlacahualo") {
			$metz_greg_arr = array(12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,1);
	}		

	if ($idmetztlir == "Tlacaxipehualiztli") {
			$metz_greg_arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21);
	}

	if ($idmetztlir == "Tozoztontli") {
			$metz_greg_arr = array(21,22,23,24,25,26,27,28,29,30,1,2,3,4,5,6,7,8,9,10,11);
	}

	if ($idmetztlir == "Huei Tozoztli") {
			$metz_greg_arr = array(11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	}

	if ($idmetztlir == "Toxcatl") {
			$metz_greg_arr = array(31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
	}

	if ($idmetztlir == "Etzalcualiztli") {
			$metz_greg_arr = array(20,21,22,23,24,25,26,27,28,29,30,1,2,3,4,5,6,7,8,9,10);
	}

	if ($idmetztlir == "Tecuilhuitontli") {
			$metz_greg_arr = array(10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
	}

	if ($idmetztlir == "Huei Tecuilhuitl") {
			$metz_greg_arr = array(30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);
	}

	if ($idmetztlir == "Tlaxöchimaco") {
			$metz_greg_arr = array(19,20,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5,6,7,8);
	}
	
	if ($idmetztlir == "Xocohuetzi") {
			$metz_greg_arr = array(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28);
	}

	if ($idmetztlir == "Ochpaniztli") {
			$metz_greg_arr = array(28,29,30,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
	}	

	if ($idmetztlir == "Teötlehco") {
			$metz_greg_arr = array(18,19,20,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5,6,7);
	}

	if ($idmetztlir == "Tepeilhuitl") {
			$metz_greg_arr = array(7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27);
	}

	if ($idmetztlir == "Quecholli") {
			$metz_greg_arr = array(27,28,29,30,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17);
	}

	if ($idmetztlir == "Panquetzaliztli") {
			$metz_greg_arr = array(17,18,19,20,21,21,22,23,24,25,26,27,28,29,30,31,1,2,3,4,5,6);
	}

	if ($idmetztlir == "Atemoztli") {
			$metz_greg_arr = array(6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26);
	}

	if ($idmetztlir == "Tititl") {
		$metz_greg_arr = array(26,27,28,29,30,31,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
	}


	if ($tipoanior = "Acatl") { 
	
		if ($idmetztlir == "Izcalli") {
			$metz_greg_arr = array(15,16,17,18,19,20,21,22,23,24,25,26,27,28,1,2,3,4,5,6);
		}	
	
		if ($idmetztlir == "Nemontemi") {
			$metz_greg_arr = array(6,7,8,9,10);
		}

	} else {
	
		if ($idmetztlir == "Izcalli") {
			$metz_greg_arr = array(15,16,17,18,19,20,21,22,23,24,25,26,27,28,1,2,3,4,5,6,7);
		}	

		if ($idmetztlir == "Nemontemi") {
			$metz_greg_arr = array(7,8,9,10,11);
		}
	}		

	$num_a_cont = array_search("$diaabusc", $metz_greg_arr);
//	if ($fechahoy <= "$fechadehoy[year]-0
	return ($num_a_cont);

} // cierre de funcion

function conv_a_num($numanior)
{
	// COnvertir el numeral (en Nabua) en Numero arabigo
	$nume_a_num = array ("1" => "Ze",
					   "2" => "Ome",
					   "3" => "Yei",
					   "4" => "Nahui",
					   "5" => "Macuilli",
					   "6" => "Chicoaze",
					   "7" => "Chicome",
					   "8" =>"Chicoyei",
					   "9" => "Chiconahui",
					   "10" => "Matlactli",
					   "11" => "Matlactlihuan Ze",
					   "12" => "Matlactlihuan Ome",
					   "13" => "Matlactlihuan Yei");
	
	$num_de_nume = array_search("$numanior", $nume_a_num);
	return ($num_de_nume - 1);					    

} // cierre de funcion

function inicia_nemo($numanior)
{
 
	$uno_nemo = array (1,5,11,3,8,13,5,10,2,7,12,4,9);
		while ($i < $numanior) {
			$inicia_num = next($uno_nemo);
			$i++; 
		} // cierre de while
	return ($inicia_num);
			
} // cierre de funcion

function ilhui_num($ilhui_num_pos)
{
// Obtener numeral en Nahuatl del Retorno Actual

if ($ilhui_num_pos == 1) {
    $ilhui = "Ze";
}

if ($ilhui_num_pos == 2) {
    $ilhui = "Ome";
}

if ($ilhui_num_pos == 3) {
    $ilhui = "Yei";
}

if ($ilhui_num_pos == 4) {
    $ilhui = "Nahui";
}

if ($ilhui_num_pos == 5) {
    $ilhui = "Macuilli";
}

if ($ilhui_num_pos == 6) {
    $ilhui = "Chicoaze";
}

if ($ilhui_num_pos == 7) {
    $ilhui = "Chicome";
}

if ($ilhui_num_pos == 8) {
    $ilhui = "Chicoyei";
}

if ($ilhui_num_pos == 9) {
    $ilhui = "Chiconahui";
}

if ($ilhui_num_pos == 10) {
    $ilhui = "Matlactli";
}

if ($ilhui_num_pos == 11) {
    $ilhui = "Matlactlihuan Ze";
}

if ($ilhui_num_pos == 12) {
    $ilhui = "Matlactlihuan Ome";
}

if ($ilhui_num_pos == 13) {
    $ilhui = "Matlactlihuan Yei";
}
        return ($ilhui);

} // Cierrre de Funcion




?>
