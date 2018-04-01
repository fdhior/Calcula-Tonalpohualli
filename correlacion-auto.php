<html>
<head>
<title>CORRELACION CUENTA TOLTECA DEL TIEMPO</title>
</head>
<body>
<p>
<font size="1" color="#000000">
<a target="_blank" href="doc_hojeador.php?id_doc=1"><span style="font-family: Verdana">
lu</span><span lang="EN-US" style="font-family: Verdana">nes 30 de abril de 2007</span></a></font><font size="1"><span style="font-family: Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></font>
</p>

<?php
date_default_timezone_set('America/Mexico_City');
$hoy = getdate();
print_r($hoy);

// Definir variables y llamar funcion
include ("corre_funciones.php");
$fechadehoy=getdate();
$modanio = $fechadehoy[year] % 52;
$aniogreg = $fechadehoy[year];

// $tipoanio = "inicial";
$fechahoy=date('Y-m-d H:i:s a', $fechadehoy[0]);

// Obtener Tipo de Año y Su numeral mediante funciones
$tipoanior = anio($modanio);   // Retorna el tipo de año

// Determinar si el año es el obtenido o uno anterior
switch ($tipoanior) {
    case "Calli":
//      echo "Xihuitl is Calli";
		$horadiainicio = "00:43:00 am";
        if ($fechahoy <= "$fechadehoy[year]-03-12 $horadiainicio") {
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
                $numanior = numeral($modanio);
				$horadiainicio = "18:43:00 pm";			
		} // cierre de if Calli
        break;
    case "Tochtli":
//      echo "Xihuitl is Tochtli";
        $horadiainicio = "06:43:00 am";
        if ($fechahoy <= "$fechadehoy[year]-03-12 $horadiainicio") {
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
                $numanior = numeral($modanio);
				$horadiainicio = "00:43:00 am";
        } // cierre de if Tochtli
        break;
    case "Acatl":
//      echo "Xihuitl is Acatl";
        $horadiainicio = "12:43:00 pm";
        if ($fechahoy <= "$fechadehoy[year]-03-12 $horadiainicio") {
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
                $numanior = numeral($modanio);
				$horadiainicio = "06:43:00 am";
        } // cierre de if Acatl
		break;
    case "Tecpatl":
//      echo "Xihuitl is Tecpatl";
        $horadiainicio = "18:43:00 pm";
        if ($fechahoy <= "$fechadehoy[year]-03-11 $horadiainicio") {
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
                $numanior = numeral($modanio);
				$horadiainicio = "12:43:00 pm";
        } // cierre de if Tecpatl
		break;	
} // Cierre de Switch

$fsize = 3;
$fcolor = "#3366CC";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Fecha Gregoriana Actual: <strong>$fechahoy</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Valor del Modulo de el año  en curso: <strong>$modanio</strong></font></p>";

// obtener el numeral del año segun su tipo
$numanior = numeral($modanio); // Retorna el numeral del año

echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Tipo de Año: <strong>$tipoanior</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Numeral del Año: <strong>$numanior</strong></font></p>";

// Determinar el Numeral Zipactli Atlacahualo (primero del año)
$zipac_atla_num = zipac_atla($numanior); // Regresa el numeral del Zipactli Atlacahualo

echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Numeral Zipactli Atlacahualo: <strong>" .$zipac_atla_num. "</strong></font></p>";

// if ($tipoanior == "Tecpatl") {
// Obtener el nombre ddel metztli en curso
$idmetztlir = determina_metztli($fechahoy, $fechadehoy, $horadiainicio, $tipoanior);
// } else {
//      $idmetztlir = determina_metztli($fechahoy, $fechadehoy, $horadiainicio);
// }

echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Metztli: <strong>" .$idmetztlir. "</strong></font></p>";

// Obtener el numero de metztli (1 - 19) 
$num_metztlir = asig_num_metztli($idmetztlir); // Regresa el numero de metztli asignado

echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Numero de Metztli: <strong>" .$num_metztlir. "</strong></font></p>";

