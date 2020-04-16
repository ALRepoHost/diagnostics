<?php

/*
* Prosty framework szkieletowy do testowania skryptów PHP.
* @author: macfanpl
*/

// Zaimportowanie plików klas
require 'inc/diagnostics.php';
require 'inc/global.php';

// Zainicjowanie poszczególnych klas
$ac = new diagnostics();
$gl = new globalConfig();

// W tym miejscu wywołaj odpowiednią/zadaną funkcję z pliku diagnostics.php
$ac->runAllRecursively();
?>