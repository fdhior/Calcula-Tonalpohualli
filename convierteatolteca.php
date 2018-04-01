<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convertir una fecha del calendario gregoriano a su equivalente en la Cuenta Tolteca del Tiempo</title>

<?php 

	// Establecer la zona Horaria
	date_default_timezone_set('America/Mexico_City');

	// Convierte las variables POST en locales
	foreach ($_POST as $nombre => $valor) {
		if(stristr($nombre, 'button') === FALSE) {
			${$nombre} = $valor;
		}
	} // Cierre foreach	

	// DEFINICION DE FUNCIONES
	function convierteANumeral($aNumeral) {
		
		// Convertir el numeral (en Nabua) en Numero arabigo
		$matrizNumeral = array ("Ze"               => "1",
						        "Ome"              => "2",
						        "Yei"              => "3",
						        "Nahui"            => "4",
						        "Macuilli"         => "5",
					            "Chicoaze"         => "6",
					            "Chicome"          => "7",
					            "Chicoyei"         => "8",
					            "Chiconahui"       => "9",
					            "Matlactli"        => "10",
					            "Matlactlihuan Ze"  => "11",
					            "Matlactlihuan Ome" => "12",
					            "Matlactlihuan Yei" => "13");
	
		$numeral = array_search("$aNumeral", $matrizNumeral);
		return $numeral;	

	}

	function convierteTipoAnio($tipoAnioResiduo) {
		
		// Convertir el tipo Año a nahuatl
		$matrizTipoAnios = array ("Calli"   => "1",
						          "Tochtli" => "2",
						          "Acatl"   => "3",
						          "Tecpatl" => "4");
	
		$xihuitl = array_search("$tipoAnioResiduo", $matrizTipoAnios);
		return $xihuitl;	

	} 

	function obtenerValorP ($mesGregoriano) {

		// Obtiene el mes a procesar arabigo
		$matrizP = array ("-11" => "3",
						  "20"  => "4",
						  "50"  => "5",
						  "81"  => "6",
						  "117" => "7",
					      "142" => "8",
					      "173" => "9",
					      "203" => "10",
					      "234" => "11",
					      "264" => "12",
					      "295" => "1",
					      "326" => "2",
					      "354" => "13");
	
		$valorP = array_search("$mesGregoriano", $matrizP);
		return $valorP;
	}


	function obtenerMeztli($numeroMeztliObtenido) {
		
		// Obtiene el nombre del meztli en Nahuatl
		$matrizMetztli = array ("Atlacahualo"        => "1",
			                    "Tlacaxipehualiztli" => "2",
                                "Tozoztontli"        => "3",
                                "Huei Tozoztli"      => "4",
	  		                    "Toxcatl"            => "5",
	  		                    "Etzalcualiztli"     => "6",
	  		                    "Tecuilhuitontli"    => "7",
	  		                    "Huei Tecuilhuitl"   => "8",
	  		                    "Tlaxöchimaco"       => "9",
	  		                    "Xocohuetzi"         => "10",
	  		                    "Ochpaniztli"        => "11",
	  		                    "Teötlehco"          => "12",
	  		                    "Tepeilhuitl"        => "13",
	  		                    "Quecholli"          => "14",
	  		                    "Panquetzaliztli"    => "15",
	  		                    "Atemoztli"          => "16",
	  		                    "Tititl"             => "17",
	  		                    "Izcalli"            => "18",
	  		                    "Nemontemi"          => "19"); // Fin de Array
		
		$meztli = array_search("$numeroMeztliObtenido", $matrizMetztli);
		return $meztli;
	}


	function obtenerIlhuitl($numeroIlhuitlObtenido) {

		// Pbtener el Ilhuitl en Nahuatl
		$matrizIlhuitl = array("Zipactli" => "1",  "Ehecatl"    => "2",  "Calli"      => "3",  "Cuetzpalli"    => "4",
						       "Cohuatl"  => "5",  "Miquiztli"  => "6",  "Mazatl"     => "7",  "Tochtli"       => "8",
						       "Atl"      => "9",  "Itzcuintli" => "10", "Ozomahtli"  => "11", "Malinalli"     => "12",
						       "Acatl"    => "13", "Ocelotl"    => "14", "Cuauhtli"   => "15", "Cozcacuauhtli" => "16",
						       "Ollin"    => "17", "Tecpatl"    => "18", "Quiyahuitl" => "19", "Xöchitl"       => "20");
		
		$ilhuitl = array_search("$numeroIlhuitlObtenido", $matrizIlhuitl);
		return $ilhuitl;
	
	}

	function obtenFechaRetroceso($tipoDeAnioObtenido, $anio) {

	 	switch ($tipoDeAnioObtenido) {
			case '1':
				return "12-03-$anio 00:43:00";
				break;
			case '2':
				return "12-03-$anio 06:43:00";
				break;			
			case '3':
				return "12-03-$anio 12:43:00";
				break;	
			case '4':
				return "11-03-$anio 18:43:00";
				break;	
			default:
				# code...
				break;
		}
	 }
	

    // Mostrar los valores de _POST
 //    echo "Valores de _POST <br />";
 //    foreach ($_POST as $nombre => $valor) {
 //    	if(stristr($nombre, 'button') === FALSE) {
	// 		print "Nombre de la variable: <b>$nombre</b> Valor de la variable: $valor<br />";
	// 	}
	// }