// Se obtiene la posiciòn de el numeral Zipactli Altlacahualo en el array zipac_metz ejemplo 8 esta el posición [2]
// se debe mover el "puntero" a la posición del numeral para avanzar el numero de metztli ($num_metztlir)
// para obtener el numeral zipactli de ese metztli en particular
$zipac_num_pointer = obtener_zipac_pointer($zipac_atla_num);

$i = 1;
$zipac_metz = array (1,8,2,9,3,10,4,11,5,12,6,13,7,1,8,2,9,3,10,4,11,5,12,6,13,7,1,8,2,9,3,10,4,11,5,12,6,13,7);

// Muevo el puntero hasta la posición obtenida en $zipac_num_pointer
while ($i < $zipac_num_pointer) {
$pos = next($zipac_metz);
$i++;
}
// "Cuento" moviendo el puntero las posiciones definidas en $num_metztlir y obtengo el numeral zipactli de el mes que busco
// ya se en numeral inicia el metztli que obtuve anteriormente.
$i = 1;
while ($i < $num_metztlir) {
$pos = next($zipac_metz);
$i++;
}

// Almaceno el valor de el numeral zipactli del metztli 
$inicia_metztlir = current($zipac_metz);

// echo "<h3>Fecha y Hora Actuales: $fechahoy </h3>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Inicia Metztli en (Zipactli del Metztli): <strong>$inicia_metztlir</strong></font></p>";
// Nota: hay que convertir el numeral en Nahua


// echo "<h3>Metztli: " .$idmetztlir. "</h3>";

// Definir nuevo formato de fecha para comparacion
// $fechadehoyf2=getdate();
// $fechahoyf2=date('Y-F-d H:i:s a', $fechadehoyf2[0]);

// Determinar el dia del mes el calendario gregoriano [ESPACIO] para buscarlo en la con la funcion detdiascont(tec) 
$diaabusc = $fechadehoy[mday];

echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Dia del mes calendario Gregoriano: <strong>$diaabusc</strong></font></p>";

// Determinar los retornos que se contaran en el array $ilhuitl
if ($tipoanior == "Tecpatl") {
        $dias_a_contar = detdiasaconttec($idmetztlir, $diaabusc);
} else {
        $dias_a_contar = detdiasacont($idmetztlir, $diaabusc, $tipoanior);
}

echo "<h3>Dias a contar: $dias_a_contar</h3>";



$horaahora=getdate();
$horahoy=date('H:i:s a', $horaahora[0]);

echo "<h3>Hora actual " . $horahoy .", Hora de inicio del dia este xihuitl: " . $horadiainicio . "</h3>";
echo "<h3>busco esta fecha: " .$fechadehoy[year]."-".$fechadehoy[mon]."-".$diaabusc." ".$horadiainicio. "</h3>";


/*	if ($dias_a_contar == 0) {
		$dias_a_contar = 1;
	}*/
     		
	if ($dias_a_contar == 0)  {
		echo "dias a contar excluye 0: $dias_a_contar";
	} 
	
	else {
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Tecpatl" && $fechahoy < "$fechadehoy[year]-03-11 18:43 pm" && $fechahoy > "$fechadehoy[year]-03-12 00:43 am") {
//			$horadiainicio = "00:43:00 am";	
			$dias_a_contar = $dias_a_contar - 1;
			echo "contando el cuerto de dia que falta";
		} else {		
			if ($horahoy <= $horadiainicio) {
				$dias_a_contar = $dias_a_contar - 1;
			}
		}		
/*		if ($horahoy >= "$fechadehoy[year]-$fechadehoy[mon]-$diaabusc $horadiainicio") {
			$dias_a_contar = $dias_a_contar + 1;
		}*/
//		echo "<h3>dias a contar checando la hora: $dias_a_contar</h3>";
    }

	
