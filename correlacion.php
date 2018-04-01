<html>
<head>
<title>CORRELACION CUENTA TOLTECA DEL TIEMPO</title>
</head>
<body>

<p>
<?php
// Establecer la zona de tiempo: Mexico
date_default_timezone_set('America/Mexico_City');

// Incluir las funciones para obtener cada elemento
include ("corre_funciones.php");

// Convertir las variables POST en locales
foreach ($_POST as $nombre => $valor) {
	if(stristr($nombre, 'button') === FALSE) {
		${$nombre} = $valor;
	}
} // Cierre foreach	

//------------------------------------------------ DETERMINAR EL TIPO DE AÑO TOLTECA Y SU NUMERAL ------------------------------------------------
// Determinar el modulo del año ingresado
$modanio =  $anio_ingr % 52;

// "Armar" la fecha buscada
$fechahoy = "$dia_ingr-$mes_ingr-$anio_ingr $hora_ingr:$min_ingr:$seg_ingr";

// Asignar el valor del año ingresado a la variable que marca el inicio del Año (Tolteca) ";
$inicia_anio = $anio_ingr;

// Obtener Tipo de Año y Su numeral mediante funciones
$tipoanior = anio($modanio);   // Retorna el tipo de año

// Determinar si el año es el obtenido o uno anterior
switch ($tipoanior) {
    case "Calli":
		$horadiainicio = "00:43:00";
		$horadiafin = "00:42:59";
		$fecha_ingr = strtotime($fechahoy);
		$fecha_ref = "12-03-$anio_ingr $horadiainicio"; 
		$fecha_inicia_xihuitl = strtotime($fecha_ref);
        if ($fecha_ingr < $fecha_inicia_xihuitl) {
				$inicia_anio = $anio_ingr - 1; // Restar 1 al año ingresado
                $modanio = $modanio - 1; // Restar 1 al modulo del año
                $tipoanior = anio($modanio); // Reobtener el tipo de año
				$horadiainicio = "18:43:00";
				$horadiafin = "18:42:59";
		} // cierre de if Calli
        break;
    case "Tochtli":
		$horadiainicio = "06:43:00";
		$horadiafin = "06:42:59";
		$fecha_ingr = strtotime($fechahoy);
		$fecha_ref = "12-03-$anio_ingr $horadiainicio"; 
		$fecha_inicia_xihuitl = strtotime($fecha_ref);
        if ($fecha_ingr < $fecha_inicia_xihuitl) {
				$inicia_anio = $anio_ingr - 1;
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
				$horadiainicio = "00:43:00";
				$horadiafin = "00:42:59";
        } // cierre de if Tochtli
        break;
    case "Acatl":
//      echo "Xihuitl is Acatl";
        $horadiainicio = "12:43:00";
		$horadiainicio = "12:42:59";
		$fecha_ingr = strtotime($fechahoy);
		$fecha_ref = "12-03-$anio_ingr $horadiainicio"; 
		$fecha_inicia_xihuitl = strtotime($fecha_ref);
        if ($fecha_ingr < $fecha_inicia_xihuitl) {
				$inicia_anio = $anio_ingr - 1;
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
				$horadiainicio = "06:43:00";
				$horadiafin = "06:42:59";
        } // cierre de if Acatl
		break;
    case "Tecpatl":
//      echo "Xihuitl is Tecpatl";
        $horadiainicio = "18:43:00";
		$horadiainicio = "18:42:59";
		$fecha_ingr = strtotime($fechahoy);
		$fecha_ref = "11-03-'.$anio_ingr. $horadiainicio"; 
		$fecha_inicia_xihuitl = strtotime($fecha_ref);
        if ($fecha_ingr < $fecha_inicia_xihuitl) {
				$inicia_anio = $anio_ingr - 1;
                $modanio = $modanio - 1;
                $tipoanior = anio($modanio);
				$horadiainicio = "12:43:00";
				$horadiafin = "12:42:59";
        } // cierre de if Tecpatl
		break;	
} // Cierre de Switch

//		echo "fecha ingresada: $fecha_ingr, fecha referencia: $fecha_inicia_xihuitl"; 

//------------------------------------------------ FIN DE DERTEMINAR EL TIPO DE AÑO TOLTECA ------------------------------------------------


//------------------------------------------------ DETERMINAR EL MEZTLI ---------------------------------------------------------------------

$idmetztlir = determina_metztli($fechahoy, $inicia_anio, $horadiainicio, $horadiafin, $tipoanior);

//------------------------------------------------ FIN DE DETERMINAR EL MEZTLI --------------------------------------------------------------


//------------------------------------------------ DETERMINAR NUMERALES Y CALCULOS INTERMEDIOS ----------------------------------------------


$numanior = numeral($modanio);

// Determinar el Numeral Zipactli Atlacahualo (primero del año)
$zipac_atla_num = zipac_atla($numanior); // Regresa el numeral del Zipactli Atlacahualo

// Obtener el numero de metztli (1 - 19) 
$num_metztlir = asig_num_metztli($idmetztlir); // Regresa el numero del Metztli

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

