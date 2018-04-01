<?php

// Funcion para determinar el tipo de año y numeral correspondiente a un del calendario
// Gregoriano en la cuenta Tolteca del Tiempo

function anio($modanio)
{
// Obtener tipo de anio en la Cuenta del Tiempo Tolteca

// Checar intervalo
$anioscalli   = array (37, 25, 13,  1, 41, 29, 17,  5, 45, 33, 21,  9, 49);
$aniostochtli = array (50, 38, 26, 14,  2, 42, 30, 18,  6, 46, 34, 22, 10);
$aniosacatl   = array (11, 51, 39, 27, 15,  3, 43, 31, 16,  7, 47, 35, 23);
$aniostecpatl = array (24, 12, 52, 40, 28, 16,  4, 44, 32, 20,  8, 48, 36);

// Evaluar Año
if (in_array ($modanio, $anioscalli)) {
    $tipoanio = "Calli";
}

if (in_array ($modanio, $aniostochtli)) {
    $tipoanio = "Tochtli";
}

if (in_array ($modanio, $aniosacatl)) {
    $tipoanio = "Acatl";
}

if (in_array ($modanio, $aniostecpatl)) {
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

function determina_metztli($fechahoy, $fechadehoy, $horadiainicio, $tipoanior)
{
	// Determinar el inicio y fin de el metztli Nemontemi segun el año
	if ($tipoanior == "Calli" or $tipoanior == "Tochtli") {
		$nemoin = "$fechadehoy[year]-03-07 $horadiainicio";
	}	

	if ($tipoanior == "Acatl" or $tipoanior == "Tecpatl") {
		$nemoin = "$fechadehoy[year]-03-06 $horadiainicio";
	}	
		
	if ($tipoanior == "Calli") {
		$nemofin = "$fechadehoy[year]-03-12 06:43 am";
	}

	if ($tipoanior == "Tochtli") {
		$nemofin = "$fechadehoy[year]-03-12 12:43 pm";
	}

	if ($tipoanior == "Acatl") {
		$nemofin = "$fechadehoy[year]-03-11 18:43 pm";
	}

	if ($tipoanior == "Tecpatl") {
		$nemofin = "$fechadehoy[year]-03-12 00:43 am";
	}

	// Si el tipo de año es Tecpatl
	if ($tipoanior == "Tecpatl") {

		// array con los rangos de fechas de los metztli año tecpatl
		$rangmtec = array (
		"0" => array("0" => "$fechadehoy[year]-03-11 $horadiainicio", "1" => "$fechadehoy[year]-03-31 $horadiainicio", "2" => "Atlacahualo"),
		"1" => array("0" => "$fechadehoy[year]-03-31 $horadiainicio", "1" => "$fechadehoy[year]-04-20 $horadiainicio", "2" => "Tlacaxipehualiztli"),
		"2" => array("0" => "$fechadehoy[year]-04-20 $horadiainicio", "1" => "$fechadehoy[year]-05-10 $horadiainicio", "2" => "Tozoztontli"),
		"3" => array("0" => "$fechadehoy[year]-05-10 $horadiainicio", "1" => "$fechadehoy[year]-05-30 $horadiainicio", "2" => "Huei Tozoztli"),
		"4" => array("0" => "$fechadehoy[year]-05-30 $horadiainicio", "1" => "$fechadehoy[year]-06-19 $horadiainicio", "2" => "Toxcatl"),
		"5" => array("0" => "$fechadehoy[year]-06-19 $horadiainicio", "1" => "$fechadehoy[year]-07-09 $horadiainicio", "2" => "Etzalcualiztli"),
		"6" => array("0" => "$fechadehoy[year]-07-09 $horadiainicio", "1" => "$fechadehoy[year]-07-29 $horadiainicio", "2" => "Tecuilhuitontli"),
		"7" => array("0" => "$fechadehoy[year]-07-29 $horadiainicio", "1" => "$fechadehoy[year]-08-18 $horadiainicio", "2" => "Huei Tecuilhuitl"),
		"8" => array("0" => "$fechadehoy[year]-08-18 $horadiainicio", "1" => "$fechadehoy[year]-09-07 $horadiainicio", "2" => "Tlaxöchimaco"),
		"9" => array("0" => "$fechadehoy[year]-09-07 $horadiainicio", "1" => "$fechadehoy[year]-09-27 $horadiainicio", "2" => "Xocohuetzi"),
		"10" => array("0" => "$fechadehoy[year]-09-27 $horadiainicio", "1" => "$fechadehoy[year]-10-17 $horadiainicio", "2" => "Ochpaniztli"),
		"11" => array("0" => "$fechadehoy[year]-10-17 $horadiainicio", "1" => "$fechadehoy[year]-11-06 $horadiainicio", "2" => "Teötlehco"),
		"12" => array("0" => "$fechadehoy[year]-11-06 $horadiainicio", "1" => "$fechadehoy[year]-11-26 $horadiainicio", "2" => "Tepeilhuitl"),
		"13" => array("0" => "$fechadehoy[year]-11-26 $horadiainicio", "1" => "$fechadehoy[year]-12-16 $horadiainicio", "2" => "Quecholli"),
		"14" => array("0" => "$fechadehoy[year]-12-16 $horadiainicio", "1" => "$fechadehoy[year]-01-05 $horadiainicio", "2" => "Panquetzaliztli"),
    	"15" => array("0" => "$fechadehoy[year]-01-05 $horadiainicio", "1" => "$fechadehoy[year]-01-25 $horadiainicio", "2" => "Atemoztli"),
		"16" => array("0" => "$fechadehoy[year]-01-25 $horadiainicio", "1" => "$fechadehoy[year]-02-14 $horadiainicio", "2" => "Tititl"),
		"17" => array("0" => "$fechadehoy[year]-02-14 $horadiainicio", "1" => "$fechadehoy[year]-03-06 $horadiainicio", "2" => "Izcalli"),
		"18"	=> array("0" => "$fechadehoy[year]-03-06 $horadiainicio", "1" => "$fechadehoy[year]-03-11 $horadiainicio", "2" => "Nemontemi"),
		);

		// Cilco FOR para determinar en que Metztli se encuentra la fecha Gregoriana
		$i=0;
		for ($i=0,  $tamarr = sizeof($rangmtec);  $i < $tamarr;  ++$i) {
    	    if ($fechahoy > $rangmtec[$i][0] && $fechahoy < $rangmtec[$i][1]) {
        	        $idmetztli = $rangmtec[$i][2];
			} // fin de IF		
		} // fin de FOR		
	} else { // fin de IF Tecpatl inicio de ELSE

		// array con los rangos de fechas todos los demas tipos de año
		$rangm = array (
		"0" => array("0" => "$fechadehoy[year]-03-12 $horadiainicio", "1" => "$fechadehoy[year]-04-01 $horadiainicio", "2" => "Atlacahualo"),
		"1" => array("0" => "$fechadehoy[year]-04-01 $horadiainicio", "1" => "$fechadehoy[year]-04-21 $horadiainicio", "2" => "Tlacaxipehualiztli"),
		"2" => array("0" => "$fechadehoy[year]-04-21 $horadiainicio", "1" => "$fechadehoy[year]-05-11 $horadiainicio", "2" => "Tozoztontli"),
		"3" => array("0" => "$fechadehoy[year]-05-11 $horadiainicio", "1" => "$fechadehoy[year]-05-31 $horadiainicio", "2" => "Huei Tozoztli"),
		"4" => array("0" => "$fechadehoy[year]-05-31 $horadiainicio", "1" => "$fechadehoy[year]-06-20 $horadiainicio", "2" => "Toxcatl"),
		"5" => array("0" => "$fechadehoy[year]-06-20 $horadiainicio", "1" => "$fechadehoy[year]-07-10 $horadiainicio", "2" => "Etzalcualiztli"),
		"6" => array("0" => "$fechadehoy[year]-07-10 $horadiainicio", "1" => "$fechadehoy[year]-07-30 $horadiainicio", "2" => "Tecuilhuitontli"),
		"7" => array("0" => "$fechadehoy[year]-07-30 $horadiainicio", "1" => "$fechadehoy[year]-08-19 $horadiainicio", "2" => "Huei Tecuilhuitl"),
		"8" => array("0" => "$fechadehoy[year]-08-19 $horadiainicio", "1" => "$fechadehoy[year]-09-08 $horadiainicio", "2" => "Tlaxöchimaco"),
		"9" => array("0" => "$fechadehoy[year]-09-08 $horadiainicio", "1" => "$fechadehoy[year]-09-28 $horadiainicio", "2" => "Xocohuetzi"),
		"10" => array("0" => "$fechadehoy[year]-09-28 $horadiainicio", "1" => "$fechadehoy[year]-10-18 $horadiainicio", "2" => "Ochpaniztli"),
		"11" => array("0" => "$fechadehoy[year]-10-18 $horadiainicio", "1" => "$fechadehoy[year]-11-07 $horadiainicio", "2" => "Teötlehco"),
		"12" => array("0" => "$fechadehoy[year]-11-07 $horadiainicio", "1" => "$fechadehoy[year]-11-27 $horadiainicio", "2" => "Tepeilhuitl"),
		"13" => array("0" => "$fechadehoy[year]-11-27 $horadiainicio", "1" => "$fechadehoy[year]-12-17 $horadiainicio", "2" => "Quecholli"),
    	"14" => array("0" => "$fechadehoy[year]-12-17 $horadiainicio", "1" => "$fechadehoy[year]-01-06 $horadiainicio", "2" => "Panquetzaliztli"),
    	"15" => array("0" => "$fechadehoy[year]-01-06 $horadiainicio", "1" => "$fechadehoy[year]-01-26 $horadiainicio", "2" => "Atemoztli"),
		"16" => array("0" => "$fechadehoy[year]-01-26 $horadiainicio", "1" => "$fechadehoy[year]-02-15 $horadiainicio", "2" => "Tititl"),
		"17" => array("0" => "$fechadehoy[year]-02-15 $horadiainicio", "1" => "$fechadehoy[year]-03-06 $horadiainicio", "2" => "Izcalli"),
//		"18"	=> array("0" => "$fechadehoy[year]-03-06 $horadiainicio", "1" => "$fechadehoy[year]-03-12 $horadiainicio", "2" => "Nemontemi"),

		);
	
	array_push($rangm[18],"$fechadehoy[year]-0312-17 $horadiainicio","$fechadehoy[year]-01-06 $horadiainicio", "");

		if  ($tipoanior == "Acatl") {
		}	
		// Cilco FOR para determinar en que Metztli se encuentra la fecha Gregoriana cualquiera de los demas tipos de año
		$i=0;
		for ($i=0,  $tamarr = sizeof($rangm);  $i < $tamarr;  ++$i) {
    	    if ($fechahoy > $rangm[$i][0] && $fechahoy < $rangm[$i][1]) {
        	        $idmetztli = $rangm[$i][2];
			} // fin de IF		
		} // fin de FOR
	} // Fin de  ELSE				
	
	// retorna el nombre del el metztli
	return ($idmetztli);

} // Cierre de funcion	

function asig_num_metztli($idmetztlir)
{
// Asignar numero de metztli
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

return ($num_metztli);

} // Cierre de Función


function obtener_zipac_pointer($zipac_atla_num)
{
// Lleva al puntero segun numero Zipactli Atlacahualo

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
        $zipac_num_point = 8;
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


function deter_grego_inicio_tecpatl($idmetztlir, $fechahoy, $fechadehoy, $horadiainicio)
{

if ($idmetztlir == "Atlacahualo") {
        $gregom_inicio = 11;
}

if ($idmetztlir == "Tlacaxipehualiztli") {
	if ($fechahoy > "$fechadehoy[year]-03-31 $horadiainicio") {
        $gregom_inicio = 31;
	}
	if ($fechahoy > "$fechadehoy[year]-04-01 $horadiainicio") {
        $gregom_inicio = 0;
	}
}

if ($idmetztlir == "Tozoztontli") {
	if ($fechahoy > "$fechadehoy[year]-04-20 $horadiainicio") {
        $gregom_inicio = 20;
	}
	if ($fechahoy > "$fechadehoy[year]-05-01 $horadiainicio") {
        $gregom_inicio = 0;
	}       
}

if ($idmetztlir == "Huei Tozoztli") {
        $gregom_inicio = 10;
}

if ($idmetztlir == "Toxcatl") {
        $gregom_inicio = 30;
}

if ($idmetztlir == "Etzalcualiztli") {
        $gregom_inicio = 19;
}

if ($idmetztlir == "Tecuilhuitontli") {
        $gregom_inicio = 9;
}

if ($idmetztlir == "Huei Tecuilhuitl") {
        $gregom_inicio = 29;
}

if ($idmetztlir == "Tlaxöchimaco") {
        $gregom_inicio = 18;
}

if ($idmetztlir == "Xocohuetzi") {
        $gregom_inicio = 7;
}

if ($idmetztlir == "Ochpaniztli") {
        $gregom_inicio = 27;
}

if ($idmetztlir == "Teötlehco") {
        $gregom_inicio = 17;
}

if ($idmetztlir == "Tepeilhuitl") {
        $gregom_inicio = 6;
}

if ($idmetztlir == "Quecholli") {
        $gregom_inicio = 26;
}

if ($idmetztlir == "Panquetzaliztli") {
        $gregom_inicio = 16;
}

if ($idmetztlir == "Atemoztli") {
        $gregom_inicio = 5;
}

if ($idmetztlir == "Tititl") {
        $gregom_inicio = 25;
}

if ($idmetztlir == "Izcalli") {
        $gregom_inicio = 14;
}

if ($idmetztlir == "Nemontemi") {
        $gregom_inicio = 6;
}

return ($gregom_inicio);

} // Cierre de Función 


function deter_grego_inicio_else($idmetztlir)
{
if ($idmetztlir == "Atlacahualo") {
        $gregom_inicio = 12;
}

if ($idmetztlir == "Tlacaxipehualiztli") {
        $gregom_inicio = 1;
}

if ($idmetztlir == "Tozoztontli") {
        $gregom_inicio = 21;
}

if ($idmetztlir == "Huei Tozoztli") {
        $gregom_inicio = 11;
}

if ($idmetztlir == "Toxcatl") {
        $gregom_inicio = 31;
}

if ($idmetztlir == "Etzalcualiztli") {
        $gregom_inicio = 20;
}

if ($idmetztlir == "Tecuilhuitontli") {
        $gregom_inicio = 10;
}

if ($idmetztlir == "Huei Tecuilhuitl") {
        $gregom_inicio = 30;
}

if ($idmetztlir == "Tlaxöchimaco") {
        $gregom_inicio = 19;
}

if ($idmetztlir == "Xocohuetzi") {
        $gregom_inicio = 8;
}

if ($idmetztlir == "Ochpaniztli") {
        $gregom_inicio = 28;
}

if ($idmetztlir == "Teötlehco") {
        $gregom_inicio = 18;
}

if ($idmetztlir == "Tepeilhuitl") {
        $gregom_inicio = 7;
}

if ($idmetztlir == "Quecholli") {
        $gregom_inicio = 27;
}

if ($idmetztlir == "Panquetzaliztli") {
        $gregom_inicio = 17;
}

if ($idmetztlir == "Atemoztli") {
        $gregom_inicio = 6;
}

if ($idmetztlir == "Tititl") {
        $gregom_inicio = 26;
}

if ($idmetztlir == "Izcalli") {
        $gregom_inicio = 15;
}

if ($idmetztlir == "Nemontemi") {
        $gregom_inicio = 6;
}

return ($gregom_inicio);

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
