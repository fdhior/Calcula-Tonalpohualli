<?php

define('EMAIL_FOR_REPORTS', 'fdhior@gmail.com');
define('RECAPTCHA_PRIVATE_KEY', '@privatekey@');
define('FINISH_URI', 'http://');
define('FINISH_ACTION', 'message');
define('FINISH_MESSAGE', 'Thanks for filling out my form!');
define('UPLOAD_ALLOWED_FILE_TYPES', 'doc, docx, xls, csv, txt, rtf, html, zip, jpg, jpeg, png, gif');

require_once('formulariocuenta_files/formoid1/handler.php');

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>My Formoid form</title>
</head>
<body style="background-color:#EBEBEB">


<? if (frmd_message()): ?>
<link rel="stylesheet" href="formulariocuenta_files/formoid1/formoid-default.css" type="text/css" />
<span class="alert alert-success"><?=FINISH_MESSAGE;?></span>
<? else: ?>
<!-- Start Formoid form-->
<link rel="stylesheet" href="formulariocuenta_files/formoid1/formoid-default.css" type="text/css" />
<script type="text/javascript" src="formulariocuenta_files/formoid1/jquery.min.js"></script>
<form class="formoid-default" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px" title="My Formoid form" method="post">
	<div class="element-text" ><h2 class="title">Cuenta Tolteca del Tiempo</h2></div>
	<div class="element-input"  <?frmd_add_class("input")?>><label class="title">¿Cuál es tu nombre?<span class="required">*</span></label><input type="text" name="input" required="required"/></div>
	<div class="element-select"  <?frmd_add_class("select")?>><label class="title">Selecciona tu año de Nacimiento</label><select name="select" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-select"  <?frmd_add_class("select1")?>><label class="title">Selecciona tu dia mes de nacimiento</label><select name="select1" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-select"  <?frmd_add_class("select2")?>><label class="title">Selecciona tu dia de nacimiento</label><select name="select2" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-select"  <?frmd_add_class("select3")?>><label class="title">Hora</label><select name="select3" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-select"  <?frmd_add_class("select4")?>><label class="title">Minuto</label><select name="select4" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-select"  <?frmd_add_class("select5")?>><label class="title">Segundo</label><select name="select5" >

		<option value="options 1">options 1</option><br/>
		<option value="options 2">options 2</option><br/>
		<option value="options 3">options 3</option><br/></select></div>
	<div class="element-submit" ><input type="submit" value="Calcular Tonalpohualli"/></div>

</form>
<script type="text/javascript" src="formulariocuenta_files/formoid1/formoid-default.js"></script>

<p class="frmd"><a href="http://formoid.com/">Create Web Forms Database Formoid.com 1.7</a></p>
<!-- Stop Formoid form-->
<? endif; ?>


</body>
</html>