// Inicializa la variable i
	$i = 0;
	// Buscar en los Nemontemi si corresponde
	if ($idmetztlir == "Nemontemi") {
		$conv_a_numr = conv_a_num($numanior);
//		echo "<h3>numeral del año en numero arabigo: $conv_a_numr</h3>";
		$inicia_nemor = inicia_nemo($conv_a_numr);
///		echo "<h3>numeral en que inicia el nemontemi de este año: $inicia_nemor</h3>";
		$inicia_metztlir = $inicia_nemor;
		// Determina en que numeral empieza el metztli 

		// Nemontemi Año Tochtli
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Tochtli") { 
			$ilhuitl = array("Zipactli","Ehecatl","Calli","Cuetzpalli","Cohuatl");
		}	
		
		// Nemontemi Año Acatl
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Acatl") { 
			$ilhuitl = array("Miquiztli","Mazatl","Tochtli","Atl","Itzcuintli");
		}	

		// Nemontemi Año Tecpatl
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Tecpatl") { 
			$ilhuitl = array("Ozomahtli","Malinalli","Acatl","Ozelotl","Cuauhtli");
		}	

		// Nemontemi Año Calli
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Calli") { 
			$ilhuitl = array("Cozcacuahtli","Olin","Tecpatl","Quiyahuitl","Xöchitl");
		}
		
		print_r($ilhuitl);
		
			while ($i < $dias_a_contar) {
				$ilhui_pos = next($ilhuitl);
				$i++; 
			} // cierre de while

//		}// Cierre if Nemontemi	

	} else { // si no busca en los ilhuitl de cada mes

		if ($dias_a_contar == 0) {

			// Determinar que ilhui_pos es igual a ZIpactli cuando dias_a_contar es 0 
			// de otra manaera no se obtiene ZIpactli dado que no se avanza en el array
			$ilhui_pos = "Zipactli";

		} else {  
			$ilhuitl = array("Zipactli","Ehecatl","Calli","Cuetzpalli","Cohuatl","Miquiztli","Mazatl","Tochtli","Atl","Itzcuintli","Ozomahtli","Malinalli","Acatl","Ozelotl","Cuauhtli","Cozcacuahtli","Olin","Tecpatl","Quiyahuitl","Xöchitl");
				while ($i < $dias_a_contar) {
					$ilhui_pos = next($ilhuitl);
					$i++; 
				} // cierre de while
		} // cierre if Zipactli		
	} // cierre de else


/*			do {   
				$ilhui_pos = next($ilhuitl);
				$i++;
//			} while ($i < $dias_a_contar); */


echo "<h3>ilhuitl del Metztli: $ilhui_pos </h3>";
// echo "<h3>Dias para contar: $dias_a_contar </h3>";
// echo "<h3>Ilhuitl: $axcan_ilhuitl</h3>";

$i = 1;
$ilhuitl_pohua = array (1,2,3,4,5,6,7,8,9,10,11,12,13,1,2,3,4,5,6,7,8,9,10,11,12,13,1,2,3,4,5,6,7,8,9,10,11,12,13);
while ($i < $inicia_metztlir) {
$ilhui_num_pos = next($ilhuitl_pohua);
$i++;
}
echo "<h3> Posicion del Numeral: $ilhui_num_pos</h3>";

$i = 0;
while ($i < $dias_a_contar) {
$ilhui_num_pos = next($ilhuitl_pohua);
$i++;
}

echo "<h3>inicio del ilhuitl: $horadiainicio</h3>";

$ilhui_numeral = ilhui_num($ilhui_num_pos);

echo "<h3> Numeral del Ilhuitl: $ilhui_num_pos</h3>";

echo "<h3>" .$fechadehoy[year]. " Corresponde a un año " .$numanior. " " .$tipoanior. " en la Cuenta Tolteca del Tiempo</h3>";
echo "<h3> Su Numeral Zipactli Altlacahualo es: $zipac_atla_num</h3>";
echo "<h3> El Metztli Actual es: $idmetztlir</h3>";
echo "<h3> Numero de Metztli: $num_metztlir</h3>";
echo "<h3> El Ilhuitl es: $ilhui_pos</h3>";
echo "<h3> Y Su Numeral es: $ilhui_numeral</h3>";
echo "<h3> AXCAN TICATEH: $ilhui_numeral $ilhui_pos Ipan $idmetztlir Metztli ipan $numanior $tipoanior Xihuitl</h3>";


echo "<h3>" .$fechadehoy[year]. "</h3>";
echo "<h3>" .$modanio. "</h3>";


$anios = array ("Calli", "Tochtli", "Acatl", "Tecpatl");
echo "</h3>" .$anios[0]. "</h3>";
echo "</h3>" .$t[mon]. "</h3>"; 


