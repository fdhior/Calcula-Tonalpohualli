<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cuenta Tolteca del Tiempo</title>
</head>


<body style="background-color:#EBEBEB">
<!-- Start Formoid form-->
<link rel="stylesheet" href="css/formainicio.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

<form class="formoid-default"
    style="background-color:#FFFFFF;
    	   font-size:14px;
    	   font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;
    	   color:#666666;width:480px"
    title="Cuenta Tolteca" method="post" action="convierteatolteca.php">
	<div class="element-text" ><h2 class="title">Cuenta Tolteca del Tiempo</h2></div>
	<div class="element-input" >
		
		<label class="title">¿Cuál es tu nombre?<span class="required">*</span></label>
			<!-- INPUT NOMBRE -->
			<input type="text" name="nombre" required="required"/>
	</div>
	<div class="element-select" ><label class="title">Selecciona tu año de Nacimiento</label>
	
	<!-- SELECT DIA -->
	<select name="dia" required="required">

		<!-- <option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/> -->

		<?php    

			for ($i = 1; $i <= 31; $i++) {

				$slength = strlen($i);

				switch($slength) {
		   			case "1":
						$print_i = '0'.$i;
						break;
					case "2":
						$print_i = $i;
						break;
				}

		   		if ($i == 1) {
					echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
				} else {
					echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
				}
			}

		?>	

	</select>

	<!-- SELECT MES -->
	<select name="mes">
	
		<option value="01" selected="selected">Enero</option>
	    <option value="02">Febrero</option>
	    <option value="03">Marzo</option>
	    <option value="04">Abril</option>
	    <option value="05">Mayo</option>
	    <option value="06">Junio</option>
	    <option value="07">Julio</option>
	    <option value="08">Agosto</option>
	    <option value="09">Septiembre</option>
	    <option value="10">Octubre</option>
	    <option value="11">Noviembre</option>
	    <option value="12">Diciembre</option>
	
	</select>

	<!-- SELECT ANIO -->
	<select name="anio">

		<?php
			
			$anio_actual = date('Y'); 
			for ($anio = 3000; $anio >= 1900; $anio--) {
		   		if ($anio == $anio_actual) {
					echo '<option selected="selected" value="'.$anio.'"> '.$anio.'</option>';	
				} else {
					echo '<option value="'.$anio.'"> '.$anio.'</option>';
				}
			}
		?>

	</select></div>

	
	<div class="element-select">
		<label class="title">Slecciona la Hora, minuto y segundo (lo más preciso posible)</label>
		<!-- SELECT HORA -->
		<select name="hora">

		<?php    

			for ($i = 0; $i <= 23; $i++) {

				$slength = strlen($i);

				switch($slength) {
			   		case "1":
						$print_i = '0'.$i;
						break;
					case "2":
						$print_i = $i;
						break;
				}

			   	if ($i == 0) {
					echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
				} else {
					echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
				}
			}

		?>	
			<!-- <option value="options 1">options 1</option><br/>
			<option value="options 2">options 2</option><br/>
			<option value="options 3">options 3</option><br/> -->
		</select>
		<!-- SELECT MIN -->
		<select name="min">

		<?php    

			for ($i = 0; $i <= 59; $i++) {

				$slength = strlen($i);

				switch($slength) {
			   		case "1":
						$print_i = '0'.$i;
						break;
					case "2":
						$print_i = $i;
						break;
				}

			   	if ($i == 0) {
					echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
				} else {
					echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
				}
			}

		?>	 

		</select>	
		<!-- SELECT SEG -->
		<select name="seg">

		<?php    

			for ($i = 0; $i <= 23; $i++) {

				$slength = strlen($i);

				switch($slength) {
			   		case "1":
						$print_i = '0'.$i;
						break;
					case "2":
						$print_i = $i;
						break;
				}

			   	if ($i == 0) {
					echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
				} else {
					echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
				}
			}

		?>	

		</select>	
	
	</div>
	
	<div class="element-submit" ><input type="submit" value="Calcular Tonalpohualli"/></div>

