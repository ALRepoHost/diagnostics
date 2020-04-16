/*
* Prosty framework szkieletowy do testowania skryptów PHP.
* @author: macfanpl
*/
<?php
require 'inc/diagnostics.php';
require 'inc/global.php';
$ac = new diagnostics();
$gl = new globalConfig();
$ac->runAllRecursively();
?>