// echo "<h3>Dia del inicio: $gregom_inicio</h3>";

// $dias_a_contar = ($dia_actual - $gregom_inicio);

// echo "<h3>dia_actual - gregom_inicio: $dias_a_contar</h3>";

/*if ($idmetztlir == "Izcalli") {
        if ($dias_a_contar < 1) {
                $dias_a_contar = (29 - 15) + $dia_actual;
        }
}

if ($idmetztlir == "Tlacaxipehualiztli") {
//	if ($dias_a_contar > 0) {
        if ($dias_a_contar < 0) {
                $dias_a_contar = ($dias_a_contar + 30) + $dia_actual;
//                                      -30 + 30 = 0 + 1 = 1
//                                      -29 + 30 = 1 + 1 = 2

        }
//	}		
}*/


// $hora_actual = date('H:i a', $horadehoy[0]);

// $fecharesta = $fechadehoy - 5;

// echo "<h3>$fecharesta</h3>";

// if ($fechahoyf2 < "$fechadehoyf2[year]-$fechadehoyf2[month]-$fechadehoyf2[mday] $horadiainicio") {
//        $dias_a_contar = $dias_a_contar - 1;
//}

// echo "<h3>Fecha y Hora Actual: $fechahoyf2</h3>";
// echo "<h3>Fecha Inicio Ilhuitl: $fechadehoyf2[year]-$fechadehoyf2[month]-$fechadehoyf2[mday] $horadiainicio</h3>";


// Matriz de Retornos
// Agrega aqui la condicional de la hora de inicio según el tipo de año



/*      $t = getdate();
    $today=date('Y-m-d',$t[0]);
    
    //This Week//
    $start=$t[0]-(86400*$t[wday]);
    $twstart=date('Y-m-d',$start);
    
    //Last Week//
    $lwstart=$start-604800;
    $lwend=$lwstart+518400;
    $lwstart=date('Y-m-d',$lwstart);
    $lwend=date('Y-m-d',$lwend);
    
    //This Month//
    $tmstart="$t[year]-$t[mon]-01";
    
    //Last Month//
    if($t[mon]=="1"){
    $lmstart="2007-12-01";
    }
    else {
    $lmstart="$t[year]-".($t[mon]-1)."-01";
    }
    $lmmonth=($t[mon]-1);
    if($lmmonth=="4" OR $lmmonth=="5" OR $lmmonth=="9" OR $lmmonth=="11"){
    $lmend="$t[year]-$lmmonth-30";
    }
    elseif($t[mon]=="2"){
    $lmend="$t[year]-$lmmonth-28";
    }
    else {
    $lmend="$t[year]-$lmmonth-31";
    }
    
    //This Quarter//
    if($t[mon]=="1" OR $t[mon]=="2" OR $t[mon]=="3"){
    $tqstart="$t[year]-01-01";
    $tqend="$t[year]-03-31";
    }
    elseif($t[mon]=="4" OR $t[mon]=="5" OR $t[mon]=="6"){
    $tqstart="$t[year]-04-01";
    $tqend="$t[year]-06-30";
    }
    elseif($t[mon]=="7" OR $t[mon]=="8" OR $t[mon]=="9"){
    $tqstart="$t[year]-07-01";
    $tqend="$t[year]-09-30";
    }
    else {
    $tqstart="$t[year]-10-01";
    $tqend="$t[year]-12-31";
    }
    
    //Last Quarter//
    
    if($t[mon]=="1" OR $t[mon]=="2" OR $t[mon]=="3"){
    $lwstart=($t[year]-1)."-10-01";
    $lwend=($t[year]-1)."-12-31";
    }
    elseif($t[mon]=="4" OR $t[mon]=="5" OR $t[mon]=="6") {
    $lqstart="$t[year]-01-01";
    $lqend="$t[year]-03-31";
    }
    elseif($t[mon]=="7" OR $t[mon]=="8" OR $t[mon]=="9"){
    $lqstart="$t[year]-04-01";
    $lqend="$t[year]-06-30";
    }
    else {
    $lqstart="$t[year]-07-01";
    $lqend="$t[year]-09-30";
    }
    
    //Year To Date//
    $ystart="$t[year]-01-01";
    
    //Last Year To Same Date//
    $lystart=($t[year]-1)."-01-01";
    $lytend=($t[0]-31536000);
    $lytend=date('Y-m-d',$lytend);
    
    //Last Year//
    $lyend=($t[year]-1)."-12-31";
    
    
    
    echo "This Week<br>Start $twstart<br>Finish $today<br><br>";
    echo "Last Week<br>Start $lwstart<br>Finish $lwend<br><br>";
    echo "This Month<br>Start $tmstart<br>Finish $today<br><br>";
    echo "Last Month<br>Start $lmstart<br>Finish $lmend<br><br>";
    echo "This Quarter<br>Start $tqstart<br>Finish $today<br><br>";
    echo "Last Quarter<br>Start $lqstart<br>Finish $lqend<br><br>";
    echo "Year To Date<br>Start $ystart<br>Finish $today<br><br>";
    echo "Last Year To Date<br>Start $lystart<br>Finish $lytend<br><br>";
    echo "Last Year<br>Start $lystart<br>Finish $lyend<br><br>"; */

