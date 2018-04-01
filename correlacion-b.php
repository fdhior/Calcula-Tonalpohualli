<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<p>
<font size="1" color="#000000">
<a target="_blank" href="doc_hojeador.php?id_doc=1"><span style="font-family: Verdana">
lu</span><span lang="EN-US" style="font-family: Verdana">nes 30 de abril de 2007</span></a></font><font size="1"><span style="font-family: Verdana">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></font>
</p>

<?php

$hoy = getdate();
print_r($hoy);

$os = array ("Mac", "NT", "Irix", "Linux");
if (in_array ("Irix", $os))
    print "Encontrado Irix";
if (in_array("mac", $os)) {
    echo "Encontrado mac";
}

// Determinar el año en la cuenta tolteca

// Definir matrices y variables
$fechadehoy=getdate();
$modanio = $fechadehoy[year] % 52;
$anioscalli   = array (37, 25, 13, 1, 41, 29, 17, 5, 45, 33, 21, 9, 49);
$aniostochtli = array (50, 38, 26, 14, 2, 42, 30, 18, 6, 46, 34, 22, 10);
$aniosacatl   = array (11, 51, 39, 27, 15, 3, 43, 31, 16, 7, 47, 35, 23);
$aniostecpatl = array (24, 12, 52, 40, 28, 16, 4, 44, 32, 20, 8, 48, 36);

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

echo "</h3>" .$fechadehoy[year]. " Corresponde a un año " .$numanio. " " .$tipoanio. " en la Cuenta Tolteca del Tiempo</h3>";


echo "</h3>" .$fechadehoy[year]. "</h3>";
echo "</h3>" .$modanio. "</h3>";


$anios = array ("Calli", "Tochtli", "Acatl", "Tecpatl");
echo "</h3>" .$anios[0]. "</h3>";
echo "</h3>" .$t[mon]. "</h3>"; 

	$t = getdate();
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
    echo "Last Year<br>Start $lystart<br>Finish $lyend<br><br>";

 
?>

</body>
</html>