// Determinar el dia del mes el calendario gregoriano [ESPACIO] para buscarlo en la con la funcion detdiascont(tec) 
$diaabusc = $dia_ingr;

// Determinar los retornos que se contaran en el array $ilhuitl
if ($tipoanior == "Tecpatl") {
        $dias_a_contar = detdiasaconttec($idmetztlir, $diaabusc);
} else {
        $dias_a_contar = detdiasacont($idmetztlir, $diaabusc, $tipoanior);
}

// $horaahora=getdate();
$horahoy = "$hora_ingr:$min_ingr:$seg_ingr $ampm_ingr";

     		
	if ($dias_a_contar == 0 && $idmetztlir != "Nemontemi")  {
		echo "dias a contar excluye 0: $dias_a_contar";
	} else {
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Tecpatl" && $fechahoy >= "$anio_ingr-03-11 18:43:00" && $fechahoy <= "$anio_ingr-03-12 00:43:00") {
//			$horadiainicio = "00:43:00 am";	
			$dias_a_contar = $dias_a_contar - 1;
			echo "contando el cuarto de dia que falta";
		} else {		
			if ($horahoy <= $horadiainicio) {
				$dias_a_contar = $dias_a_contar - 1;
				echo "dias a contar excluye 0: $dias_a_contar";
			}
		}		
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
			if ($dias_a_contar == 0) {
				$ilhui_pos = "Zipactli";
			} else {	
				$ilhuitl = array("Zipactli","Ehecatl","Calli","Cuetzpalli","Cohuatl");
				while ($i < $dias_a_contar) {
					$ilhui_pos = next($ilhuitl);
					$i++; 
				} // cierre de while
			}	
		}	
		
		// Nemontemi Año Acatl
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Acatl") { 
			if ($dias_a_contar == 0) {
				$ilhui_pos = "Miquiztli";
			} else {		
				$ilhuitl = array("Miquiztli","Mazatl","Tochtli","Atl","Itzcuintli");
				while ($i < $dias_a_contar) {
					$ilhui_pos = next($ilhuitl);
					$i++; 
				} // cierre de while
			}	
		}	

		// Nemontemi Año Tecpatl
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Tecpatl") { 
			if ($dias_a_contar == 0) {
				$ilhui_pos = "Ozomahtli";
			} else {		
				$ilhuitl = array("Ozomahtli","Malinalli","Acatl","Ozelotl","Cuauhtli");
				while ($i < $dias_a_contar) {
					$ilhui_pos = next($ilhuitl);
					$i++; 
				} // cierre de while
			}				
		}	

		// Nemontemi Año Calli
		if ($idmetztlir == "Nemontemi" && $tipoanior == "Calli") { 
			if ($dias_a_contar == 0) {
				$ilhui_pos = "Cozcacuauhtli";
			} else {		
				$ilhuitl = array("Cozcacuahtli","Olin","Tecpatl","Quiyahuitl","Xöchitl");
				while ($i < $dias_a_contar) {
					$ilhui_pos = next($ilhuitl);
					$i++; 
				} // cierre de while
			}	
		}
		
		print_r($ilhuitl);
		
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




$i = 1;
$ilhuitl_pohua = array (1,2,3,4,5,6,7,8,9,10,11,12,13,1,2,3,4,5,6,7,8,9,10,11,12,13,1,2,3,4,5,6,7,8,9,10,11,12,13);
while ($i < $inicia_metztlir) {
$ilhui_num_pos = next($ilhuitl_pohua);
$i++;
}

// echo "<h3> Posicion del Numeral: $ilhui_num_pos</h3>";

$i = 0;
while ($i < $dias_a_contar) {
$ilhui_num_pos = next($ilhuitl_pohua);
$i++;
}


$ilhui_numeral = ilhui_num($ilhui_num_pos);




$fsize = 3;
$fcolor = "000000";

// Resporte
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Fecha Gregoriana Actual: <strong>$fechahoy</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Valor del Modulo de el año  en curso: <strong>$modanio</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Tipo de Año: <strong>$tipoanior</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Numeral Zipactli Atlacahualo: <strong>$zipac_atla_num</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Metztli: <strong>$idmetztlir</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Numero de Metztli: <strong>$num_metztlir</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Inicia Metztli en (Zipactli del Metztli): <strong>$inicia_metztlir</strong></font></p>";
echo "el dia ingresado: $dia_ingr";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Dia del mes calendario Gregoriano: <strong>$diaabusc</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Dias a contar: <strong>$dias_a_contar</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Hora de inicio del ilhuitl: <strong>$horadiainicio</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">El Metztli Actual es: <strong>$idmetztlir</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">El Ilhuitl es: <strong>$ilhui_pos</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">Y Su Numeral es: <strong>$ilhui_numeral</strong></font></p>";
echo "<p><font size=\"$fsize\" face=\"Eras Light ITC\" color=\"$fcolor\">AXCAN TICATEH: <strong>$ilhui_numeral $ilhui_pos Ipan $idmetztlir Metztli ipan $numanior $tipoanior Xihuitl</strong></font></p>";

?>

</p>
</body>
</html>