// $monthnum = $fechadehoy[mon];

// echo "<h3>Valor de Número de Mes " .$monthnum. "</h3>";

// considerar comabio de inicio de dia para cambio de año
// restar dias si se da un año tecpatl

 /* echo "<h3>Valor de Número de Mes $fechadehoy[year]-01-26 12:43 pm </h3>";
$testfecha = "$fechadehoy[year]-01-26 12:43 pm";

echo "<h3>Valor de testfecha " .$testfecha. "</h3>";

if ($fechahoy < $testfecha) {
                $idmetztli = "Panquetzaliztli";
}

echo "<h3>Valor de idmetztli " .$idmetztli. "</h3>"; */

// Daterminar Metztli

/*
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

// Lleva al puntero segun numero Zipactli Atlacahualo


if ($zipac_num == '1') {
        $zipac_num_pointer = 1;
}

if ($zipac_num == '8') {
        $zipac_num_pointer = 2;
}

if ($zipac_num == '2') {
        $zipac_num_pointer = 3;
}

if ($zipac_num == '9') {
        $zipac_num_pointer = 4;
}

if ($zipac_num == '3') {
        $zipac_num_pointer = 5;
}

if ($zipac_num == '10') {
        $zipac_num_pointer = 6;
}

if ($zipac_num == '4') {
        $zipac_num_pointer = 7;
}

if ($zipac_num == '11') {
        $zipac_num_pointer = 8;
}

if ($zipac_num == '5') {
        $zipac_num_pointer = 9;
}

if ($zipac_num == '12') {
        $zipac_num_pointer = 10;
}

if ($zipac_num == '6') {
        $zipac_num_pointer = 11;
}

if ($zipac_num == '13') {
        $zipac_num_pointer = 12;
}

if ($zipac_num == '7') {
        $zipac_num_pointer = 13;
}

$i = 1;
$zipac_metz = array (1,8,2,9,3,10,4,11,5,12,6,13,7,1,8,2,9,3,10,4,11,5,12,6,13,7,1,8,2,9,3,10,4,11,5,12,6,13,7);
while ($i < $zipac_num_pointer) {
$pos = next($zipac_metz);
$i++;
// echo "Current element: " . current($zipac_metz);
// echo "End element: " . end($zipac_metz);
}


$i = 1;
while ($i < $num_metztli) {
$pos = next($zipac_metz);
$i++;
echo "<h3>Current element: " .current($zipac_metz). "</h3><br>";
}

$inicia_metztli = current($zipac_metz);*/

/* $os = array ("Mac", "NT", "Irix", "Linux");
if (in_array ("Irix", $os))
    print "Encontrado Irix";
if (in_array("mac", $os)) {
    echo "Encontrado mac";
}*/
/* $os = array ("Mac", "NT", "Irix", "Linux");
if (in_array ("Irix", $os))
    print "Encontrado Irix";
if (in_array("mac", $os)) {
    echo "Encontrado mac";
}*/


?>

<p><font color="#3366CC" size="4" face="Eras Light ITC">mmmr</font></p>
</body>
</html>