?>

<link rel="stylesheet" href="css/cuenta.css" type="text/css" />

</head>

<body>
<p>	

<img src="imagenes/numerales/ze2.png">
<?php


	/* (1) Obtener el año a procesar, la variable $anio contiene el año introducido por el 
	   usuario en el formulario de entrada
    */ 

	 // Fecha completa buscada
	$fechabuscada = $dia.'-'.$mes.'-'.$anio.' '.$hora.':'.$min.':'.$seg;

	echo '<br />Fecha que se busca: '.$fechabuscada.'<br />';  

	$fechaIngresada  = "$dia-$mes-$anio $hora:$min:$seg";
	$fechaMarzoAcatl = "01-03-$anio 12:43:00";

	$anioDeTrabajo = $anio;


	/* (2) Obtener el Tipo de Año A = (añoG)base4
	*/
	if (($anioDeTrabajo % 4) == 0) {
		$tipoDeAnio = 4;
		$fechaRetroceso = obtenFechaRetroceso($tipoDeAnio, $anioDeTrabajo);
	} else {
		$tipoDeAnio = $anioDeTrabajo % 4;
		$fechaRetroceso = obtenFechaRetroceso($tipoDeAnio, $anioDeTrabajo);

	}

	// echo $fechaRetroceso; 	

	if (strtotime($fechaIngresada) <  strtotime($fechaRetroceso)) {
		$anioIngresado = $anioDeTrabajo;
		$anioDeTrabajo -= 1;
		if (($anioDeTrabajo % 4) == 0) {
			$tipoDeAnio == 4;
		} else {
			$tipoDeAnio = $anioDeTrabajo % 4;
		}
		// $fechaRetroceso = obtenFechaRetroceso($tipoDeAnio);
	}

   
	//Calcula Inicio Nemontemi 
	switch ($tipoDeAnio) {
		case '1':
			$inicioNemontemi = "07-03-$anio 00:43:00";
			break;
		case "2":
			$inicioNemontemi = "07-03-$anio 06:43:00";
			break;
		case '3':
			$inicioNemontemi = "06-03-$anio 12:43:00";
			break;	
		case '4':
			$inicioNemontemi = "06-03-$anio 18:43:00";
			break;			
			
		default:
			# code...
			break;
	}

	/* (3) Obtener el numeral del año X = (anioG + 3)base13 
    */ 	
	$numeralAnio = ($anioDeTrabajo + 3) % 13;

	/* (4) Obtener día y mes a procesar (gregoriano)
	*/

	/* (5) obtener Meztli (ya teniendo valor de P) M = (P + D + *1)/20 + 1
	   * Solo en años tecpatl y al 1ro de Marzo de Acatl /-- TODO --/
	*/
	if ( $tipoDeAnio == 4 or ($tipoDeAnio == 3 and (strtotime($fechaIngresada) >= strtotime($fechaMarzoAcatl)))) {
		// Si el año es bisiesto (Tecpatl en Cuenta Tolteca)
		/*echo "Marca de tiempo Fecha Ingresada: ".strtotime($fechaIngresada)."<br />";
		echo "Marca de tiempo Inicio Marzo: ".strtotime($fechaIngresada)."<br />";
		echo "Marca de tiempo Inicio Nemontemi: ".strtotime($inicioNemontemi)."<br />";
		*/
		if (strtotime($fechaIngresada) <= strtotime($inicioNemontemi)) {
			$numeroMeztli = intval((obtenerValorP("13") + $dia + 1)/20 + 1);
			// echo "Valor P:".obtenerValorP(13).floor((obtenerValorP(13) + $dia + 1)/20 + 1);
		}  // En este else se procesaria el meztli nemontemi
		/*else {
			$numeroMeztli = floor((obtenerValorP($mes) + $dia + 1)/20 + 1);
		}*/
		
		
		echo "<br />Se eligió: M = (P + D + 1*)/20 + 1 METZLI<br />";
	} else {
		// Si el año no es bisiesto
		$numeroMeztli = intval((obtenerValorP($mes) + $dia)/20 + 1);
		echo "<br />Se eligió: M = (P + D)/20 + 1 METZLI<br />";
	}


	/* (6) Obtener el ilhuitl I = (P + D + 1*) base20 + 1
	   * Solo en años tecpatl y al 1ro de Marzo de Acatl /-- TODO --/
	*/

	if ($tipoDeAnio == 4 or ($tipoDeAnio == 3 and (strtotime($fechaIngresada) >= strtotime($fechaMarzoAcatl)))) {
		
		// Si la fecha Ingresada "cae" antes del inicio del Nenemontemi
		if (strtotime($fechaIngresada) <= strtotime($inicioNemontemi)) {
		 	$numeroIlhuitl = ((obtenerValorP("13") + $dia + 1) % 20);
		} // En este else se procesaria el ilhuitl del meztli del nemontemi
		 	
		echo "<br />Se eligió: I = (P + D + 1*) base20 + 1 ILHUITL<br />";
	} else {
		$numeroIlhuitl = ((obtenerValorP($mes) + $dia) % 20);
		echo "<br />Se eligió: I = (P + D ) base20 + 1 ILHUITL<br /> ";
	}
	
	if ($numeroIlhuitl == 0) {
		$numeroIlhuitl = 20;
	}
	
	/* (7) Obtener el Numeral del Ilhuitl Y (9*(X -1) + 7(M - ) + I)base13
	*/	 
	$numeralIlhuitl = (9*($numeralAnio - 1) + 7*($numeroMeztli - 1) + $numeroIlhuitl) % 13;

	/* (8) Obtener Trecena T = (I +21 - Y)base20
	*/
	$numeroTonalpohualli = ($numeroIlhuitl + 21 - $numeralIlhuitl) % 20;

	echo "<br />";
	echo "Numeral Año nuevo método: ".$numeralAnio."<br />";
	echo "Tipo de Año nuevo método: ".$tipoDeAnio."<br />";
	echo "Valor P: ".obtenerValorP($mes)."<br />";
	echo "Numero Meztli: ".$numeroMeztli."<br />";
	echo "Numero Ilhuitl: ".$numeroIlhuitl."<br />";
	echo "Numeral Ilhuitl: ".$numeralIlhuitl."<br />";
	echo "Numero de Ilhutil del Tonalpohualli: ".$numeroTonalpohualli."<br />";
	echo "<br />";
	echo "Numeral convertido a nahuatl: ".convierteANumeral($numeralAnio)."<br />";
	echo "Año convertido a Nahuatl: ".convierteTipoAnio($tipoDeAnio)."<br />";
	echo "Meztli convertido a nahuatl: ".obtenerMeztli($numeroMeztli)."<br />";
	echo "Ilhuitl convertido a Nahuatl: ".obtenerIlhuitl($numeroIlhuitl)."<br />";
	echo "Numeral Ilhuitl convertido a nahuatl: ".convierteANumeral($numeralIlhuitl)."<br />";
	echo "Tonalpohualli (Trecena): Ze ".obtenerIlhuitl($numeroTonalpohualli)."<br />";
	echo "<br />";	
	echo "<br />Tu energia de nacimiento es: ".convierteANumeral($numeralIlhuitl)." ".obtenerIlhuitl($numeroIlhuitl)." Ilhuitl ipan ".obtenerMeztli($numeroMeztli)." Meztli ipan ".convierteANumeral($numeralAnio)." ".convierteTipoAnio($tipoDeAnio)." Xihuitl";




