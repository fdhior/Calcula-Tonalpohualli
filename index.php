<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cuenta Tolteca del Tiempo</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	
	<link rel="stylesheet" href="css/cuentatolteca.css" type="text/css" />

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Cuenta tolteca del Tiempo App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
<!--           <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form> -->
        </div>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Calcula tu energia de Nacimiento (Tonalpohualli)</h1>
        <p class="lead">Da clic en el botón para iniciar el proceso.</p>
		<p>				
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormDatos">
  				Calcula Tonalpohualli
			</button>
        </p>
      </div>

    </main><!-- /.container -->


<!-- Modal -->
<div class="modal fade" id="modalFormDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ingresa tus datos...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<!-- Start Formoid form-->
<form class="formoid-default" title="Cuenta Tolteca" method="post" action="convierteatolteca-matrices.php">

<!--     style="background-color:#FFFFFF;
    	   font-size:14px;
    	   font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;
    	   color:#666666;width:480px" -->


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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="enviarDatos" type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<!-- <script type="text/javascript" src="js/src/modal.js"></script> -->
	<script type="text/javascript" src="js/cuentatolteca.js"></script>
	<!-- <script type="text/javascript" src="js/formoid-default.js"></script> -->

</body>
</html>
