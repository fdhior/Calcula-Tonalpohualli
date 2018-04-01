<?php
    function convaletra($convnum)
    {
    $lnEnt = $convnum;
    $lnFrac = ($convnum - $lnEnt) * 100;
    $lcRet = '';
    $lnTerna = 1;
	
	while (lnEnt > 0) {
//  *-- Recorro terna por terna
    $lcCad = '';
    $lnUni = $lnEnt % 10;
    $lnEnt = $lnEnt/10;
    $lnDec = $lnEnt % 10;
    $lnEnt = $lnEnt/10;
    $lnCent = $lnEnt % 10;
    $lnEnt = $lnEnt/10;
//  *-- Analizo las unidades
      if ($lnUni == 1) {
        $lcCad = 'ONE ' + $lcCad;
      }  
      if ($lnUni == 2) {
        $lcCad = 'TWO ' + $lcCad;
	  }
	  if ($lnUni == 3) {
        $lcCad = 'THREE ' + $lcCad;
      }           		
      if ($lnUni == 4) {
        $lcCad = 'FOUR ' + $lcCad;
      } 		
      if ($lnUni == 5) {
        $lcCad = 'FIVE ' + $lcCad;
	  }	
      if ($lnUni == 6) {
        $lcCad = 'SIX ' + $lcCad;
	  }	
      if ($lnUni == 7) { 
        $lcCad = 'SEVEN ' + $lcCad;
      }  
      if ($lnUni == 8) {
        $lcCad = 'EIGHT ' + $lcCad;
      }		
      if ($lnUni == 9) {
        $lcCad = 'NINE ' + $lcCad;
	  }	
//  Fin Analizo Unidades
    *-- Analizo las decenas
    DO CASE && DECENAS
      CASE lnDec = 1
        DO CASE
          CASE lnUni = 0
            lcCad = 'TEN '
          CASE lnUni = 1
            lcCad = 'ELEVEN '
          CASE lnUni = 2
            lcCad = 'TWELVE '
          CASE lnUni = 3
            lcCad = 'THIRTEEN '
          CASE lnUni = 4
            lcCad = 'FOURTEEN '
          CASE lnUni = 5
            lcCad = 'FIFTEEN '
          CASE lnUni = 6
            lcCad = 'SIXTEEN '
          CASE lnUni = 7
            lcCad = 'SEVENTEEN '
          CASE lnUni = 8
            lcCad = 'EIGHTEEN '
          CASE lnUni = 9
            lcCad = 'NINETEEN '
        ENDC
      CASE lnDec = 2
        lcCad = 'TWENTY ' + lcCad
      CASE lnDec = 3
        lcCad = 'THIRTY ' + lcCad
      CASE lnDec = 4
        lcCad = 'FORTY ' + lcCad
      CASE lnDec = 5
        lcCad = 'FIFTY ' + lcCad
      CASE lnDec = 6
        lcCad = 'SIXTY ' + lcCad
      CASE lnDec = 7
        lcCad = 'SEVENTY ' + lcCad
      CASE lnDec = 8
        lcCad = 'EIGHTY ' + lcCad
      CASE lnDec = 9
        lcCad = 'NINETY ' + lcCad
    ENDCASE && DECENAS
    *-- Analizo las centenas
    DO CASE && CENTENAS
      CASE lnCent = 1
        lcCad = 'ONE HUNDRED ' + lcCad
      CASE lnCent = 2
        lcCad = 'TWO HUNDRED ' + lcCad
      CASE lnCent = 3
        lcCad = 'THREE HUNDRED ' + lcCad
      CASE lnCent = 4
        lcCad = 'FOUR HUNDRED ' + lcCad
      CASE lnCent = 5
        lcCad = 'FIVE HUNDRED ' + lcCad
      CASE lnCent = 6
        lcCad = 'SIX HUNDRED ' + lcCad
      CASE lnCent = 7
        lcCad = 'SEVEN HUNDRED ' + lcCad
      CASE lnCent = 8
        lcCad = 'EIGHT HUNDRED ' + lcCad
      CASE lnCent = 9
        lcCad = 'NINE HUNDRED ' + lcCad
    ENDCASE && CENTENAS
    *-- Analizo la terna
    DO CASE && TERNA
      CASE lnTerna = 1
        lcCad = lcCad
      CASE lnTerna = 2
        lcCad = lcCad + 'THOUSAND '
      CASE lnTerna = 3
        lcCad = lcCad + 'MILLON '
      CASE lnTerna = 4
        lcCad = lcCad + 'BILLON '
    ENDCASE && TERNA
    *-- Armo el retorno terna a terna
    lcRet = lcCad  + lcRet
    lnTerna = lnTerna + 1
  ENDDO && WHILE



    } // Cierre de Función

?>