/*
	// Residuo de la division del año en el calendario gregoriano entra 52 (base de la cuenta tolteca
	$modanio =  $anio % 52;

	echo 'Residuo año inicial: '.$modanio.'<br />';

	if ($modanio == 0) {
		$modanio = 52;
	}

	$anio_calc = $anio;


	// Fecha completa buscada
	$fechabuscada = $dia.'-'.$mes.'-'.$anio.' '.$hora.':'.$min.':'.$seg;

	echo 'Fecha que se busca: '.$fechabuscada.'<br />';

	// Tabla de años, numerales, Zipactli Atlacahualo, Zipactli de cada mes
	$tabladeanios = array(
					'numerales' => array("1" => "Ze", // Numerales del 1 al 13
									     "2" => "Ome",
										 "3" => "Yei",
										 "4" => "Nahui",
										 "5" => "Macuilli",
										 "6" => "Chicoaze",
										 "7" => "Chicome", 
										 "8" => "Chicoyei", 
										 "9" => "Chiconahui", 
										 "10" => "Matlactli", 
										 "11" => "Matlactlihuan Ze", 
										 "12" => "Matlactlihuan Ome", 
										 "13" =>"Matlactlihuan Yei"), 
		        	'anioscalli' => array ("1" => "37",
										   "2" => "25", 
										   "3" => "13",  
										   "4" => "1", 
										   "5" => "41",
										   "6" => "29", 
										   "7" => "17",
										   "8" => "5",
										   "9" => "45",
										   "10" => "33",
										   "11" => "21",
										   "12" => "9",
										   "13" => "49"),      // Años Calli
		            'aniostochtli' => array ("1" => "50",
									         "2" => "38", 
										     "3" => "26",  
										     "4" => "14", 
 										     "5" => "2",
										     "6" => "42", 
										     "7" => "30",
										     "8" => "18",
										     "9" => "6",
										     "10" => "46",
										     "11" => "34",
										     "12" => "22",
										     "13" => "10"),    // Años Tochtli  
					'aniosacatl' => array ("1" => "11",
									       "2" => "51", 
										   "3" => "39",  
										   "4" => "27", 
 										   "5" => "15",
										   "6" => "3", 
										   "7" => "43",
										   "8" => "31",
										   "9" => "19",
										   "10" => "7",
										   "11" => "47",
										   "12" => "35",
										   "13" => "23"),      // Años Tecpatl  
										   
					'aniostecpatl' => array ("1" => "24",
									         "2" => "12", 
										     "3" => "52",  
										     "4" => "40", 
 										     "5" => "28",
										     "6" => "16", 
										     "7" => "4",
										     "8" => "44",
										     "9" => "32",
										     "10" => "20",
										     "11" => "8",
										     "12" => "48",
										     "13" => "36"),    // Años Tecpatl
					'zipac_atla' => array("1" => "1",
	  							          "2" => "10", 
										  "3" => "6",  
										  "4" => "2", 
 										  "5" => "11",
										  "6" => "7", 
										  "7" => "3",
										  "8" => "12",
										  "9" => "8",
										  "10" => "4",
										  "11" => "13",
										  "12" => "9",
										  "13" => "5"),         // Zipaclli Atlachualo el numeral con que inicia el año
					'zipac_metztli' => array("1" => "1",
									         "2" => "8", 
										     "3" => "2",  
										     "4" => "9", 
 										     "5" => "3",
										     "6" => "10", 
										     "7" => "4",
										     "8" => "11",
										     "9" => "5",
										     "10" => "12",
										     "11" => "6",
										     "12" => "13",
										     "13" => "7")        // Zipactli con que inicia cada metztlidevotional1
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

	$fechahorainicio = $dia.'-'.$mes.'-'.$anio.' '.$diahorainicio;
	$fechahorainicio_t = strtotime($fechahorainicio);


	// $tamanio_arr = count($tabladeanios['aniostochtli']);


// Tabla de Metztli 
	if ($tipoanio == "Tecpatl") {

		// Array con los rangos de fechas de los metztli año TECPATL
		$tablademetztli = array (
  
                          "1" => array(
						         "0" => "11-03-$anio_calc $diahorainicio", 
							     "1" => "31-03-$anio_calc $diahorafin", 
							     "2" => "Atlacahualo"),
 					      "2" => array(
						         "0" => "31-03-$anio_calc $diahorainicio", 
								 "1" => "20-04-$anio_calc $diahorafin",
								 "2" => "Tlacaxipehualiztli"),
                          "3" => array(
						         "0" => "20-04-$anio_calc $diahorainicio", 
								 "1" => "10-05-$anio_calc $diahorafin", 
								 "2" => "Tozoztontli"),
			              "4" => array(
						         "0" => "10-05-$anio_calc $diahorainicio", 
								 "1" => "30-05-$anio_calc $diahorafin", 
								 "2" => "Huei Tozoztli"),
	  		              "5" => array(
						         "0" => "30-05-$anio_calc $diahorainicio", 
								 "1" => "19-06-$anio_calc $diahorafin", 
								 "2" => "Toxcatl"),
			              "6" => array(
						         "0" => "19-06-$anio_calc $diahorainicio", 
								 "1" => "09-07-$anio_calc $diahorafin", 
								 "2" => "Etzalcualiztli"),
                          "7" => array(
						         "0" => "09-07-$anio_calc $diahorainicio", 
								 "1" => "29-07-$anio_calc $diahorafin", 
								 "2" => "Tecuilhuitontli"),
                          "8" => array(
				                 "0" => "29-07-$anio_calc $diahorainicio", 
								 "1" => "18-08-$anio_calc $diahorafin", 
								 "2" => "Huei Tecuilhuitl"),
                          "9" => array(
						         "0" => "18-08-$anio_calc $diahorainicio", 
								 "1" => "07-09-$anio_calc $diahorafin", 
								 "2" => "Tlaxöchimaco"),
			              "10" => array(
						          "0" => "07-09-$anio_calc $diahorainicio", 
								  "1" => "27-09-$anio_calc $diahorafin", 
								  "2" => "Xocohuetzi"),
                          "11" => array(
						          "0" => "27-09-$anio_calc $diahorainicio", 
								  "1" => "17-10-$anio_calc $diahorafin", 
								  "2" => "Ochpaniztli"),
                          "12" => array(
					        	  "0" => "17-10-$anio_calc $diahorainicio", 
								  "1" => "06-11-$anio_calc $diahorafin", 
								  "2" => "Teötlehco"),
                          "13" => array(
						          "0" => "06-11-$anio_calc $diahorainicio", 
								  "1" => "26-11-$anio_calc $diahorafin", 
								  "2" => "Tepeilhuitl"),
                          "14" => array(
						          "0" => "26-11-$anio_calc $diahorainicio", 
								  "1" => "16-12-$anio_calc $diahorafin", 
								  "2" => "Quecholli"),
			              "15" => array(
						          "0" => "16-12-$anio_calc $diahorainicio", 
        						  "1" => "05-01-$anioajuste $diahorafin", 
								  "2" => "Panquetzaliztli"),
                          "16" => array(
						  		  "0" => "05-01-$anioajuste $diahorainicio", 
								  "1" => "25-01-$anioajuste $diahorafin", 
								  "2" => "Atemoztli"),
                          "17" => array(
								  "0" => "25-01-$anioajuste $diahorainicio", 
								  "1" => "14-02-$anioajuste $diahorafin", 
								  "2" => "Tititl"),
                          "18" => array(
						          "0" => "14-02-$anioajuste $diahorainicio", 
								  "1" => "06-03-$anioajuste $diahorafin", 
								  "2" => "Izcalli"),
                     	  "19" => array(
                     	  		  "0" => "$nemoin", 
                     	  		  "1" => "$nemofin", 
                     	  		  "2" => "Nemontemi"),

		); // Fin de Array

	} else { // fin de if Tecpatl inicio de else
	
		// Array con los rangos de fechas todos los demas tipos de año
		$tablademetztli = array (
		
		
		                  "1" => array(
						         "0" => "12-03-$anio_calc $diahorainicio", 
								 "1" => "01-04-$anio_calc $diahorafin", 
								 "2" => "Atlacahualo"),
                          "2" => array(
						         "0" => "01-04-$anio_calc $diahorainicio", 
								 "1" => "21-04-$anio_calc $diahorafin", 
								 "2" => "Tlacaxipehualiztli"),
		                  "3" => array(
						         "0" => "21-04-$anio_calc $diahorainicio", 
								 "1" => "11-05-$anio_calc $diahorafin", 
								 "2" => "Tozoztontli"),
		                  "4" => array(
						         "0" => "11-05-$anio_calc $diahorainicio", 
								 "1" => "31-05-$anio_calc $diahorafin", 
								 "2" => "Huei Tozoztli"),
		                  "5" => array(
						         "0" => "31-05-$anio_calc $diahorainicio", 
								 "1" => "20-06-$anio_calc $diahorafin", 
								 "2" => "Toxcatl"),
		                  "6" => array(
						         "0" => "20-06-$anio_calc $diahorainicio", 
								 "1" => "10-07-$anio_calc $diahorafin", 
								 "2" => "Etzalcualiztli"),
		                  "7" => array(
						         "0" => "10-07-$anio_calc $diahorainicio", 
								 "1" => "30-07-$anio_calc $diahorafin", 
								 "2" => "Tecuilhuitontli"),
		                  "8" => array(
						         "0" => "30-07-$anio_calc $diahorainicio", 
								 "1" => "19-08-$anio_calc $diahorafin", 
								 "2" => "Huei Tecuilhuitl"),
                          "9" => array(
						         "0" => "19-08-$anio_calc $diahorainicio", 
								 "1" => "08-09-$anio_calc $diahorafin", 
								 "2" => "Tlaxöchimaco"),
		                  "10" => array(
						           "0" => "08-09-$anio_calc $diahorainicio", 
								   "1" => "28-09-$anio_calc $diahorafin", 
								   "2" => "Xocohuetzi"),
 		                  "11" => array(
						          "0" => "28-09-$anio_calc $diahorainicio", 
								  "1" => "18-10-$anio_calc $diahorafin", 
								  "2" => "Ochpaniztli"),
		                  "12" => array(
						          "0" => "18-10-$anio_calc $diahorainicio", 
								  "1" => "07-11-$anio_calc $diahorafin", 
								  "2" => "Teötlehco"),
		                  "13" => array(
						          "0" => "07-11-$anio_calc $diahorainicio", 
								  "1" => "27-11-$anio_calc $diahorafin", 
								  "2" => "Tepeilhuitl"),
		                  "14" => array(
						          "0" => "27-11-$anio_calc $diahorainicio", 
								  "1" => "17-12-$anio_calc $diahorafin", 
								  "2" => "Quecholli"),
    	                  "15" => array(
						          "0" => "17-12-$anio_calc $diahorainicio", 
								  "1" => "06-01-$anioajuste $diahorafin", 
								  "2" => "Panquetzaliztli"),
    	                  "16" => array(
						          "0" => "06-01-$anioajuste $diahorainicio", 
								  "1" => "26-01-$anioajuste $diahorafin", 
								  "2" => "Atemoztli"),
		                  "17" => array(
						          "0" => "26-01-$anioajuste $diahorainicio", 
								  "1" => "15-02-$anioajuste $diahorafin", 
								  "2" => "Tititl"),
		                  "18" => array(
						          "0" => "15-02-$anioajuste $diahorainicio", 
								  "1" => "06-03-$anioajuste $diahorafin", 
								  "2" => "Izcalli"),
                  //	  "19" => array("0" => "$nemoin", "1" => "$nemofin", "2" => "Nemontemi"),

		);
	} // Fin de else
	// print_r($tablademetztli);
	// echo $anio_calc;
	// echo "rango: ".$tablademetztli[1][0];

	$tabladeilhuitl = array("1"  => "Zipactli",   "2"  => "Ehecatl", 
							"3"  => "Calli",      "4"  => "Cuetzpalli",
							"5"  => "Cohuatl",    "6"  => "Miquiztli", 
							"7"  => "Mazatl",     "8"  => "Tochtli",
							"9"  => "Atl",        "10" => "Itzcuintli",
							"11" => "Ozomahtli",  "12" => "Malinalli",
							"13" => "Acatl",      "14" => "Ocelotl",
							"15" => "Cuauhtli",   "16" => "Cozcacuauhtli",
							"17" => "Ollin",      "18" => "Tecpatl", 
							"19" => "Quiyahuitl", "20" => "Xöchitl");
							

	// Determinar el indice del residuo en la tabla de años, segun el tipo de año 
	switch ($tipoanio) {
		case 'Calli':
			$i = '1';
			while ($i <= 13) {
				//	echo "paso $i <br />";
				if (current($tabladeanios['anioscalli']) == $modanio) {
					echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['anioscalli']).' ';	
					echo 'Valor: '.current($tabladeanios['anioscalli']).'<br />';	
					$indice_anio = key($tabladeanios['anioscalli']);
				}
//				echo 'Numero de indice del residuo en la tabla de años: '.key($tabladeanios['anioscalli']).' ';	
//				echo 'Valor: '.current($tabladeanios['anioscalli']).'<br />';	
				next($tabladeanios['anioscalli']);
				$i++;
			}
			break;
		case 'Tochtli':
			$i = '1';
			while ($i <= 13) {
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
			$i = '1';
			while ($i <= 13) {
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
			$i = '1';
			while ($i <= 13) {
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
	$i = '1';
	while ($i <= 13) {
		//	echo "paso $i <br />";
		if (key($tabladeanios['numerales']) == $indice_anio) {
			echo 'Indice: '.key($tabladeanios['numerales']).' Numeral del año: '.current($tabladeanios['numerales']).'<br />';	
			$numeral_anio = current($tabladeanios['numerales']);
		}
//		echo 'Indice: '.key($tabladeanios['numerales']).' Numeral del año: '.current($tabladeanios['numerales']).'<br />';	
		next($tabladeanios['numerales']);
		$i++;
	}

	// Usar el mismo indice para determinar el primer dia del año buscado
	$i = '1';
	while ($i <= 13) {
		//	echo "paso $i <br />";
		if (key($tabladeanios['zipac_atla']) == $indice_anio) {
			echo 'Indice: '.key($tabladeanios['zipac_atla']).' Numeral Zipactli Atlacahualo: '.current($tabladeanios['zipac_atla']).'<br />';	
			$zipactli_atlacahualo = current($tabladeanios['zipac_atla']);
		}
//		echo 'Indice: '.key($tabladeanios['zipac_atla']).' Numeral Zipactli Atlacahualo: '.current($tabladeanios['zipac_atla']).'<br />';	
		next($tabladeanios['zipac_atla']);
		$i++;
	}

	// Obtener el meztli que corresponde a la fecha que se busca
	for ($i = 1,  $tamarr = sizeof($tablademetztli);  $i <= $tamarr;  ++$i) {
		
//		echo $i.'-'.$tablademetztli[$i][2].'<br />';
//		$aniostecpatl = strtotime($fechabuscada);
		$inicio_metztli = strtotime($tablademetztli[$i][0]); 
		$fin_metztli = strtotime($tablademetztli[$i][1]); 

//		echo 'valores objetos: '.$fechabuscada_t.', '.$inicio_metztli.', '.$fin_metztli.' '.$i.'<br />';
//		echo 'valores tiempo: '.$fechabuscada.', '.$tablademetztli[$i][0].', '.$tablademetztli[$i][1].'<br>';
		
			
   	    if ($fechabuscada_t >= $inicio_metztli && $fechabuscada_t <= $fin_metztli) {
  	        
			$metztli = $tablademetztli[$i][2];
			$indice_metztli = key($tablademetztli);
			$inicio_metztli_f = $tablademetztli[$i][0];
			// echo "INICIO: ".$tablademetztli[$i][0];
			echo 'Indice Tabla Metztli: '.$indice_metztli.' Valor: '.$metztli.'<br />';
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
	// print_r($partefecha1);

	$extrae_fecha = $partefecha1[0];
		
	$partefecha2 = explode('-', $extrae_fecha);
	
	//  print_r($partefecha2);
	
//	echo '<br />'.$partefecha2[1].'-'.$partefecha2[0].'-'.$partefecha2[2].'<br />';
//	echo $mes.'-'.$dia.'-'.$anio.'<br />';
		
//  calculo timestamp de las dos fechas 
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

	$dias_diferencia += 1;
	
	echo '<br />Distancia entre el inicio del metztli y la fecha buscada: '.$dias_diferencia.'<br />'; 

	
//	if ($dias_diferencia == '0') {
//		$numeral_zipactli = $zipactli_atlacahualo;
//	} else {

//		echo '<br />Se ejecuta este<br />';
		// Obtener el indice de el Zipactli Atlacahualo en el Array Zipac_Metztli
	$i = '1';
	while ($i <= 13) {
		//	echo "paso $i <br />";
		if (current($tabladeanios['zipac_metztli']) == $zipactli_atlacahualo) {
			echo 'Indice del Zipactli Inicial en el array Zipac_Metztli: '.key($tabladeanios['zipac_metztli']).' ';
			echo 'Valor: '.current($tabladeanios['zipac_metztli']).'<br />';	
			$indice_zipacmetztli = key($tabladeanios['zipac_metztli']);
		}
//		echo 'Indice del Zipactli Inicial en el array Zipac_Metztli: '.key($tabladeanios['zipac_metztli']).' ';
//		echo 'Valor: '.current($tabladeanios['zipac_metztli']).'<br />';	
		next($tabladeanios['zipac_metztli']);
		$i++;
	}

		// Volver a colocar el apuntador en la posicion inicial
	reset($tabladeanios['zipac_metztli']);

		// Mover el apuntador del array a la posición donde se encuentra el valor del Zipactli Atlacahualo
		// en el array Zipac Metztli
	$i = '1';
	while ($i < $indice_zipacmetztli) {		
//		echo 'Indice Zipactli: '.key($tabladeanios['zipac_metztli']).' Valor: '.current($tabladeanios['zipac_metztli']).'<br />';
		next($tabladeanios['zipac_metztli']);		
		$i++;
	}
			
	echo 'Indice Zipactli Final: '.key($tabladeanios['zipac_metztli']).' Valor: '.current($tabladeanios['zipac_metztli']).'<br />';

	$acontar_m = $indice_metztli;
	$tam_arr = sizeof($tabladeanios['zipac_metztli']);

	echo 'Tamaño del Array Zipac_Metztli: '.$tam_arr.'<br>';
//	$tam_arr = $tam_arr - 1;

		//Cuenta en el array para obtener el numeral de inicio del metztli al que corresponde la fecha buscada
	echo 'Cuenta sobre el Array: ';
	$i = '1';
	while ($i <= ($acontar_m)) {

		//	echo "paso $i <br />";
		if (key($tabladeanios['zipac_metztli']) == $tam_arr) {
			$numeral_zipactli = current($tabladeanios['zipac_metztli']);
	 		reset($tabladeanios['zipac_metztli']);
		} else {
			$numeral_zipactli = current($tabladeanios['zipac_metztli']);
			next($tabladeanios['zipac_metztli']);
		}
		echo $numeral_zipactli.' ';  
		$i++;
	}
//	} // Cierre de Else
	echo ' Final: '.$numeral_zipactli;
//	echo '<br />Numeral zipactli: '.$numeral_zipactli.'<br />';	
	echo '<br />Fecha de Inicio del Metztli: '.$inicio_metztli_f.'<br />';

	// Determinar el Ilhuitl
	if ($dias_diferencia == '0') {
		$ilhuitl = current($tabladeilhuitl);
//		echo "<br /> Entro Aqui";
	} else {

//		echo '<br />'.$fechabuscada_t;
//		echo '<br />'.$fechahorainicio_t.'<br />';

		if ($fechabuscada_t < $fechahorainicio_t) {
			$dias_diferencia -= 1;	
			echo 'Ajuste a dias_diferencia: '.$dias_diferencia.'<br />';	
		}
			
		$i = '1';
		while ($i <= 20) {
 			//	echo "paso $i <br />";
			if (key($tabladeilhuitl) == ($dias_diferencia)) {
				$ilhuitl = current($tabladeilhuitl);
				echo 'El Dia que corresponde a la fecha gregoriana es:  '.current($tabladeilhuitl).'<br />';	
			}
//			echo 'Indice: '.key($tabladeilhuitl).' El Dia:  '.current($tabladeilhuitl).'<br />';	
			next($tabladeilhuitl);
			$i++;
		}
	}
		
	// Determinar el Numeral del ilhuitl
	// Mover el indice del Array Numerales hasta donde esta el numeral donde empieza el metztli
	// Primero movemos el puntero al inicio del Array
	reset($tabladeanios['numerales']);
	
	//	if (key())

	// 
	$i = '1';
	while ($i < $numeral_zipactli) {		
		next($tabladeanios['numerales']);		
//		echo 'Numeral zipactli: '.current($tabladeanios['numerales']).'<br />';	
		$i++;
	}
	
//	echo 'Final Numeral zipactli: '.current($tabladeanios['numerales']).'<br />';	


	echo 'El numeral Zipactli en nahuatl es: '.current($tabladeanios['numerales']).' ';
	echo 'Indice: '.key($tabladeanios['numerales']).'<br />';

	if ($dias_diferencia == '0') {
		$numeral_ilhuitl = current($tabladeanios['numerales']);
//		echo "<br /> Entro Aqui";
	} else {

		$numeralesacontar = $dias_diferencia;
		$tam_arr_n = count($tabladeanios['numerales']);
//		$tam_arr = $tam_arr - 1;

		//Cuenta en el array para obtener el numeral de inicio del metztli al que corresponde la fecha buscada
		echo 'Tamaño del Array Numerales: '.$tam_arr_n.'<br />';
		echo 'Numerales a contar: '.$numeralesacontar.'<br />';
		echo 'Cuenta sobre el Array Numerales: ';
	
		$i = '1';
		while ($i <= $numeralesacontar) {

			//	echo "paso $i <br />";
			if (key($tabladeanios['numerales']) == $tam_arr_n) {
				$numeral_ilhuitl = current($tabladeanios['numerales']);
				reset($tabladeanios['numerales']);
			} else { 
				$numeral_ilhuitl = current($tabladeanios['numerales']);
				next($tabladeanios['numerales']);
			}
			echo $numeral_ilhuitl.' ';  
			$i++;
		}
	}

	/*$fechahorainicio = $dia.'-'.$mes.'-'.$anio.' '.$diahorainicio;

	$fechahorainicio_t = strtotime($fechahorainicio);

	if ($fechabuscada_t < $fechahorainicio_t) {
//		prev($tabladeilhuitl);
		echo "Se ejecuta";
//		$numeral_ilhuitl = current($tabladeanios['numerales']);
	}*/ 

/*	
	echo 'Final: '.$numeral_ilhuitl;  


	echo '<br /><br />Año: '.$anio.'<br />';
	echo 'Tipo de Año: '.$tipoanio.'<br />';
	echo 'Es un año: '.$numeral_anio.' '.$tipoanio.' ('.$zipactli_atlacahualo.')<br />';
	echo 'El Mezttli es: '.$metztli.' ('.$indice_metztli.') ('.$numeral_zipactli.')<br />';
	echo 'El ilhuitl es: '.$ilhuitl.'<br />';
	echo 'Su Numeral es: '.$numeral_ilhuitl;
*/

?> 
</p>
</body>
</html>