</form>
<script type="text/javascript" src="js/formoid-default.js"></script>

<!-- <p class="frmd"><a href="http://formoid.com/">Create Web Forms Database Formoid.com 1.7</a></p> -->
<!-- Stop Formoid form-->	


<!-- <form id="form1" name="form1" method="post" action="convierteatolteca.php">
  <label> Año en el calendario Gregoriano
  <select name="anio" id="select">

<?php
	// $anio_actual = date('Y'); 
	// for ($anio = 3000; $anio >= 1900; $anio--) {
	//    	if ($anio == $anio_actual) {
	// 		echo '<option selected="selected" value="'.$anio.'"> '.$anio.'</option>';	
	// 	} else {
	// 		echo '<option value="'.$anio.'"> '.$anio.'</option>';
	// 	}
	// }
?>
  </select>
  </label>


  <p>Mes en el Calendario Gregoriano 
    <label>
    <select name="mes" id="select2">

      <option value="01" selected="selected">Enero</option>
      <option value="02">Febrero</option>
      <option value="03">Marzo</option>
      <option value="04">Abril</option>
      <option value="05">Mayo</option>
      <option value="06">Junio</option>
      <option value="07">Julio</option>
      <option value="08">Agosto</option>
      <option value="09">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
    </label>
  </p>

 <p>Dia en el Calendario Gregoriano
    <select name="dia" id="select3">

<?php    

	// for ($i = 1; $i <= 31; $i++) {

	// 	$slength = strlen($i);

	// 	switch($slength) {
	//    		case "1":
	// 			$print_i = '0'.$i;
	// 			break;
	// 		case "2":
	// 			$print_i = $i;
	// 			break;
	// 	}

	//    	if ($i == 1) {
	// 		echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
	// 	} else {
	// 		echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
	// 	}
	// }

?>	

    </select>
  </p>
  <p>Hora, Minutos y Segundos en el calendario Gregoriano 

    <label>
    <select name="hora" id="select4">
    
<?php    

	// for ($i = 0; $i <= 23; $i++) {

	// 	$slength = strlen($i);

	// 	switch($slength) {
	//    		case "1":
	// 			$print_i = '0'.$i;
	// 			break;
	// 		case "2":
	// 			$print_i = $i;
	// 			break;
	// 	}

	//    	if ($i == 0) {
	// 		// echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
	// 	} else {
	// 		echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
	// 	}
	// }

?>	
   
     </select>
    </label>
    :
    <label>
    <select name="min" id="select4">

		<?php    

			// for ($i = 0; $i <= 59; $i++) {

			// 	$slength = strlen($i);

			// 	switch($slength) {
			//    		case "1":
			// 			$print_i = '0'.$i;
			// 			break;
			// 		case "2":
			// 			$print_i = $i;
			// 			break;
			// 	}

			//    	if ($i == 0) {
			// 		echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
			// 	} else {
			// 		echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
			// 	}
			// }

		?>	

   	 </select>
    </label>
 :
  <select name="seg" id="select5">

<?php    

	// for ($i = 0; $i <= 59; $i++) {

	// 	$slength = strlen($i);

	// 	switch($slength) {
	//    		case "1":
	// 			$print_i = '0'.$i;
	// 			break;
	// 		case "2":
	// 			$print_i = $i;
	// 			break;
	// 	}

	//    	if ($i == 0) {
	// 		echo '<option selected="selected" value="'.$print_i.'"> '.$print_i.'</option>';	
	// 	} else {
	// 		echo '<option value="'.$print_i.'"> '.$print_i.'</option>';
	// 	}
	// }

?>	

  </select>
  </p> 
  <p>
    <label>
    <input type="submit" name="button" id="button" value="Consultar" />
    </label>
  </p>
</form> -->

</body>
</html>
